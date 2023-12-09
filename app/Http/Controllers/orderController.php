<?php

namespace App\Http\Controllers;

use App\Models\Billingdetails;
use App\Models\CustomerAuth;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use str;

class orderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //order_list
    function order_list(){
        $orders = OrderProduct::orderBy("id", "desc")->get();
        $order_list = Order::orderBy("id", "desc")->get() ;
        $customers  = CustomerAuth::all();
        return view('backend.order.order_list', [
            'orders'=>$orders,
            'customers'=>$customers,
            'order_list'=>$order_list,
        ]);
    }

    //order delivered
    function order_delivere(Request $request){

        if($request->order_delivere == 1){
            $order_list = OrderProduct::where('status','!=', 4)->orderBy("id", "desc")->get() ;
            return view('backend.order.order_nondelivered', [
                'order_list'=>$order_list,
            ]);
        }
        else{
            $order_list = OrderProduct::where('status', 4)->orderBy("id", "desc")->get() ;
            return view('backend.order.order_delivered', [
                'order_list'=>$order_list,
            ]);
        }
        // $orders = OrderProduct::all();
        // $order_list = Order::where('status', 4)->orderBy("id", "desc")->get() ;
        // $customers  = CustomerAuth::all();
        // return view('backend.order.order_delivered', [
        //     'orders'=>$orders,
        //     'customers'=>$customers,
        //     'order_list'=>$order_list,
        // ]);
    }


    function order_details($order_id){
        $order_ids = "#".$order_id;
        $orders_details = Order::where('order_id', $order_ids)->get();
        $billingdetails = Billingdetails::where('order_id', $order_ids)->get();
        $orderproducts = OrderProduct::where('order_id', $order_ids)->get();
        return view('backend.order.order_details', [
            'orders_details'=>$orders_details,
            'billingdetails'=>$billingdetails,
            'orderproducts'=>$orderproducts,
        ]);
    }

    // order_update
    function order_update(Request $request){
        $after_explode = explode(',', $request->status);
        Order::where('order_id', $after_explode[0])->update([
            'status'=>$after_explode[1],
        ]);

        OrderProduct::where('order_id', $after_explode[0])->update([
            'status'=>$after_explode[1],
        ]);
        return back();
    }

    // order.delete
    function order_delete($order_id){
        OrderProduct::find($order_id)->delete();
        return back();
    }
}
