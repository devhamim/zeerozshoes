<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\customerlogin;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = customerlogin::count();
        $products = product::count();
        $order = order::count();
        $brands = brand::count();
        return view('backend.dashboard.dashboard', [
            'customers'=>$customers,
            'products'=>$products,
            'order'=>$order,
            'brands'=>$brands,
        ]);
    }

    // user_list
    function user_list(){
        $users = User::all();
        return view('backend.user.index', [
            'users'=>$users,
        ]);
    }

    // user_register
    function user_register(Request $request){
        $request->validate([
            '*'=>'required',
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        toast('Add Successfully','success');
        return back();
    }

    // user_delete
    function user_delete($id){
        User::find($id)->delete();
        toast('Delete Successfully','error');
        return back();
    }
}
