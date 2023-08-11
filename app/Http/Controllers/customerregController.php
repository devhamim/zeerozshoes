<?php

namespace App\Http\Controllers;

use App\Models\customerLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customerregController extends Controller
{
    //customer_regstore
    function customer_regstore(Request $request){
        $request->validate([
            '*'=>'required',
        ]);
        customerlogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        
        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            toast('login Successfully','success');
            return redirect('/');
        }
    }
}

