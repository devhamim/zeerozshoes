<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\inventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cardController extends Controller
{
     // add_cart
     function add_card(Request $request){
        $request->validate([
            'color_id'=>'required',
            'size_id'=>'required',
            'quantity'=>'required',
        ]);
    if(Auth::guard('customerlogin')->id()){
            $quantity = inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first()->quantity;
            if($quantity >= $request->quantity){
                if(card::where('product_id', $request->product_id)->where('customer_id', Auth::guard('customerlogin')->id())->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){
                    card::where('product_id', $request->product_id)->where('customer_id', Auth::guard('customerlogin')->id())->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);

                    toast('Card update Successfully','success');
                    return back();
                }
                else{
                    card::insert([
                        'customer_id'=>Auth::guard('customerlogin')->id(),
                        'product_id'=>$request->product_id,
                        'color_id'=>$request->color_id,
                        'size_id'=>$request->size_id,
                        'quantity'=>$request->quantity,
                        'created_at'=>Carbon::now(),
                    ]);
                    toast('Card add Successfully','success');
                    return back();
                }
            }
            else{
                toast('Out of stock','error');
                return back();
            }
        }

        else{
            toast('Please login your account','info');
            return redirect()->route('reg.login');
        }
     }


    //  card
    function card(){
        $cards = card::where('customer_id', Auth::guard('customerlogin')->id())->get();
        return view('frontend.card', [
            'cards'=>$cards,
        ]);
    }

     // card update
     function card_update(Request $request){
        $cards = $request->all();
        foreach($cards['quantity'] as $card_id=>$quantity){
            card::find($card_id)->update([
                'quantity'=>$quantity,
            ]);

        }
        toast('Card update successfully', 'success');
        return back();
    }

    // cart remove
    function card_remove($card_id){
        card::find($card_id)->delete();
        toast('Delete successfully', 'error');
        return back();
    }
}
