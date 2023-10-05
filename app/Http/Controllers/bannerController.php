<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = banner::all();
        return view('backend.banner.index', [
            'banners'=>$banners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ]);
        $img = $request->image;
        $extension = $img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($img)->save(public_path('uplode/banner/'.$file_name));

        banner::insert([
            'link'=>$request->link,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        toast('Banner add successfully', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banners = banner::find($id);
        return view('backend.banner.edit', [
            'banners'=>$banners,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->image == ''){
            banner::find($id)->update([
                'link'=>$request->link,
                'status'=>$request->status,
            ]);
        }
        else{
            $image = banner::where('id',$request->id)->first()->image;
            $image_delete = public_path('uplode/banner/'.$image);
            unlink($image_delete);

            $img = $request->image;
            $extension = $img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($img)->save(public_path('uplode/banner/'.$file_name));

            banner::find($id)->update([
                'link'=>$request->link,
                'status'=>$request->status,
                'image'=>$file_name,
            ]);
        }


    toast('Banner Update successfully', 'success');
    return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        banner::find($id)->delete();
        toast('About delete successfully', 'error');
        return back();
    }
}
