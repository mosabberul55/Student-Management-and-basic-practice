@extends('layouts.app')

@section('content')
        <div class="card">
              <h2 class="card-header">All Posts</h2>
              @foreach ($posts as $post)
              <div class="card-body mt-2">

                   <h3 class="card-title">{{ $post->title }} in
                        <a href="{{ route('post.category', $post->category->id) }}">{{ $post->category->name }}</a>
                    </h3>
                   <p class="card=text">
                     {!! $post->description !!} <br>
                     Posted by <small class="badge badge-info">{{ $post->user->first_name }}</small>
                   </p>

                @endforeach
              </div>
              
            </div>
      </div>
    </div>
  </div>
@endsection
