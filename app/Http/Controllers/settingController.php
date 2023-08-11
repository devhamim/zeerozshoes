<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Str;
use Image;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = setting::all();
        return view('backend.setting.index', [
            'settings'=>$settings,
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
        // logo
        $logo_img = $request->logo;
        $extension = $logo_img->getClientOriginalExtension();
        $logo_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($logo_img)->save(public_path('uplode/logo/'.$logo_name));

        // fav
        $fav_img = $request->favicon;
        $extension = $fav_img->getClientOriginalExtension();
        $fav_name = Str::random(5). rand(1000,999999).'.'.$extension;
        Image::make($fav_img)->save(public_path('uplode/logo/fav/'.$fav_name));
        setting::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'footer'=>$request->footer,
            'logo'=>$logo_name,
            'favicon'=>$fav_name,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'instagram'=>$request->instagram,
        ]);

        toast('Title','website update Successfully', 'success');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'footer'=>'required',
            'logo'=>'required',
            'favicon'=>'required',
        ]);
        

        setting::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'footer'=>$request->footer,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'instagram'=>$request->instagram,
        ]);
        if($request->logo != ''){
            // logo
            $logo_img = $request->logo;
            $extension = $logo_img->getClientOriginalExtension();
            $logo_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($logo_img)->save(public_path('uplode/logo/'.$logo_name));

            setting::find($id)->update([
                'logo'=>$logo_name,
            ]);
        }
        if($request->favicon){
            // fav
            $fav_img = $request->favicon;
            $extension = $fav_img->getClientOriginalExtension();
            $fav_name = Str::random(5). rand(1000,999999).'.'.$extension;
            Image::make($fav_img)->save(public_path('uplode/logo/fav/'.$fav_name));

            setting::find($id)->update([
                'favicon'=>$fav_name,
            ]);
        }


        toast('Title','website Successfully', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
