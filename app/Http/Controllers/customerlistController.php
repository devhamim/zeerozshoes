<?php

namespace App\Http\Controllers;

use App\Models\customerlogin;
use Illuminate\Http\Request;

class customerlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerlist = customerlogin::all();
        return view('backend.customer_list.index', [
            'customerlist'=>$customerlist,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        customerlogin::find($id)->delete();
        toast('Customer list Successfully', 'error');
        return back();
    }
}
