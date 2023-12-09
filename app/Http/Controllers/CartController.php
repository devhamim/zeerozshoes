<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    // cart
    function cart() {
        $categories = Category::all();
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        // return $cart_data;
        return view('frontend.cart.cart', compact(['categories']))->with('cart_data',$cart_data);
    }

    function update_cart(Request $request) {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        $cookie_data = Cookie::get('shopping_cart');
    
        if ($cookie_data) {
            $cart_data = json_decode($cookie_data, true);
    
            if (json_last_error() === JSON_ERROR_NONE) {
                $item_id_list = array_column($cart_data, 'item_id');
    
                if (in_array($prod_id, $item_id_list)) {
                    foreach ($cart_data as $keys => $values) {
                        if ($cart_data[$keys]["item_id"] == $prod_id) {
                            // Update the cart data
                            $cart_data[$keys]["item_quantity"] =  $quantity;
    
                            // Update and return the updated cookie
                            $item_data = json_encode($cart_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
    
                            $ttprice = ($cart_data[$keys]["item_price"] * $quantity);
                            $grandtotalprice = number_format($ttprice);
    
                            return response()->json([
                                'status' => '"' . $cart_data[$keys]["item_name"] . '" Quantity Updated',
                                'gtprice' => '৳ ' . $grandtotalprice . ''
                            ]);
                        }
                    }
                } else {
                    // Handle the case where the product ID is not found in the cart
                    return response()->json(['error' => 'Product not found in the cart'], 404);
                }
            } else {
                // Handle JSON decoding error
                return response()->json(['error' => 'Invalid JSON data in the cookie'], 400);
            }
        } else {
            // Handle the case where 'shopping_cart' cookie doesn't exist
            return response()->json(['error' => 'Shopping cart cookie not found'], 404);
        }
    }


    // delete_from_cart
    function delete_from_cart(Request $request) {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }

    // clear_cart
    function clear_cart() {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
        return redirect()->route('site')->withSuccess('Your cart is cleared');
    }


}
