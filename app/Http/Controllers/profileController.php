<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Image;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.profile.index');
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
        //
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
        $users = User::all();
        // print_r($users);
        // print_r($request->all());
        // die();
        if($request->photo == ''){
            User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'is_admin'=>$request->is_admin,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
            ]);
        }
        else{
            $profile_img = $request->photo;
            $extension = $profile_img->getClientOriginalExtension();
            $file_name = Auth::user()->id.'.'.$extension;
            Image::make($profile_img)->resize(720, 720)->save(public_path('uplode/profile/'.$file_name));
            
            User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'is_admin'=>$request->is_admin,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'photo'=>$file_name,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
            ]);
        }
        toast('Profile Update successfully','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // profile_password
    function profile_password(Request $request, $id){
        if(Hash::check($request->old_password, Auth::user()->password)){
            User::find(Auth::user()->id)->update([
                'password'=>$request->password
            ]);
            toast('password update successfully','success');
            return back();
        }
        else{
            toast('Old password not match','error');
            return back();
        }
    }
}
