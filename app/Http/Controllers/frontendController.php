<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\card;
use App\Models\category;
use App\Models\color;
use App\Models\customerlogin;
use App\Models\gallery;
use App\Models\inventory;
use App\Models\order;
use App\Models\product;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class frontendController extends Controller
{
    //index
    function index()
    {
        $products = product::where('status', 1)->get();
        $brands = brand::all();
        return view('frontend.home', [
            'products' => $products,
            'brands' => $brands,
        ]);
    }


    //singel_product
    function singel_product($slug)
    {
        $products = product::where('slug', $slug)->get();
        $similer_product = product::where('category_id',  $products->first()->category_id)->where('id', '!=',  $products->first()->id)->get();
        $available_color = inventory::where('product_id', $products->first()->id)
            ->groupBy('color_id')
            ->selectRaw('count(*) as total, color_id')->get();
        $sizes = size::all();
        $colors = color::all();
        $brands = brand::all();
        $gallerys = gallery::where('product_id', $products->first()->id)->get();
        return view('frontend.single_product', [
            'products' => $products,
            'brands' => $brands,
            'gallerys' => $gallerys,
            'similer_product' => $similer_product,
            'available_color' => $available_color,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }

    // prodct size ajax url
    function getsize(Request $request)
    {
        $sizes = inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        $str = '';

        foreach ($sizes as $size) {
            $str .= '<div class="form-check size-option form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="size_id" id="' . $size->rel_to_size->id . '" value="' . $size->rel_to_size->id . '">
                        <label class="form-option-label" for="' . $size->rel_to_size->id . '">' . $size->rel_to_size->name . '</label>
                    </div>';
        }

        echo $str;
    }


    //about
    function about()
    {
        return view('frontend.about');
    }
    //category
    function category()
    {
        $categorys = category::paginate(12);
        return view('frontend.category', [
            'categorys' => $categorys,
        ]);
    }
    //contact
    function contact()
    {
        return view('frontend.contact');
    }
    //customer_profile
    function customer_profile()
    {
        return view('frontend.profile');
    }
    //customer_order
    function customer_order()
    {
        $order_product = order::where('customer_id', Auth::guard('customerlogin')->id())->get();
        return view('frontend.customer_order', [
            'order_product' => $order_product,
        ]);
    }


    // customer profile update
    function profile_store(Request $request)
    {
        if ($request->password == '') {
            if ($request->photo == '') {
                customerlogin::find(Auth::guard('customerlogin')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'address' => $request->address,
                ]);
                toast('Profile Update successfully', 'success');
                return back();
            } else {
                $customer_photo = $request->photo;
                $extention = $customer_photo->getClientOriginalExtension();
                $file_name = Auth::guard('customerlogin')->id() . '.' . $extention;
                Image::make($customer_photo)->resize(720, 720)->save(public_path('uplode/customerprofile/' . $file_name));

                customerlogin::find(Auth::guard('customerlogin')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'address' => $request->address,
                    'photo' => $file_name,
                ]);
                toast('Profile Update successfully', 'success');
                return back();
            }
        } else {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required',
            ]);

            if (Hash::check($request->old_password, Auth::guard('customerlogin')->user()->password)) {
                customerlogin::find(Auth::guard('customerlogin')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            } else {
                toast('Old Password Wrong', 'success');
                return back();
            }
            if ($request->photo == '') {
                customerlogin::find(Auth::guard('customerlogin')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
                toast('Profile Update successfully', 'success');
                return back();
            } else {
                $customer_photo = $request->photo;
                $extention = $customer_photo->getClientOriginalExtension();
                $file_name = Auth::guard('customerlogin')->id() . '.' . $extention;
                Image::make($customer_photo)->resize(720, 720)->save(public_path('uplode/customerprofile/' . $file_name));

                customerlogin::find(Auth::guard('customerlogin')->id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'photo' => $file_name,
                ]);
                toast('Profile Update successfully', 'success');
                return back();
            }
        }
    }


    //wishlist
    function wishlist()
    {
        return view('frontend.wishlist');
    }
    //login_reg
    function reg_login()
    {
        return view('frontend.regLogin');
    }
}
