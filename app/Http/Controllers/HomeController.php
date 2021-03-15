<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
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
        return view('home', [
            'albums' => $albums,
        ]);
    }
}
