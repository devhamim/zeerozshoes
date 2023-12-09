<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Contactinfo;
use App\Models\setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //contact
    function contact() {
        $categories = Category::all();
        $setting = setting::all();
        return view('frontend.contact.contact', [
            'categories' => $categories,
            'setting' => $setting,
        ]);
    }

    // contact message
    function contact_message(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 0,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Message successfully sent.');
    }

    // contact_list
    function contact_list() {
        $contact = Contact::latest()->get();
        return view('backend.contact.contact_list', [
            'contact' => $contact,
        ]);
    }

    // contact_message_delete
    function contact_message_delete($message_id) {
        Contact::find($message_id)->delete();
        return back()->withSuccess('Massage deleted successfully.');
    }

    // contactMessage
    function contactMessage(Request $request) {
        $contact = Contact::find($request->message_id);
        Contact::where('id', $request->message_id)->update([
            'status' => 1,
        ]);
        return response()->json([
            'status' => 200,
            'contact' => $contact,
        ]);
    }

    // contact_delete_all
    function contact_delete_all(){
        DB::table('contacts')->delete();
        return back()->withSuccess('Contact deleted successfully');
    }

    // contact_info
    function contact_info() {
        return view('backend.contact.contact_info');
    }

    // contact info store
    function contact_info_store(Request $request) {
        $request->validate([
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_number' => 'required',
            'contact_address' => 'required',
            'contact_info' => 'required',
        ]);
        Contactinfo::insert([
            'contact_name' => $request->contact_name,
            'contact_email' => $request->contact_email,
            'contact_number' => $request->contact_number,
            'contact_address' => $request->contact_address,
            'contact_info' => $request->contact_info,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Contact information added successfully');
    }

    // contact_info_list
    function contact_info_list() {
        $info = Contactinfo::all();
        return view('backend.contact.contact_info_list', [
            'info' => $info,
        ]);
    }

    // contact_info_delete
    function contact_info_delete($contact_id) {
        Contactinfo::find($contact_id)->delete();
        return back()->withSuccess('Contact information deleted successfully');
    }

    // contact_info_edit
    function contact_info_edit($contact_id) {
        $contact = Contactinfo::find($contact_id);
        return view('backend.contact.contact_info_update', [
            'contact' => $contact,
        ]);
    }

    // contact_info_update
    function contact_info_update(Request $request) {
        $request->validate([
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_number' => 'required',
            'contact_address' => 'required',
            'contact_info' => 'required',
        ]);

        Contactinfo::where('id', $request->contact_id)->update([
            'contact_name' => $request->contact_name,
            'contact_email' => $request->contact_email,
            'contact_number' => $request->contact_number,
            'contact_address' => $request->contact_address,
            'contact_info' => $request->contact_info,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Contact information updated successfully');
    }

    // contact_info_status
    function contact_info_status($status_id) {
        $contact_info = Contactinfo::find($status_id);

        if($contact_info->status == 1){
            Contactinfo::find($status_id)->update([
                'status'=>0,
            ]);
        }
        else{
            foreach(Contactinfo::all() as $contact){
                Contactinfo::find($contact->id)->update([
                    'status'=>0,
                ]);
            }
            Contactinfo::find($status_id)->update([
                'status' => 1,
            ]);
        }
        return back();


    }
}
