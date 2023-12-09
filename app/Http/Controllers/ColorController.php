<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
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
    
    //color_add
    function color_add() {
        return view('backend.color.color_add');
    }

    // color_store
    function color_store(Request $request) {
        $request->validate([
            'color_name' => 'required|unique:colors',
            'color_code' => 'unique:colors',
        ]);
        Color::insert([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Color added successfully');
    }

    // color_list
    function color_list() {
        $colors = Color::all();
        return view('backend.color.color_list', compact('colors'));
    }
    // color_delete
    function color_delete($color_id) {
        Color::find($color_id)->delete();
        return back()->withSuccess('Color deleted successfully');
    }
}
