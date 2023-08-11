<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\size;
use Illuminate\Http\Request;

class shopController extends Controller
{
      //shop
      function shop(Request $request){
         // search
         $data = $request->all();


         $based_on = 'created_at';
         $order = 'DESC';
         if(!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined'){
             if($data['sort'] == 1){
                 $based_on = 'title';
                 $order = 'ASC';
             }
             elseif($data['sort'] == 2){
                 $based_on = 'title';
                 $order = 'DESC';
             }
             elseif($data['sort'] == 3){
                 $based_on = 'total_price';
                 $order = 'DESC';
             }
             elseif($data['sort'] == 4){
                 $based_on = 'total_price';
                 $order = 'ASC';
             }
             else{
                 $based_on = 'created_at';
                 $order = 'DESC';
             }

         }

         $products = product::where(function($q) use ($data){
             if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined'){
                 $q->where(function($q) use ($data){
                     $q->where('title', 'like', '%'.$data['q'].'%');
                     $q->orWhere('sort_desp', 'like', '%'.$data['q'].'%');
                     $q->orWhere('long_desp', 'like', '%'.$data['q'].'%');
                     $q->orWhere('meta_title', 'like', '%'.$data['q'].'%');
                     $q->orWhere('meta_desp', 'like', '%'.$data['q'].'%');
                 });
             }
             if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined'){
                 $q->where('category_id', $data['category_id']);
             }
             if(!empty($data['brand_id']) && $data['brand_id'] != '' && $data['brand_id'] != 'undefined'){
                 $q->where('brand_id', $data['brand_id']);
             }
             if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined' || !empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined'){
                 $q->whereHas('rel_to_inventore', function ($q) use ($data){
                     if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined'){
                         $q->whereHas('rel_to_color', function ($q) use ($data){
                             $q->where('colors.id', $data['color_id']);
                         });
                     }
                     if(!empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined'){
                         $q->whereHas('rel_to_size', function ($q) use ($data){
                             $q->where('sizes.id', $data['size_id']);
                         });
                     }
                 });
             }
             if(!empty($data['min']) && $data['min'] != '' && $data['min'] != 'undefined' || !empty($data['max']) && $data['max'] != '' && $data['max'] != 'undefined'){
                 $q->whereBetween('total_price', [$data['min'],$data['max']]);
             }

         })->orderBy($based_on, $order)->where('status', 1)->paginate(6)->withQueryString();

         // search product count
         $products_count = $products->count();

         $categorys = category::all();
         $colors = color::all();
         $sizes = size::all();

        // $products = product::where('status', 1)->get();
        $brands = brand::all();
        return view('frontend.shop', [
            'brands'=>$brands,
            'products'=>$products,
            'categorys'=>$categorys,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'products_count'=>$products_count,
        ]);
    }
}
