<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
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
        return view('addProduct');
    }

    public function view(){
        $viewProduct=Product::all();
        return view('showProduct')->with('products',$viewProduct);
    }

    public function index(){
        $viewProduct=DB::table('products')
        ->leftJoin('categories','products.CategoryID','=','categories.id')
        ->select('products.*','categories.name as cName')
        ->get();
        
        return view('showProduct')->with('products',$viewProduct);
    }
}
