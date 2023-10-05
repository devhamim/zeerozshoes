<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class color_sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = color::all();
        $sizes = size::all();
        return view('backend.color_size.index', [
            'colors'=>$colors,
            'sizes'=>$sizes,
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
        if($request->btn == 1){
            $request->validate([
                'color_code'=>'required',
            ]);
            color::insert([
                'name'=>$request->name,
                'color_code'=>$request->color_code,
                'created_at'=>Carbon::now(),
            ]);
        }
        else{
            $request->validate([
                'name'=>'required',
            ]);
            size::insert([
                'name'=>$request->name,
                'created_at'=>Carbon::now(),
            ]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if($request->btn == 1){
            color::find($id)->delete();
            return back();
        }
        else{
            size::find($id)->delete();
            return back();
        }
            toast('Delete successfully', 'error');
    }
}
