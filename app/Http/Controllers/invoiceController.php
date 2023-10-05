<?php

namespace App\Http\Controllers;

use App\Models\billingdetailss;
use App\Models\order;
use App\Models\orderproduct;
use App\Models\setting;
use Illuminate\Http\Request;
use PDF;

class invoiceController extends Controller
{
    //invoice_download
    function invoice_download($order_id){
        $data = order::find($order_id);
        $billingdetails = billingdetailss::where('order_id', $data->order_id)->get();
        $order_product = orderproduct::where('order_id', $data->order_id)->get();
        $setting = setting::all();
        $invoice = PDF::loadView('invoice.invoice', [
            'data'=>$data,
            'billingdetails'=>$billingdetails,
            'order_product'=>$order_product,
            'setting'=>$setting,
        ]);
        return $invoice->download('invoice.pdf');
    } 
}
