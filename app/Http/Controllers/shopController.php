<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Cookie;

class ShopController extends Controller
{
    // shop
    function shop(Request $request) {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $brands = Brand::all();
        
        $data = $request->all();

        $sorting = 'created_at';
        $type = 'DESC';

        if(!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined') {
            if($data['sort'] == 1) {
                $sorting = 'after_discount';
                $type = 'ASC';
            }
            else if($data['sort'] == 2) {
                $sorting = 'after_discount';
                $type = 'DESC';
            }
            else if($data['sort'] == 3) {
                $sorting = 'product_name';
                $type = 'ASC';
            }
            else if($data['sort'] == 4) {
                $sorting = 'product_name';
                $type = 'DESC';
            }
            else if($data['sort'] == 5) {
                $sorting = 'product_discount';
                $type = 'ASC';
            }
            else if($data['sort'] == 4) {
                $sorting = 'product_discount';
                $type = 'DESC';
            }
        }

        $search_product = Product::where(function($q) use ($data) {
            if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined') {
                $q->where(function ($q) use ($data) {
                    $q->where('product_name', 'like', '%' . $data['q'] . '%');
                    $q->OrWhere('description', 'like', '%' . $data['q'] . '%');
                });
            }
            if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined') {
                $q->where('category_id', $data['category_id']);
            }
            if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined' || !empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined') {
                $q->whereHas('rel_to_inventories', function($q) use ($data) {
                    if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined') {
                        $q->whereHas('rel_to_color', function($q) use ($data) {
                            $q->where("colors.id", $data['color_id']);
                        });
                    }
                    if(!empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined') {
                        $q->whereHas('rel_to_size', function($q) use ($data) {
                            $q->where("sizes.id", $data['size_id']);
                        });
                    }
                });
            } 
            if(!empty($data['brand_id']) && $data['brand_id'] != '' && $data['brand_id'] != 'undefined') {
                $q->where('brand', $data['brand_id']);
            }
        })->orderBy($sorting, $type)->get();
        
        return view('frontend.shop.shop', [
            'categories' => $categories,
            'search_product' => $search_product,
            'colors' => $colors,
            'sizes' => $sizes,
            'brands' => $brands,
        ]);
        // return $data;
        
        // echo '<pre>';
        // echo($products);
        // die();
        // $products = Product::where('status', '1')->get();
        // $colors = Color::all();
        // $sizes = Size::all();

        
        
        

        // if(!empty($_GET['category'])) {
        //     $id = explode(',', $_GET['category']);
        //     $category_ids = Category::select('id')->whereIn('id', $id)->pluck('id')->toArray();
        //     $products = $products->whereIn('category_id', $category_ids);
        // } 
        
        
        // sortby
        // if(!empty($_GET['sortBy'])) {            
        //     if($_GET['sortBy'] == 'priceAsc') {
        //         $products = $products->sortBy('after_discount');
        //     }
        //     if($_GET['sortBy'] == 'priceDesc') {
        //         $products = $products->sortByDesc('after_discount');
        //     }
        //     if($_GET['sortBy'] == 'titleAsc') {
        //         $products = $products->sortBy('product_name');
        //     } 
        //     if($_GET['sortBy'] == 'titleDesc') {
        //         $products = $products->sortByDesc('product_name');
        //     }
        //     if($_GET['sortBy'] == 'disAsc') {
        //         $products = $products->sortBy('product_discount');
        //     }
        //     if($_GET['sortBy'] == 'disDesc') {
        //         $products = $products->sortByDesc('product_discount');
        //     }
        // }
        
        // if(!empty($_GET['brand'])) {
        //     $id = explode(',', $_GET['brand']);
        //     $brand_ids = Brand::select('id')->whereIn('id', $id)->pluck('id')->toArray();
        //     $products = $products->whereIn('brand', $brand_ids);
        // }
        // if(!empty($_GET['size'])) {
        //     $id = explode(',', $_GET['size']);
        //     $brand_ids = Inventory::select('size_id')->whereIn('size_id', $id)->pluck('id')->toArray();
        //     return $brand_ids;
        // }
        // $brands = Brand::with('products')->orderBy('brand_name', 'ASC')->get();
        // $category = Category::with('products')->orderBy('category_name', 'ASC')->get();
        // return view('frontend.shop.shop', [
        //     'categories' => $category,
        //     'products' => $products,
        //     'colors' => $colors,
        //     'brands' => $brands,
        //     'sizes' => $sizes,
        // ]);
    }

    function shop_filter(Request $request) {
        $data = $request->all();
        // Category filter
        $searchUrl = '';
        if(!empty($data['category'])) {
            foreach($data['category'] as $category) {
                if(empty($searchUrl)) {
                    $searchUrl .= '&category='.$category;
                } else {
                    $searchUrl .= ','.$category;
                }
            }
        }

        // Sort filter
        $sortByUrl = "";
        if(!empty($data['sortBy'])) {
            $sortByUrl .='&sortBy='.$data['sortBy'];
        }

        // Brand filter
        $brandUrl = "";
        if(!empty($data['brand'])) {
            foreach($data['brand'] as $brand) {
                if(empty($brandUrl)) {
                    $brandUrl .= '&brand='.$brand;
                } else {
                    $brandUrl .= ','.$brand;
                }
            }
            // dd($data);
            // $sortByBrand .='&brand='.$data['brand'];
        }

        // Size filter
        $sizeUrl = "";
        if(!empty($data['size'])) {
            foreach($data['size'] as $size) {
                if(empty($sizeUrl)) {
                    $sizeUrl .= '&size='.$size;
                } else {
                    $sizeUrl .= ','.$size;
                }
            }
        }

        return \redirect()->route('shop', $searchUrl.$sortByUrl.$brandUrl.$sizeUrl);
        // return \redirect()->route('shop', $searchUrl.$sortByUrl);
    }
}
