<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //profile
    function profile() {
        // return view('backend.user.profile');
        return view('backend.user.profile');
    }

    // profile_update
    function profile_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => '',
            'role' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);
        $upload_file = $request->image;

        if($request->image != null) {
            if(Auth::user()->image == null) {
                $ext = $upload_file->getClientOriginalExtension();
                $file_name = Auth::id().'.'.$ext;
                Image::make($upload_file)->save(public_path('uploads/user/'.$file_name));
                User::find(Auth::id())->update([
                    'image' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('Profile successfully updated with image.');
            } else {
                $delete_from = public_path('uploads/user/'.Auth::user()->image);
                unlink($delete_from);
                $ext = $upload_file->getClientOriginalExtension();
                $file_name = Auth::id().'.'.$ext;
                Image::make($upload_file)->save(public_path('uploads/user/'.$file_name));
                User::find(Auth::id())->update([
                    'image' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('Profile successfully updated with image.');
            }
        } 

        if($request->password == $request->password_confirmation) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            return back()->withError('Password credentials do not matched!');
        }

        if($request->status != null) {
            User::find(Auth::id())->update([
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
        }
        if($request->mobile != null) {
            User::find(Auth::id())->update([
                'mobile' => $request->mobile,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            User::find(Auth::id())->update([
                'mobile' => null,
                'updated_at' => Carbon::now(),
            ]);
        }

        if($request->role != null) {
            User::find(Auth::id())->update([
                'role' => $request->role,
                'updated_at' => Carbon::now(),
            ]);
        }

        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Profile successfully updated.');
    }

    // user list 
    function users() {
        $users = User::where( 'id', '!=', Auth::id())->get();
        return view('backend.user.users', [
            'users' => $users,
        ]);
    }

    // user_delete
    function user_delete($user_id) {
        $user = User::find($user_id);
        if($user->image != null) {
            $delete_from = public_path('uploads/user/'.$user->image);
            unlink($delete_from);
        }
        User::where('id', $user_id)->delete();
        return back()->withSuccess('User deleted successfully');
    }

    // user_register
    function user_register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => '',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ], [
            'password_confirmation.required' => "Confirm password is field required."
        ]);

        if($request->password == $request->password_confirmation) {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now(),
            ]);
            return back()->withSuccess('User register successfully');
        } else {
            return back()->withPassworderror('Password credentials do not matched!');
        }
        
        return back();
    }

    public function editUser(Request $request, $id) {
        $user = User::find($id);
    
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    // user update
    function user_update(Request $request) {
        if($request->user_password != null) {
            $request->validate([
                'user_name' => 'required',
                'user_email' => 'required',
                'role' => 'required',
                'user_password' => 'required',
                'status' => 'required',
            ]);

            if($request->user_password == $request->user_password_confirmation) {
                User::where('id', $request->user_id)->update([
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'password' => bcrypt($request->user_password),
                    'role' => $request->role,
                    'status' => $request->status,
                    'mobile' => $request->mobile,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('User updated successfully');
            } else{
                return back()->withUserpassworderror('Password credentials do not matched');
            }
        } else {
            $request->validate([
                'user_name' => 'required',
                'user_email' => 'required',
                'role' => 'required',
                'status' => 'required',
            ]);

            User::where('id', $request->user_id)->update([
                'name' => $request->user_name,
                'email' => $request->user_email,
                'role' => $request->role,
                'status' => $request->status,
                'mobile' => $request->mobile,
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('User updated successfully');
        }
    }
}
