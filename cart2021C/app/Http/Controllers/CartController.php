<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\myCart;
use App\Models\Product;

class CartController extends Controller
{
    public function _contruct(){
        $this->middleware('auth');
    }
    
    public function add(){
        $r=request();
        $addCart=myCart::Create([
            'productID'=>$r->productID,
            'quantity'=>$r->quantity,
            'userID'=>Auth::id(),
            'orderID'=>'',
        ]);
        return redirect()->route('show.my.cart');
    }

    public function showMyCart(){
        $carts=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select('my_carts.quantity as cartQTY','my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','')// '' means haven't make payment
        ->where('my_carts.userID','=',Auth::id())
        //->get();
        ->paginate(5); //5 = 5 items in one page

        $this->cartItem();

        return view('myCart')->with('carts',$carts);
    }

    public function delete($id){

        $deleteItem=myCart::find($id); //binding record
        $deleteItem->delete(); //delete record
        Session::flash('success',"Item was removed successfully!");
        return redirect()->route('show.my.cart');
    }

    public function cartItem(){
        if(Auth::id()!=""){
            $noItem=DB::table('my_carts')
            ->leftjoin('products','products.id','=','my_carts.productID')
            ->select(DB::raw('COUNT(*) as count_item'))
            ->where('my_carts.orderID','=','')//'' means haven't make payment
            ->where('my_carts.userID','=',Auth::id())//item match with current user logined
            ->groupBy('my_carts.userID')
            ->first();
        }
        
        if($noItem==""){ 
            $cartItem='0';
        }
        else{
            $cartItem=$noItem->count_item;
        }
        Session()->put('cartItem',$cartItem);//assign value to session variable cartItem
        
    }
}
