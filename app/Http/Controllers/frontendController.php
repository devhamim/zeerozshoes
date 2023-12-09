<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\privacy_policy;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\terms_condition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cookie;

class FrontendController extends Controller
{
    //home
    function home() {

       
        $categories = Category::all();
        $category= Category::take(6)->get();
        $products = Product::where('status', '1')->get();
        // $top_selling_products = Order::groupBy('product_id')
        // ->selectRaw('sum(total) as sum, product_id')
        // ->havingRaw('sum >= 1')
        // ->take(3)
        // ->orderBy('sum', 'DESC')
        // ->get();
        $latest_products = Product::where('status', '1')->latest()->get();
        $discount_products = Product::where('status', '1')->where('product_discount', '!=', null)->get();
        // $discount_products_count = Product::where('status', '1')->where('product_discount', '!=', null)->where('validity', '>', Carbon::now())->get();
        $banners = banner::all();

 
        return view('frontend.home.index', [
            'categories' => $categories,
            'categoryy' => $category,
            'products' => $products,
            'latest_products' => $latest_products,
            // 'top_selling_products' => $top_selling_products,
            'discount_products' => $discount_products,
            'banners' => $banners,

            // 'discount_products_count' => $discount_products_count,
        ]);
    }

    // category
    function category_one($category_id) {
        $categories = Category::all();
        $products = Product::where('status', '1')->where('category_id', $category_id)->get();
        $category_id_num = $category_id;
        return view('frontend.category.category_one', [
            'categories' => $categories,
            'products' => $products,
            'category_id_num' => $category_id_num,
        ]);
    }

    // category_two
    function category_two() {
        $categories = Category::all();
        $products = Product::where('status', '1')->get();
        return view('frontend.category.category_two', compact(['categories', 'products']));
    }

    

    // offer
    function offer() {
        $categories = Category::all();
        $products = Product::where('status', '1')->where('product_discount', '!=', null)->where('validity', '>', Carbon::now())->get();
        return view('frontend.offer.offer', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    function campaign() {
        $categories = Category::all();
        $products = Product::where('status', '1')->where('campaign', '1')->where('validity', '>', Carbon::now())->get();
        return view('frontend.campaign.campaign', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    function product_quick_view($product_id) {
        $product = Product::find($product_id);
        $product_gallery = ProductGallery::where('product_id', $product->id)->get();
        $available_colors = Inventory::where('product_id', $product->id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')
        ->get();

        $available_sizes = Inventory::where('product_id', $product->id)
        ->groupBy('size_id')
        ->selectRaw('count(*) as total, size_id')
        ->get();
        return view('frontend.home.product_quick_view.product_quick_view', [
            'product'=> $product,
            'colors'=> $available_colors,
            'sizes' => $available_sizes,
            'product_gallery' => $product_gallery,
        ]);
    }

    // about
    function about(){
        $categories = Category::all();
        return view('frontend.about.about', [
            'categories'=>$categories,
        ]);
    }

    // privacy_policy
    function privacy_policy(){
        $categories = Category::all();
        $privacy_policy = privacy_policy::all();
        return view('frontend.privacy_policy.privacy_policy', [
            'categories'=>$categories,
            'privacy_policy'=>$privacy_policy,
        ]);
    }

    // terms
    function terms(){
        $categories = Category::all();
        $terms = terms_condition::all();
        return view('frontend.terms.terms_and_condition', [
            'categories'=>$categories,
            'terms'=>$terms,
        ]);
    }
}
