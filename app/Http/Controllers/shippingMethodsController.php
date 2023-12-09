<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shippingMethods;
use Carbon\Carbon;

class shippingMethodsController extends Controller
{
    //shipping_methods
    function shipping_methods(){
        $shippingMethods = shippingMethods::all();
        return view('backend.shipping_methods.add', [
            'shippingMethods'=>$shippingMethods,
        ]);
    }

    function shipping_methods_store(Request $request){
        $request->validate([
            'type' => 'required',
            'text' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        shippingMethods::insert([
            'type' => $request->type,
            'text' => $request->text,
            'amount' => $request->amount,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Shipping Methods successfully');
    }

    public function editShipping(Request $request, $id) {
        $shipping = shippingMethods::find($id);
    
        return response()->json([
            'status' => 200,
            'shipping' => $shipping,
        ]);
    }
    function shipping_methods_update(Request $request){
        $request->validate([
            'type' => 'required',
            'text' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        shippingMethods::where('id', $request->shipping_id)->update([
            'type' => $request->type,
            'text' => $request->text,
            'amount' => $request->amount,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Shipping Methods updated successfully');
    }

    function shipping_methods_delete($id){
        shippingMethods::find($id)->delete();
        return back()->withError('Shipping Methods Delete successfully');
    }
}
