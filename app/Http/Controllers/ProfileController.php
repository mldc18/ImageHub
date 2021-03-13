<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
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
        try {
            $form_data = $request->input();
            $data = new Gallery();
            $data->album_title = $form_data['album_title'];
            $data->user_id = $form_data['album_user_id'];
            $data->save();
            return redirect()->to('/profile');
        } catch (Exception $e) {
            return $e;
        }
    }

}

