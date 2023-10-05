<?php

namespace App\Http\Controllers;

use App\Models\adbanner;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class adController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adbanners = adbanner::all();
        return view('backend.ad.index', [
            'adbanners'=>$adbanners,
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

        $ad_img = $request->image;
        $extension = $ad_img->getClientOriginalExtension();
        $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($ad_img)->resize(720, 720)->save(public_path('uplode/adbanner/'.$file_name));

        adbanner::insert([
            'link'=>$request->link,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        toast('Ad Banner add successfully', 'success');
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
        $adbanners = adbanner::find($id);
        return view('backend.ad.edit', [
            'adbanners'=>$adbanners,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->image == ''){
            adbanner::find($id)->update([
                'link'=>$request->link,
                'status'=>$request->status,
            ]);
        }
        else{
            $image = adbanner::where('id',$request->id)->first()->image;
            $image_delete = public_path('uplode/adbanner/'.$image);
            unlink($image_delete);

            $ad_img = $request->image;
            $extension = $ad_img->getClientOriginalExtension();
            $file_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($ad_img)->save(public_path('uplode/adbanner/'.$file_name));

            adbanner::find($id)->update([
                'link'=>$request->link,
                'status'=>$request->status,
                'image'=>$file_name,
            ]);
        }

        toast('Ad Banner Update successfully', 'success');
        return redirect()->route('adbanner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        adbanner::find($id)->delete();
        toast('About delete successfully', 'error');
        return back();
    }
}
