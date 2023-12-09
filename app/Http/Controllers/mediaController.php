<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\media;
use Carbon\Carbon;
use Str;
use Image;
use File;

class mediaController extends Controller
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
    
    //media_list
    function media_list(){
        $medias = media::all();
        return view('backend.media.media', [
            'medias'=>$medias,
        ]);
    }

    function media_store(Request $request){
        $request->validate([
            'file' => 'required',
        ]);

        $image = $request->file('file');
        $file_name = Str::lower(str_replace(' ', '-', $image->getClientOriginalName()));
        $destination_path = public_path('uploads/media/');

        if (!File::exists($destination_path)) {
            File::makeDirectory($destination_path, 0777, true, true);
        }
        Image::make($image)->save($destination_path . $file_name);

        media::insert([
            'file' => $file_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('File add successfully');
    }

    public function editmedia(Request $request, $id) {
        $media = media::find($id);
    
        return response()->json([
            'status' => 200,
            'media' => $media,
        ]);
    }

    function media_update(Request $request){
        $request->validate([
            'file' => 'required',
        ]);

        $media = media::find($request->media_id);

    if (!$media) {
        return back()->withErrors(['media_id' => 'Invalid media ID']);
    }

    $image = $request->file('file');
    $file_name = Str::lower(str_replace(' ', '-', $image->getClientOriginalName()));
    $destination_path = public_path('uploads/media/');

    if (!File::exists($destination_path)) {
        File::makeDirectory($destination_path, 0777, true, true);
    }

    Image::make($image)->save($destination_path . $file_name);
    $media->update([
        'file' => $file_name,
        'updated_at' => Carbon::now(),
    ]);

        return back()->withSuccess('Media updated successfully');
    }
    
    function media_delete($id){
        media::find($id)->delete();
        return back()->withError('Media Delete successfully');
    }
}
