<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Billingdetails;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\setting;

class invoiceController extends Controller
{
    //invoice_download
    function invoice_download($order_id){
        $data = Order::find($order_id);
        $billingdetails = Billingdetails::where('order_id', $data->order_id)->get();
        $order_id = Order::where('order_id', $data->order_id)->get();
        $order_product = OrderProduct::where('order_id', $data->order_id)->get();
        $setting = setting::all();
        $invoice = PDF::loadView('invoice.invoice', [
            'data'=>$data,
            'billingdetails'=>$billingdetails,
            'order_product'=>$order_product,
            'setting'=>$setting,
            'order_id'=>$order_id,
        ]);
        return $invoice->download('invoice.pdf');
    } 
}
