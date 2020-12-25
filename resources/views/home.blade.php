@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            <h2 class="text-center text-primary display-4">Add a Post</h2>
            <form class="form-horizontal" action="{{ route('post.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description"></textarea>
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control select2" name="category_id">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                <script>
                  $('.select2').select2();
                </script>
              </div>
              <div class="form-group">
                <label for="tag">Tags</label>
                <select class="form-control select2-multi" name="tags[]" multiple>
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
                <script>
                  $('.select2-multi').select2();
                </script>
              </div>
              <input type="submit" class="btn btn-success mt-2" name="" value="Publish">
            </form>
          </div>
        </div>
        <div class="row">
              <div class="col-md-12">
                <h2>All Posts</h2>
                @foreach ($user->posts as $post)
                <div class="card mt-2">

                     <h3 class="card-title">{{ $post->title }} in

                          <a href="{{ route('post.category', $post->category->id) }}">{{ $post->category->name }}</a>

                      </h3>
                     <div class="card-body">
                       {!! $post->description !!} <br>
                       Posted by <small class="badge badge-info">{{ $post->user->first_name }}</small><br>
                       <h6 class="badge badge-success">
                         @foreach ($post->tags as $tag)
                          {{ $tag->name }}
                         @endforeach
                       </h6>
                     </div>

                  @endforeach
              </div>
        </div>

            <a href="{!! route('allpost') !!}" class="btn btn-primary">View all post</a>
      </div>
    </div>
  </div>
@endsection
