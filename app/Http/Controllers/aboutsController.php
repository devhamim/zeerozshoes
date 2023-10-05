<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\category;
use Illuminate\Http\Request;
use Str;
use Image;

class aboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $abouts = about::all();
        return view('backend.about.index', [
            'abouts'=>$abouts,
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
            '*'=>'required',
        ]);

        $about_img = $request->image;
        $extension = $about_img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($about_img)->save(public_path('uplode/about/'.$file_name));

        about::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$file_name,
        ]);
        toast('About add successfully', 'success');
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
        $abouts = about::find($id);
        return view('backend.about.edit', [
            'abouts'=>$abouts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->image == ''){
            about::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
            ]);
        }
        else{
            $image = about::where('id',$request->id)->first()->image;
            $image_delete = public_path('uplode/about/'.$image);
            unlink($image_delete);

            $about_img = $request->image;
            $extension = $about_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($about_img)->save(public_path('uplode/about/'.$file_name));


            about::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'image'=>$file_name,
            ]);
        }
        toast('About Update successfully', 'success');
        return redirect()->route('abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        about::find($id)->delete();
        toast('About delete successfully', 'error');
        return back();
    }
}
