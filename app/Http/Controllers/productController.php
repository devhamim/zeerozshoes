<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Size;
use Carbon\Carbon;
use Carbon\Cli\Invoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;
use Image;

class ProductController extends Controller
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
    
    //product_add
    function product_add() {
        $categories = Category::all();
        return view('backend.product.product', [
            'categories' => $categories,
        ]);
    }

    // product_store
    function product_store(Request $request) {
        $request->validate([
            'product_name'=> 'required',
            'description'=> 'required',
            'product_price'=> 'required',
            'sku'=> 'required',
            'preview_image' => 'required',
            'quantity' => 'required',
            'gallery_image' => 'required',
            
        ]);
        $after_emplode_cat = implode(',', $request->category_id);
            $product_id = Product::insertGetId([
                'product_name' => $request->product_name,
                'category_id' => $after_emplode_cat,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'quantity' => $request->quantity,
                'sku' => $request->sku,
                'status' => $request->status,
                'description' => $request->description,
                'slug' => Str::random(8).'-'.rand(10000,99999),
                'created_at' => Carbon::now(),
            ]);
        
        // Preview image

        $uploaded_file_one = $request->preview_image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = Str::random(8).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(218, 220)->save(public_path('uploads/products/preview/'.$file_name_one));
        Product::find($product_id)->update([
            'preview_image' => $file_name_one,
            'updated_at' => Carbon::now(),
        ]);

        // Gallery images
        $uploaded_thumbnails = $request->gallery_image;
        foreach ($uploaded_thumbnails as $thumbnail) {
            $thumb_extension = $thumbnail->getClientOriginalExtension();
            $thumb_name = Str::random(8).'-'.rand(1000,9999).'.'.$thumb_extension;
            Image::make($thumbnail)->resize(458, 458)->save(public_path('uploads/products/gallery/'.$thumb_name));

            ProductGallery::insert([
                'product_id' => $product_id,
                'gallery_image' => $thumb_name,
                'created_at' => Carbon::now(),
            ]);
        }
        
        return back()->withSuccess('Product added successfully.');
    }

    // Product list
    function product_list() {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('backend.product.product_list', [
            'products' => $products,
        ]);
    }

    // product_delete
    function product_delete($product_id) {
        $preview_image_one = Product::where('id', $product_id)->get();
        // $delete_preview_one = public_path('uploads/products/preview/'. $preview_image_one->first()->preview_image);
        // unlink($delete_preview_one);
        Product::find($product_id)->delete();
        $thumb_image = ProductGallery::where('product_id', $product_id)->get();
        // foreach($thumb_image as $thumb) {
        //     $delete_thumbnails = public_path('uploads/products/gallery/'. $thumb->gallery_image);
        //     unlink($delete_thumbnails);
        //     ProductGallery::find($thumb->id)->delete();
        // }
        return back()->withSuccess('Product item deleted successfully');
    }

    // product_edit
    function product_edit($product_id) {
        $product = Product::find($product_id);
        $categories = Category::all();
        $gallery = ProductGallery::where('product_id', $product_id)->get();
        return view('backend.product.product_edit', compact(['product', 'categories', 'gallery']));
    }

    // product_update
    function product_update(Request $request) {
        $request->validate([
            'product_name'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
            'product_price'=> 'required',
            'sku*' => 'required',
            'quantity' => 'required',
        ], [
            'category_id.required' => 'The category field is required',
        ]);

        // Preview image
        if($request->preview_image != null) {
            $uploaded_file_one = $request->preview_image;
            $extension = $uploaded_file_one->getClientOriginalExtension();
            $file_name_one = Str::random(8).'-'.rand(1000, 9999).'.'.$extension;
            Image::make($uploaded_file_one)->resize(218, 220)->save(public_path('uploads/products/preview/'.$file_name_one));
            Product::find($request->product_id)->update([
                'preview_image' => $file_name_one,
                'updated_at' => Carbon::now(),
            ]);

        }


        // Gallery image
        if($request->gallery_image != null) {
            $thumb_image = ProductGallery::where('product_id', $request->product_id)->get();
            // foreach($thumb_image as $thumb) {
            //     $delete_from_thumb = public_path('uploads/products/gallery/'.$thumb->gallery_image);
            //     unlink($delete_from_thumb);
            // }
            ProductGallery::where('product_id', $request->product_id)->delete();
            $uploaded_thumbnails = $request->gallery_image;
            foreach ($uploaded_thumbnails as $thumbnail) {
                $thumb_extension = $thumbnail->getClientOriginalExtension();
                $thumb_name = Str::random(8).'-'.rand(1000,9999).'.'.$thumb_extension;
                Image::make($thumbnail)->resize(458, 458)->save(public_path('uploads/products/gallery/'.$thumb_name));
                ProductGallery::insert([
                    'product_id' => $request->product_id,
                    'gallery_image' => $thumb_name,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
            $after_emplode_cat = implode(',', $request->category_id);
            Product::find($request->product_id)->update([
                'product_name' => $request->product_name,
                'category_id' => $after_emplode_cat,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'quantity' => $request->quantity,
                'sku' => $request->sku,
                'status' => $request->status,
                'description' => $request->description,
                'slug' => Str::random(8).'-'.rand(10000,99999),
                'updated_at' => Carbon::now(),
            ]);
        
        
        return redirect()->route('product.list')->withSuccess('Product updated successfully');
    }
    
}
