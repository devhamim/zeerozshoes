<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = category::all();
        $subcategorys = subCategory::all();
        return view('backend.subcategory.index', [
            'categorys'=>$categorys,
            'subcategorys'=>$subcategorys,
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

        $subcategory_img = $request->subcategory_img;
        $extension = $subcategory_img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($subcategory_img)->resize(720, 720)->save(public_path('uplode/subcategory/'.$file_name));

        subCategory::insert([
            'category'=>$request->category,
            'name'=>$request->name,
            'description'=>$request->description,
            'subcategory_img'=>$file_name,
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
        $categorys = category::all();
        $subcategorys = subCategory::find($id);
        return view('backend.subcategory.edit', [
            'subcategorys'=>$subcategorys,
            'categorys'=>$categorys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->subcategory_img == ''){
            subCategory::find($id)->update([
                'category'=>$request->category,
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
        }
        else{
            $image = subCategory::where('id',$request->id)->first()->subcategory_img;
            $image_delete = public_path('uplode/subcategory/'.$image);
            unlink($image_delete);

            $subcategory_img = $request->subcategory_img;
            $extension = $subcategory_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($subcategory_img)->resize(720, 720)->save(public_path('uplode/subcategory/'.$file_name));


            subCategory::find($id)->update([
                'category'=>$request->category,
                'name'=>$request->name,
                'description'=>$request->description,
                'subcategory_img'=>$file_name,
            ]);
        }
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Deleting Photo
        $image = subCategory::where('id',$id)->first()->subcategory_img;
        $image_delete = public_path('uplode/subcategory/'.$image);
        unlink($image_delete);

        //Deleting Item
        subCategory::find($id)->delete();
        return back();
    }
}
