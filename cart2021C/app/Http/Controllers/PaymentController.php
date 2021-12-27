<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use DB;
use Auth;
use Session;
use Notification;
use App\Models\myCart;
use App\Models\myOrder;

class PaymentController extends Controller
{
    

     public function paymentPost(Request $request)
    {
	       
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        //Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        $newOrder=myOrder::Create([
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(),
            'amount'=>$request->sub,
        ]);
            
        $orderID=DB::table('my_orders')->where('userID','=',Auth::id())->orderBy('created_at','desc')->first();

        $item=$request->input('cid');
        foreach($item as $item=>$value){
            $carts=myCart::find($value);
            $carts->orderID=$orderID->id;
            $carts->save();
        }
        
        $email='D200245C@sc.edu.my'; //receiver email
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));

        Session::flash('success','Order successfully!');
           
        return back();
    }


    public function viewOrder(){
        $viewOrder=DB::table('my_orders')
        ->select('my_orders.*')
        ->get();
        
        return view('myOrder')->with('orders',$viewOrder);
    }
}
