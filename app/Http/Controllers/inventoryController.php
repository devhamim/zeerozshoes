<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\inventory;
use App\Models\product;
use App\Models\size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class inventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    function product_inventory($id){
        $products = product::find($id);
        $colors = color::all();
        $sizes = size::all();
        $inventorys = inventory::where('product_id', $id)->get();
        return view('backend.inventory.index', [
            'products'=>$products,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'inventorys'=>$inventorys,
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
        inventory::insert([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
        ]);
        alert('Title','Inventory Add Successfully', 'success');
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
    public function destroy(string $id)
    {
        inventory::find($id)->delete();
        return back();
    }
}
