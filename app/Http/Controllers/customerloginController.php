<?php

namespace App\Http\Controllers;

use App\Models\customerlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customerloginController extends Controller
{
    //customer_login
    function customer_login(Request $request){
        $request->validate([
            '*'=>'required',
        ]);
        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            toast('login Successfully','success');
            return redirect('/');
        }
        else{
            toast('password not match','error');
            return back();
        }
    }

    // customer logout
    function customer_logout(){
        Auth::guard('customerlogin')->logout();
        return redirect('/');
    }
}
