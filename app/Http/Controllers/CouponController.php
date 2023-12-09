<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CouponController extends Controller
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
    //coupon
    function coupon_add() {
        return view('frontend.coupon.coupon');
    }

    function coupon_store(Request $request) {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_amount' => 'required',
            'coupon_validity' => 'required',
        ]);
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_amount' => $request->coupon_amount,
            'validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Cupon added successfully');
    }

    // coupon_list
    function coupon_list() {
        $coupons = Coupon::all();
        return view('frontend.coupon.coupon_list', [
            'coupons' => $coupons,
        ]);
    }

    // coupon_edit
    function coupon_edit($coupon_id) {
        $coupon = Coupon::find($coupon_id);
        return view('frontend.coupon.coupon_edit', compact(['coupon']));
    }

    // coupon_delete
    function coupon_delete($coupon_id) {
        Coupon::find($coupon_id)->delete();
        return back()->withSuccess('Coupon deleted successfully');
    }

    // coupon_update
    function coupon_update(Request $request) {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_amount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::where('id', $request->coupon_id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_amount' => $request->coupon_amount,
            'validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Coupon updated successfully');
    }

    // check_coupon_code
    function check_coupon_code(Request $request) {
        $coupon_name = $request->coupon_code;
        if(Coupon::where('coupon_name', $coupon_name)->exists()) {
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            
            if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_name)->first()->validity)  {
                return response()->json([
                    'status' => 'Coupon code has been expired.',
                    'error_status' => 'error'
                ]);
            } else {
                $totalprice = "0";
                $cookie_data = stripslashes(Cookie::get('shopping_cart'));
                $cart_data = json_decode($cookie_data, true);

                foreach($cart_data as $itemdata) {
                    $products = Product::find($itemdata['item_id']);
                    $product_price = $products->after_discount;
                    $totalprice = $totalprice + ($itemdata['item_quantity']*$product_price);
                }
                $discount_price = $coupon->coupon_amount;
                $grand_total = $totalprice - $discount_price;

                return response()->json([
                    'discount_price' => '৳ '.$discount_price.'',
                    'grand_total_price' => '৳ '.$grand_total.'',
                    'coupon_code' => $coupon_name,
                ]);
            }
        } else {
            return response()->json([
                'status' => 'Coupon code does not exists.',
                'error_status' => 'error',
            ]);
        }
    }
}
