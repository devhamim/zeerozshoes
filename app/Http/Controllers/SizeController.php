<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizeController extends Controller
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
    
    //size_add
    function size_add() {
        return view('backend.size.size_add');
    }

    // size store
    function size_store(Request $request) {
        $request->validate([
            'size_name' => 'required|unique:sizes'
        ]);
        if($request->size_name == null) {
            if(Size::where('size_name', null)->exists()) {
                return back()->with('taken', 'The size name has already been taken.');
            } else {
                $size_name = null;
            }
        } else {
            $size_name = $request->size_name;
        }
        Size::insert([
            'size_name' => $size_name,
            'created_at' => Carbon::now(),
        ]);
       
        
        return back()->withSuccess('Size added successfully');
    }

    // size_list
    function size_list() {
        $sizes = Size::all();
        return view('backend.size.size_list', compact('sizes'));
    }

    // size_delete
    function size_delete($size_id) {
        Size::find($size_id)->delete();
        return back()->withSuccess('Size deleted successfully');
    }
}
