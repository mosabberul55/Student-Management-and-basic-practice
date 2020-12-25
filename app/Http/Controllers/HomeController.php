<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Auth;

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
      $categories = Category::all();
      $tags = Tag::orderBy('name', 'asc')->get();
      $user = Auth::user();
        return view('home', compact('categories', 'user', 'tags'));
    }
    public function allpost()
    {
      $categories = Category::all();
      $posts = Post::all();
        return view('allpost', compact('categories', 'posts'));
    }
}
