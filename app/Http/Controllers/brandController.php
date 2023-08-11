<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();
        return view('backend.brand.index', [
            'brands'=>$brands,
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

        $brand_img = $request->brand_img;
        $extension = $brand_img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($brand_img)->resize(720, 720)->save(public_path('uplode/brand/'.$file_name));

        brand::insert([
            'name'=>$request->name,
            'brand_img'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
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
        $brands = brand::find($id);
        return view('backend.brand.edit', [
            'brands'=>$brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->brand_img == ''){
            brand::find($id)->update([
                'name'=>$request->name,
            ]);
        }
        else{
            $image = brand::where('id',$request->id)->first()->brand_img;
            $image_delete = public_path('uplode/brand/'.$image);
            unlink($image_delete);

            $brand_img = $request->brand_img;
            $extension = $brand_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($brand_img)->resize(720, 720)->save(public_path('uplode/brand/'.$file_name));

            brand::find($id)->update([
                'name'=>$request->name,
                'brand_img'=>$file_name,
            ]);
        }
        return redirect()->route('brand.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Deleting Photo
        $image = brand::where('id',$id)->first()->brand_img;
        $image_delete = public_path('uplode/brand/'.$image);
        unlink($image_delete);

        //Deleting Item
        brand::find($id)->delete();
        return back();
    }
}
