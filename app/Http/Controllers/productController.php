<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\gallery;
use App\Models\product;
use App\Models\subCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();

        return view('backend.product.index', [
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = category::all();
        $subcategorys = subCategory::all();
        $brands = brand::all();
        return view('backend.product.create', [
            'categorys'=>$categorys,
            'subcategorys'=>$subcategorys,
            'brands'=>$brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        // product insert
        // image insert
        $product_img = $request->thumbnail;
        $extension = $product_img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($product_img)->resize(720, 720)->save(public_path('uplode/product/'.$file_name));

        $product_id = product::insertGetId([
            'title'=>$request->title,
            'sort_desp'=>$request->sort_desp,
            'long_desp'=>$request->long_desp,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'thumbnail'=>$file_name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'total_price'=>$request->price - $request->discount,
            'slug'=>Str::lower(str_replace(' ', '-', $request->title)). '-'. rand(0, 100000000),
            'meta_title'=>$request->meta_title,
            'meta_desp'=>$request->meta_desp,
            'created_at'=>Carbon::now(),
        ]);


        // gallery insert
        foreach($request->gallery as $gallerys){
            $extension = $gallerys->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999). '.' .$extension;
            Image::make($gallerys)->resize(720, 720)->save(public_path('uplode/product/gallery/'.$file_name));

            gallery::insert([
                'product_id'=>$product_id,
                'gallery'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);
        }
        alert('Title','Product Add Successfully, Please Add Inventory', 'success');
        return redirect()->route('product.inventory', $product_id);
    }

      // catagory subcatagory select
      function getsubcategory(Request $request){
        $subcategorys = subCategory::where('category', $request->category_id)->get();
        $str = '<option value="">-- Select Option --</option>';
        foreach($subcategorys as $subcategory){
            $str .= '<option value="'. $subcategory->id .'">' .$subcategory->name .'</option>';
        }
        echo $str;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands = brand::all();
        $categorys = category::all();
        $subcategorys = subCategory::all();
        $products = product::find($id);
        return view('backend.product.edit', [
            'products'=>$products,
            'brands'=>$brands,
            'categorys'=>$categorys,
            'subcategorys'=>$subcategorys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        product::find($id)->update([
            'title'=>$request->title,
            'sort_desp'=>$request->sort_desp,
            'long_desp'=>$request->long_desp,
            'status'=>$request->status,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'total_price'=>$request->price - $request->discount,
            'slug'=>Str::lower(str_replace(' ', '-', $request->title)). '-'. rand(0, 100000000),
            'meta_title'=>$request->meta_title,
            'meta_desp'=>$request->meta_desp,
        ]);


         // image insert
         if($request->thumbnail != ''){
            $image = product::where('id',$request->id)->first()->thumbnail;
            $image_delete = public_path('uplode/product/'.$image);
            unlink($image_delete);

            $product_img = $request->thumbnail;
            $extension = $product_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($product_img)->resize(720, 720)->save(public_path('uplode/product/'.$file_name));
            product::find($id)->update([
                'thumbnail'=>$file_name,
            ]);
         }


         // gallery insert
        if($request->gallery != ''){
            $product_id = $request->id;

            // Multiple image delete
            $gallerys = gallery::where('product_id', $product_id)->get();
            
          foreach($gallerys as $gallery){
              $image = gallery::where('id',$gallery->id)->first()->gallery;
                $image_delete = public_path('uplode/product/gallery/'.$image);
                unlink($image_delete);

                gallery::find($gallery->id)->delete();
          }


          foreach($request->gallery as $gallerys){
            $extension = $gallerys->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999). '.' .$extension;
            Image::make($gallerys)->resize(720, 720)->save(public_path('uplode/product/gallery/'.$file_name));

            gallery::insert([
                'product_id'=>$product_id,
                'gallery'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);
        }
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           // Multiple image delete
           $gallerys = gallery::where('product_id', $id)->get();
            
           foreach($gallerys as $gallery){
               $image = gallery::where('id',$gallery->id)->first()->gallery;
                 $image_delete = public_path('uplode/product/gallery/'.$image);
                 unlink($image_delete);
 
                 gallery::find($gallery->id)->delete();
           }

        //Deleting Photo
        $image = product::where('id',$id)->first()->thumbnail;
        $image_delete = public_path('uplode/product/'.$image);
        unlink($image_delete);

        //Deleting Item
        product::find($id)->delete();
        return back();
    }
}
