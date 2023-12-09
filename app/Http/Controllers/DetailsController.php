<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\terms_condition;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //product_details
    function product_details($slug) {
        $returns = terms_condition::all();
        $product_info = Product::where('slug', $slug)->get();
        $related_products = Product::where('category_id', $product_info->first()->category_id)->where('status', 1)->where('id', '!=', $product_info->first()->id)->get();
        $product_gallery = ProductGallery::where('product_id', $product_info->first()->id)->get();
        $categories = Category::all();
        $available_colors = Inventory::where('product_id', $product_info->first()->id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')->get();
        
        return view('frontend.product_details.product_details', [
            'categories' => $categories,
            'product_info' => $product_info,
            'available_colors' => $available_colors,
            'product_gallery' => $product_gallery,
            'related_products' => $related_products,
            'returns' => $returns,
        ]);
    }

    // getSize
    function getSize(Request $request) {
        $product_id = $request->product_id;
        $color_id = $request->color_id;

        $sizes = Inventory::where('product_id', $product_id)->where('color_id', $color_id)->get();
        
        $str = '<option value="">Select a size</option>';
        foreach($sizes as $size) {
            if($size->size_id == 0) {
                $size_name = "No size";
                $size_id = 0;
            } else {
                $size_name = $size->rel_to_size->size_name;
                $size_id = $size->size_id;
            }
            $str .= '<option value="'.$size_id.'">'.$size_name.'</option>';
            // $str .= '<option value="'.$size_id.'">'.$size_name.'</option>';
        }
        echo $str;


    }

    function quick_get_size(Request $request) {
        $product_id = $request->product_id;
        $color_id = $request->color_id;

        $sizes = Inventory::where('product_id', $product_id)->where('color_id', $color_id)->get();
        
        // $str = '<option value="">Select a size</option>';
        foreach($sizes as $size) {
            echo $size->size_id;
            // if($size->size_id == 0) {
            //     $size_name = "No size";
            //     $size_id = 0;
            // } else {
            //     $size_name = $size->rel_to_size->size_name;
            //     $size_id = $size->size_id;
            // }
            // $str .= '<option value="'.$size_id.'">'.$size_name.'</option>';
        }
        // echo $str;
    }
}
