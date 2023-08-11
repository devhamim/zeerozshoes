<?php

namespace App\Http\Controllers;

use App\Mail\invoiceMail;
use App\Models\billingdetailss;
use App\Models\card;
use App\Models\inventory;
use App\Models\order;
use App\Models\orderproduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Support\Facades\Mail;

class checkoutController extends Controller
{
        //  checkout
        function checkout(){
            $cound_count = card::where('customer_id', Auth::guard('customerlogin')->id())->count();
            $cards = card::where('customer_id', Auth::guard('customerlogin')->id())->get();
            return view('frontend.checkout', [
                'cards'=>$cards,
                'cound_count'=>$cound_count,
            ]);
        }

         // order store
    function orders_stores(Request $request){

        $request->validate([
            '*'=>'required',
        ]);

        // cash on delivery
        if($request->payment_method == 1) {
        // order
        $order_id = Str::random(3).'-'.rand(10000000,999999999);
        order::insert([
            'order_id'=>$order_id,
            'customer_id'=>Auth::guard('customerlogin')->id(),
            'sub_total'=>$request->sub_total,
            'total'=>$request->sub_total + $request->charge,
            'charge'=>$request->charge,
            'payment_method'=>$request->payment_method,
            'created_at'=>Carbon::now(),
        ]);

        // billing details
        billingdetailss::insert([
            'order_id'=>$order_id,
            'customer_id'=>Auth::guard('customerlogin')->id(),
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'notes'=>$request->notes,
            'created_at'=>Carbon::now(),
        ]);


        // oder product

        $cards = card::where('customer_id', Auth::guard('customerlogin')->id())->get();

        foreach($cards as $card){
            orderproduct::insert([
                'order_id'=>$order_id,
                'customer_id'=>Auth::guard('customerlogin')->id(),
                'product_id'=>$card->product_id,
                'price'=>$card->rel_to_pro->total_price,
                'color_id'=>$card->color_id,
                'size_id'=>$card->size_id,
                'quantity'=>$card->quantity,
                'created_at'=>Carbon::now(),
            ]);


            inventory::where('product_id', $card->product_id)->where('color_id', $card->color_id)->where('size_id', $card->size_id)->decrement('quantity', $card->quantity);



            //card delete after order
            card::where('customer_id', Auth::guard('customerlogin')->id())->delete();
        }

        return redirect()->route('order-success')->with([
            'order_id'=>$order_id,
        ]);
        }
         // cash on delivery end

    }

    function order_success(){
        if(session('order_id')){
            return view('frontend.order_success');
        }
        else{
            echo 'nai';
        }
    }
}
