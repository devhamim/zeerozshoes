<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = category::all();
        return view('backend.category.index', [
            'categorys'=>$categorys,
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

        $category_img = $request->category_img;
        $extension = $category_img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($category_img)->resize(720, 720)->save(public_path('uplode/category/'.$file_name));

        category::insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'category_img'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        toast('Add successfully', 'success');
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
        $categorys = category::find($id);
        return view('backend.category.edit', [
            'categorys'=>$categorys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->category_img == ''){
            category::find($id)->update([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
        }
        else{
            $image = category::where('id',$request->id)->first()->category_img;
            $image_delete = public_path('uplode/category/'.$image);
            unlink($image_delete);

            $category_img = $request->category_img;
            $extension = $category_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($category_img)->resize(720, 720)->save(public_path('uplode/category/'.$file_name));


            category::find($id)->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'category_img'=>$file_name,
            ]);
        }
        toast('update successfully', 'success');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Deleting Photo
        $image = category::where('id',$id)->first()->category_img;
        $image_delete = public_path('uplode/category/'.$image);
        unlink($image_delete);

        //Deleting Item
        category::find($id)->delete();
        toast('Delete successfully', 'error');
        return back();
    }
}
