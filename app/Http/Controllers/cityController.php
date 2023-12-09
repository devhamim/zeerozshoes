<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courier;
use App\Models\city;
use Carbon\Carbon;

class cityController extends Controller
{
    //courier_list
    function city_list(){
        $couriers = courier::where('status', 1)->get();
        $citys = city::all();
        return view('backend.courier.city', [
            'couriers'=>$couriers,
            'citys'=>$citys,
        ]);
    }

    function city_store(Request $request){
        $request->validate([
            'courier_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        city::insert([
            'courier_id' => $request->courier_id,
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('city add successfully');
    }

    public function editcity(Request $request, $id) {
        $city = city::find($id);
    
        return response()->json([
            'status' => 200,
            'city' => $city,
        ]);
    }

    function city_update(Request $request){
        $request->validate([
            'courier_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        city::where('id', $request->city_id)->update([
            'courier_id' => $request->courier_id,
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('city updated successfully');
    }
    
    function city_delete($id){
        city::find($id)->delete();
        return back()->withError('city Delete successfully');
    }
}
