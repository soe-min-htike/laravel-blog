<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
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
        $posts = Post::where('user_id','=', Auth::user()->id)->orderBy('id','desc')->paginate(5);
        return view('home',compact('posts'));

    }
    public function allusers()
    {
        $users = User::all();
        return view('allusers',compact('users'));
    }
}
