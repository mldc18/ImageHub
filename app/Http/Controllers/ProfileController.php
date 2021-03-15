<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class ProfileController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $albums = Gallery::where('user_id', $id)->get();
        return view('profile', [
            'albums' => $albums,
        ]);
    }
    public function createAlbum(Request $request)
    {
        $this->validate($request, [
            'album_title' => 'required|unique:gallery,album_title',
        ]);
        try {
            $form_data = $request->input();
            $data = new Gallery();
            $data->album_title = $form_data['album_title'];
            $data->user_id = $form_data['album_user_id'];
            $data->images = null;
            $data->save();
            return response($data);
        } catch (Exception $e) {
            return $e;
        }
    }
    public function chooseAlbum(Request $request, $id)
    {
        try {
            $form_data = $request->input();
            $data = Gallery::where('id', $id)->first(); 
            $album = array();
            $loop_variable = $data->images == null ? [] : json_decode($data->images); 
            foreach ($loop_variable as $image){
                array_push($album, $image);
            }
            if(in_array($form_data['image_input'], $album)){
                $data = 'Image is already in the album!';
            }else{
                array_push($album, $form_data['image_input']);
                $data->images = json_encode($album);
                $data->save();
            }
            return response($data);
        } catch (Exception $e) {
            return $e;
        }
    }

}

