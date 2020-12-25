@extends('master')
@section('content')
<div class="row table1">
  <div class="col-md-6">
    <h2 class="text-center text-primary display-4">Upload an Image</h2>
    <form class="form-horizontal" action="{!! route('img.store') !!}" method="post" enctype="multipart/form-data" data-parsley-validate>
      @if ($errors->any())
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>

        </div>
    @endif
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="" required>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" type="file" name="image" value="">
      </div>
      <input type="submit" class="btn btn-success" value="Upload Image">
    </form>
  </div>
  <div class="col-md-6">
    <table class="table table-bordered text-center">
        <thead class="table-dark">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        @php $i = 0;  @endphp
        @foreach ($images as $image)
          <tr>
            @php $i++  @endphp
            <td>{{ $i }}</td>
            <td>{{ $image->title }}</td>
            <td>
              <img src="{{ Storage::url($image->image) }}" alt="" width="120px">
            </td>

            <td>
              <a href="#" class="btn btn-warning">Edit</a>
            </td>
          </tr>

        @endforeach
      </table>
  </div>
</div>
@endsection
