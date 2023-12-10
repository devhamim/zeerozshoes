<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BuyController extends Controller
{
    //buy_store
    function buy_store(Request $request) {
    if($request->btn == 2){
         $prod_id = $request->input('product_id');
         $quantity = $request->input('quantity');
 
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
 
         if(in_array($prod_id_is_there, $item_id_list))
         {
             foreach($cart_data as $keys => $values)
             {
                 if($cart_data[$keys]["item_id"] == $prod_id)
                 {
                     $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                     $item_data = json_encode($cart_data);
                     $minutes = 60;
                     Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                     return redirect()->route('checkout');
                 }
             }
         }
         else
         {
             $products = Product::find($prod_id);
             $prod_name = urlencode($products->product_name);
             $prod_slug = $products->slug;
             $prod_image = $products->preview_image;
             $priceval = $products->product_discount;
             $product_price = $products->product_price?? 0;
 
             if($products)
             {
                 $item_array = array(
                     'item_id' => $prod_id,
                     'item_name' => $prod_name,
                     'item_quantity' => $quantity,
                     'item_price' => $priceval,
                     'item_image' => $prod_image,
                     'item_slug' => $prod_slug,
                     'product_price' => $product_price,
                 );
                 $cart_data[] = $item_array;
 
                 $item_data = json_encode($cart_data);
                 $minutes = 60;
                 Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                 return redirect()->route('checkout');
             }
         }
        }

    else{
        $prod_id = $request->input('product_id');
         $quantity = $request->input('quantity');
 
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
 
         if(in_array($prod_id_is_there, $item_id_list))
         {
             foreach($cart_data as $keys => $values)
             {
                 if($cart_data[$keys]["item_id"] == $prod_id)
                 {
                     $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                     $item_data = json_encode($cart_data);
                     $minutes = 60;
                     Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                     return back()->withError('Cart Already exists');
                 }
             }
         }
         else
         {
             $products = Product::find($prod_id);
             $prod_name = $products->product_name;
             $prod_slug = $products->slug;
             $prod_image = $products->preview_image;
             $priceval = $products->product_discount;
             $product_price = $products->product_price?? 0;
 
             if($products)
             {
                 $item_array = array(
                     'item_id' => $prod_id,
                     'item_name' => $prod_name,
                     'item_quantity' => $quantity,
                     'item_price' => $priceval,
                     'item_image' => $prod_image,
                     'item_slug' => $prod_slug,
                     'product_price' => $product_price,
                 );
                 $cart_data[] = $item_array;
 
                 $item_data = json_encode($cart_data);
                 $minutes = 60;
                 Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                 return back()->withSuccess('Added to Cart');
                //  return response()->json(['status'=>'"Added to Cart']);
             }
         }
        }
    }
}
