<?php

namespace App\Http\Controllers;

use App\Models\privacy_policy;
use App\Models\terms_condition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TermsconditionController extends Controller
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
    
    //terms_condition
    function terms_condition(){
        $terms_conditions = terms_condition::all();
        return view('backend.terms_policy.terms_condition', [
            'terms_conditions'=>$terms_conditions,
        ]);
    }
    
    //terms_condition
    function terms_privacy_policy(){
        $privacy_policy = privacy_policy::all();
        return view('backend.terms_policy.privacy_policy', [
            'privacy_policy'=>$privacy_policy,
        ]);
    }

    // terms_condition_update
    function terms_conditions_update(Request $request, $id){
        $request->validate([
            'terms_conditions'=>'required',
        ]);
        terms_condition::find($id)->update([
            'terms_conditions'=>$request->terms_conditions,
        ]);
        return back();
    }

    // privacy_policy_update
    function privacy_policy_update(Request $request, $id){
        $request->validate([
            'privacy_policy'=>'required',
        ]);
        privacy_policy::find($id)->update([
            'privacy_policy'=>$request->privacy_policy,
        ]);
        return back();
    }
}
