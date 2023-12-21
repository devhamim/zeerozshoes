<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use Str;

class settingController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function setting_add()
    {
        $settings = setting::first();
        return view('backend.setting.profile', [
            'settings'=>$settings,
        ]);
    }

    public function setting_update(Request $request)
    {
        $rules = [
            'name'=>'required|max:255',
            'email'=>'',
            'about'=>'',
            'phone'=>'',
            'logo'=>'',
            'favicon'=>'',
            'address'=>'',
            'footer'=>'',
            'title'=>'',
            'meta_title'=>'',
            'meta_tag'=>'',
            'meta_description'=>'',
            'fbpixel'=>'',
            'googletag'=>'',
        ];

         /**
         * Handle upload an image
         */

        $validatesData = $request->validate($rules);


        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $extension = $image->getClientOriginalExtension();
            $file_name = Str::random(5) . rand(1000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/setting'), $file_name);
            $validatesData['logo'] = $file_name;
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $extension = $image->getClientOriginalExtension();
            $file_name = Str::random(5) . rand(1000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/setting'), $file_name);
            $validatesData['favicon'] = $file_name;
        }


        // setting::created($validatesData);
        setting::where('id', $request->id)->update($validatesData);

        return back();
    }

}
