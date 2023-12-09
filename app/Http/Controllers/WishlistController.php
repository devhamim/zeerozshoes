<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    function wishlist() {
        $categories = Category::all();
        $cookie_data = stripslashes(Cookie::get('shopping_wishlist'));
        $wishlist_data = json_decode($cookie_data, true);
        return view('frontend.wishlist.wishlist', [
            'categories' => $categories,
        ])->with('wishlist_data',$wishlist_data);
    }
    //add_wishlist
    function add_wishlist(Request $request) {
        $prod_id = $request->input('product_id');
        if(Inventory::where('product_id', $prod_id)->where('color_id', 0)->where('size_id', 0)->exists()) {
            if((Inventory::where('product_id', $prod_id)->where('color_id', 0)->where('size_id', 0)->first()->quantity) > 0) {
                $product_info = Product::find($prod_id);
                if(Cookie::get('shopping_wishlist'))
                {
                    $cookie_data = stripslashes(Cookie::get('shopping_wishlist'));
                    $wishlist_data = json_decode($cookie_data, true);
                }
                else
                {
                    $wishlist_data = array();
                }
                
                $item_id_list = array_column($wishlist_data, 'item_id');
                $prod_id_is_there = $prod_id;

                if(in_array($prod_id_is_there, $item_id_list)) {
                    foreach($wishlist_data as $keys => $values)
                    {
                        if($wishlist_data[$keys]["item_id"] == $prod_id)
                        {
                            $wishlist_data[$keys]["item_quantity"] = 1;
                            $wishlist_data[$keys]["item_size"] = 0;
                            $wishlist_data[$keys]["item_color"] = 0;
                            $item_data = json_encode($wishlist_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('shopping_wishlist', $item_data, $minutes));
                            return response()->json(['status'=>'"'.$wishlist_data[$keys]["item_name"].'" Already Added to Wishlist']);
                        }
                    }
                }  else {
                    $products = Product::find($prod_id);
                    $prod_name = $products->product_name;
                    $prod_slug = $products->slug;
                    $prod_image = $products->preview_image;
                    $priceval = $products->after_discount;
    
                    if($products)
                    {
                        $item_array = array(
                            'item_id' => $prod_id,
                            'item_name' => $prod_name,
                            'item_quantity' => 1,
                            'item_size' => 0 ,
                            'item_color' => 0 ,
                            'item_price' => $priceval,
                            'item_image' => $prod_image,
                            'item_slug' => $prod_slug
                        );
                        $wishlist_data[] = $item_array;
    
                        $item_data = json_encode($wishlist_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_wishlist', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$prod_name.'" Added to Wishlist']);
                    }
                }
            } else {
                return response()->json(['status'=> 'Out of stock']);
            }
                        
            // if(Inventory::where('product_id', $prod_id)->where('color_id', 0)->where('size_id', 0)->first()->quantity == 0) {
                
                


            // } else {
            //     return response()->json(['status'=> 'Product has color and size']);
            // }

            
        } else {
            return response()->json(['status'=> 'Product has color and size']);
        }
    }

    // delete_from_wishlist
    function delete_from_wishlist(Request $request) {
        $prod_id = $request->input('product_id');
        
        $cookie_data = stripslashes(Cookie::get('shopping_wishlist'));
        $wishlist_data = json_decode($cookie_data, true);

        $item_id_list = array_column($wishlist_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($wishlist_data as $keys => $values)
            {
                if($wishlist_data[$keys]["item_id"] == $prod_id)
                {
                    unset($wishlist_data[$keys]);
                    $item_data = json_encode($wishlist_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_wishlist', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Wishlist']);
                }
            }
        }
    }

    // wishlist_to_cart
    function wishlist_to_cart(Request $request) {
        $prod_id = $request->input('product_id');
        $product_info = Product::find($prod_id);

        // Add to cart
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list)) {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = 1;
                    $cart_data[$keys]["item_size"] = 0;
                    $cart_data[$keys]["item_color"] = 0;
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                }
            }
        }  else {
            $products = Product::find($prod_id);
            $prod_name = $products->product_name;
            $prod_slug = $products->slug;
            $prod_image = $products->preview_image;
            $priceval = $products->after_discount;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => 1,
                    'item_size' => 0 ,
                    'item_color' => 0 ,
                    'item_price' => $priceval,
                    'item_image' => $prod_image,
                    'item_slug' => $prod_slug
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
    }

    // Remove wishlist
    function wishlist_clear() {
        Cookie::queue(Cookie::forget('shopping_wishlist'));
        return redirect()->route('site')->withSuccess('Your wishlist is cleared');
        // return response()->json(['status'=>'Item Removed from Cart']);
    }
}
