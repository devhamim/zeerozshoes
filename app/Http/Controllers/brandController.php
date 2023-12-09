<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class BrandController extends Controller
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
    
    //brand_add
    function brand_add() {
        return view('backend.brand.brand_add');
    }

    // brand_store 
    function brand_store(Request $request) {
        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required|mimes:jpg,jpeg,gif,png,webp',
        ]);
        $uploaded_file_one = $request->brand_image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = str_replace(' ', '-', Str::lower($request->brand_name)).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(338, 450)->save(public_path('uploads/brand/'.$file_name_one));
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $file_name_one,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Brand successfully added.');
    }
    // brand_list
    function brand_list() {
        $brands = Brand::all();
        return view('backend.brand.brand_list', ['brands' => $brands]);
    }

    // brand_delete
    function brand_delete($brand_id) {
        $preview_image_one = Brand::where('id', $brand_id)->get();
        $delete_preview_one = public_path('uploads/brand/'. $preview_image_one->first()->brand_image);
        unlink($delete_preview_one);
        Brand::find($brand_id)->delete();
        return back()->withSuccess('Brand successfully deleted.');
    }

    // brand_edit
    function brand_edit($brand_id) {
        $brand = Brand::find($brand_id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    // brand_update
    function brand_update(Request $request) {
        $request->validate([
            'brand_name' => 'required',
        ]);
        if($request->brand_image == null) {
            brand::find($request->brand_id)->update([
                'brand_name' => $request->brand_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Brand successfully updated');
        } else {
            $brand_img_del = brand::where('id', $request->brand_id)->first()->brand_image;
            $delete_from = public_path('uploads/brand/'.$brand_img_del);
            unlink($delete_from);
            $upload_img = $request->brand_image;
            $extension = $upload_img->getClientOriginalExtension();
            $after_replace = str_replace(' ', '-', $request->brand_name);
            $file_name = $after_replace.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($upload_img)->resize(338, 450)->save(public_path('uploads/brand/'.$file_name));
            brand::find($request->brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $file_name,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Brand successfully updated');
        }
    }
}
