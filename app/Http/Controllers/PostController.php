<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function post_store(Request $request)
    {
      //check validation
      $request->validate([
        'title' => 'required|string|max:30',
        'description' => 'required|string|max:255',
      ]);

      $post = new Post;
      $post->title = $request->title;
      $post->description = $request->description;
      $post->category_id = $request->category_id;
      $post->user_id = Auth::id();
      $post->save();

      $post->tags()->sync($request->tags, false);
      return redirect('/home');
    }
    public function category($id)
    {
      $category = Category::find($id);
      return view('category', compact('category'));
    }
}
