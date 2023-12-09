<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class CategoryController extends Controller
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
    
    //category_add
    function category_add() {
        return view('backend.category.category_add');
    }

    // category_store
    function category_store(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_image' => 'required|mimes:jpg,jpeg,gif,png,webp|file|max:5000',
        ]);

        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        $category_image = $request->category_image;
        $extension = $category_image->getClientOriginalExtension();
        $after_replace = str_replace(' ', '-', $request->category_name);
        $file_name = Str::lower($after_replace).'-'.rand(1000, 9999).'.'.$extension;
        Image::make($category_image)->save(public_path('uploads/category/'.$file_name));
        
        Category::find($category_id)->update([
            'category_image' => $file_name,
        ]);
        return back()->withSuccess('Category added successfully.');
    }

    // category list
    function category_list() {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('backend.category.category_list', [
            'categories' => $categories
        ]);
    }

    // category edit
    function category_edit($category_id) {
        $categories = Category::find($category_id);
        return view('backend.category.category_edit', [
            'category' => $categories,
        ]);
    }

    // category update
    function category_update(Request $request) {
        $request->validate([
            'category_name' => 'required',
            'category_image' => 'mimes:jpg,jpeg,gif,png,webp|file|max:5000',
        ]);
        if($request->category_image == null) {
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'status' => $request->status,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('category.list')->withSuccess('Category updated successfully');
        } else {
            $category_img_del = Category::where('id', $request->category_id)->first()->category_image;
            $delete_from = public_path('uploads/category/'.$category_img_del);
            unlink($delete_from);
            $upload_img = $request->category_image;
            $extension = $upload_img->getClientOriginalExtension();
            $after_replace = str_replace(' ', '-', $request->category_name);
            $file_name = $after_replace.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($upload_img)->save(public_path('uploads/category/'.$file_name));
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'category_image' => $file_name,
                'status' => $request->status,
                'added_by' => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('category.list')->withSuccess('Category updated successfully');
        }
    }

    function category_delete($category_id){
        Category::find($category_id)->delete();
        return back()->withError('Category Delete successfully');
    }
}
