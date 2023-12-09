<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courier;
use App\Models\city;
use App\Models\courierzone;
use Carbon\Carbon;

class courierZoneController extends Controller
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
    //courier_list
    function zone_list(){
        $couriers = courier::where('status', 1)->get();
        $citys = city::where('status', 1)->get();
        $courierzones = courierzone::all();
        return view('backend.courier.courierzone', [
            'couriers'=>$couriers,
            'citys'=>$citys,
            'courierzones'=>$courierzones,
        ]);
    }

    function zone_store(Request $request){
        $request->validate([
            'courier_id' => 'required',
            'city_id' => 'required',
            'zone' => 'required',
            'status' => 'required',
        ]);

        courierzone::insert([
            'courier_id' => $request->courier_id,
            'city_id' => $request->city_id,
            'zone' => $request->zone,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Courier Zone add successfully');
    }

    public function editzone(Request $request, $id) {
        $courierzones = courierzone::find($id);
    
        return response()->json([
            'status' => 200,
            'courierzones' => $courierzones,
        ]);
    }

    function zone_update(Request $request){
        $request->validate([
            'courier_id' => 'required',
            'city_id' => 'required',
            'zone' => 'required',
            'status' => 'required',
        ]);

        courierzone::where('id', $request->zone_id)->update([
            'courier_id' => $request->courier_id,
            'city_id' => $request->city_id,
            'zone' => $request->zone,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Zone updated successfully');
    }
    
    function zone_delete($id){
        courierzone::find($id)->delete();
        return back()->withError('Zone Delete successfully');
    }
}
