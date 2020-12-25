<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function create()
    {
      $images = Image::orderBy('id', 'asc')->get();
      return view('img_home', compact('images'));
    }
    public function store(Request $request)
    {
      //check validation
      $request->validate([
        'title' => 'required|string|max:15',
        'image' => 'nullable|image'
      ]);

      $image = new Image;
      $image->title = $request->title;
      if ($request->hasFile('image')) {
        // store
        $image->image = $request->image->store('public/images');
      }
      $image->save();
      return redirect()->route('image.create');
    }
}
