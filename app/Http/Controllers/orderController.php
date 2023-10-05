<?php

namespace App\Http\Controllers;

use App\Models\billingdetailss;
use App\Models\order;
use App\Models\orderproduct;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = order::all();
        // $order_product = orderproduct::where('order_id', $orders->first()->order_id)->get();
        return view('backend.order.index', [
            'orders'=>$orders,
            // 'order_product'=>$order_product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function orderproduct(string $order_id)
    {
        // $orders = order::find($order_id);
        $order_product = orderproduct::where('order_id', $order_id)->get();
        $billingdetails = billingdetailss::where('order_id', $order_id)->get();
        $orders = order::where('order_id', $order_id)->get();
        return view('backend.order.orderproduct', [
            'order_product'=>$order_product,
            'billingdetails'=>$billingdetails,
            'orders'=>$orders,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function order_status(Request $request, $id)
    {
        $after_explode = explode(',', $request->status);
        order::where('order_id', $after_explode[0])->update([
            'status'=>$after_explode[1],
        ]);

        toast('Order status update successfully','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        order::find($id)->delete();

        toast('Order delete successfully','error');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    // public function orderproduct_destroy( $id)
    // {
    //     orderproduct::find($id)->delete();
    //     toast('Order product delete successfully','error');
    //     return back();
    // }
}
