<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

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
        $currentMonth = now()->format('Y-m');

        $month_order =  DB::table('orders')
            ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])
            ->sum('total');
            
        $todayOrders = Order::whereDate('created_at', now()->toDateString())->count();
        $product_id = Product::all();
        $orders_list = Order::all();
        $products_count = Product::count();
        $users_count = User::count();
        $orders_count = Order::count();
        $total_processing = Order::where('status', 1)->count();
        $total_pending = Order::where('status', 3)->count();
        $total_hold = Order::where('status', 0)->count();
        $total_completed = Order::where('status', 2)->count();
        $total_cancel = Order::where('status', 4)->count();
        $total_ondelevary = Order::where('status', 5)->count();
        $total_pendinginvoice = Order::where('status', 6)->count();
        return view('home', [
            'orders_count'=>$orders_count,
            'users_count'=>$users_count,
            'products_count'=>$products_count,
            'orders_list'=>$orders_list,
            'month_order'=>$month_order,
            'total_processing'=>$total_processing,
            'total_pending'=>$total_pending,
            'total_hold'=>$total_hold,
            'total_completed'=>$total_completed,
            'total_cancel'=>$total_cancel,
            'total_pendinginvoice'=>$total_pendinginvoice,
            'total_ondelevary'=>$total_ondelevary,
            'todayOrders'=>$todayOrders,
            'statusCounts' => [
                'hold' => $total_processing,
                'pending' => $total_pending,
                'processing' => $total_hold,
                'completed' => $total_completed,
                'cancel' => $total_cancel,
                'ondelevary' => $total_ondelevary,
                'pendinginvoice' => $total_pendinginvoice,
            ],
        ]);
    }


}
