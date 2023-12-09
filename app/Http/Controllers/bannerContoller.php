<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class bannerContoller extends Controller
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
    
    //banner_add
    function banner_add() {
        return view('backend.banner.banner_add');
    }

    // banner_store
    function banner_store(Request $request) {
        $request->validate([
            'banner_image' => 'required|mimes:jpg,jpeg,gif,png,webp|file|max:5000',
        ]);

        $banner_image = $request->banner_image;
        $extension = $banner_image->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($banner_image)->save(public_path('uploads/banner/'.$file_name));
        

            banner::insert([
            'banner_title' => $request->banner_title,
            'banner_link' => $request->banner_link,
            'banner_image' => $file_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Banner added successfully.');
    }

    // banner list
    function banner_list() {
        $banners = banner::all();
        return view('backend.banner.banner_list', [
            'banners' => $banners,
        ]);
    }

    // banner edit
    function banner_edit($banner_id) {
        $banner = banner::find($banner_id);
        return view('backend.banner.banner_edit', [
            'banner' => $banner,
        ]);
    }

    // banner update
    function banner_update(Request $request) {

        if($request->banner_image == null) {
            banner::find($request->banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_link' => $request->banner_link,
            ]);
            return back()->withSuccess('Category updated successfully');
        } 
        else {
            $banner_img_del = banner::where('id', $request->banner_id)->first()->banner_image;
            $delete_from = public_path('uploads/banner/'.$banner_img_del);
            unlink($delete_from);

            $upload_img = $request->banner_image;
            $extension = $upload_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($upload_img)->save(public_path('uploads/banner/'.$file_name));
            banner::find($request->banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_link' => $request->banner_link,
                'banner_image' => $file_name,
            ]);
            return back()->withSuccess('Banner updated successfully');
        }
    }

    // banner_delete
    function banner_delete($banner_id){
        banner::find($banner_id)->delete();
        return back()->withSuccess('Banner Delete successfully');
    }
}
