<?php

namespace App\Http\Controllers;

use App\Models\wish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishController extends Controller
{
    // //add_wish
    // function add_wish(){
    //     return view('frontend.wishlist');
    // }
    
    
    
    
    //add_wish
    function add_wish(Request $request){
        if(Auth::guard('customerlogin')->id()){
            wish::insert([
                'customer_id'=>Auth::guard('customerlogin')->id(),
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'created_at'=>Carbon::now(),
            ]);
            toast('Wish add successfully', 'success');
            return back();
        }
        else{
            toast('Please Login', 'warning');
            return redirect()->route('reg.login');
        }
        
    }


    // wish_remove
    function wish_remove($id){
        wish::find($id)->delete();
        toast('Wish Delete', 'error');
        return back();
    }


}
