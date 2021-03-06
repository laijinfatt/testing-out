<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Category;
use DB;
use Auth;

class ManageProductController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('addProduct')->with('categoryID',Category::all());
    }

    public function add(){
        $r=request();//received the data by GET or POST method $_POST['name']
        $image=$r->file('productImage');
        $image->move('image',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'CategoryID'=>$r->CategoryID,
            'image'=>$imageName,
        ]);
        Session::flash('success',"Product create successfully");
        return redirect()->route('showProduct');
    }

    public function view(){
        $viewProduct=Product::all();
        return view('showProduct')->with('products',$viewProduct);
    }

    public function index1(){
        $viewProduct=DB::table('products')
        ->leftJoin('categories','products.CategoryID','=','categories.id')
        ->select('products.*','categories.name as cName')
        ->get();
        
        return view('showProduct')->with('products',$viewProduct);
    }
    
    public function delete($id){

        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Session::flash('success',"Product was deleted successfully!");
        return redirect()->route('showProduct');
    }

    public function edit($id){

        $products=Product::all()->where('id',$id);
        
        return view('editProduct')->with('products',$products)
        ->with('categoryID',Category::all());
    }

    public function update(){
        $r=request();
        $products = Product::find($r->productID);

        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
        } 

        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->price=$r->productPrice;
        $products->quantity=$r->productQuantity;
        $products->CategoryID=$r->CategoryID;
        $products->save();

        return redirect()->route('showProduct');
    }
}
