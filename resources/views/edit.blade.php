@extends('master')
@section('content')
<h2 class="text-center text-primary display-4 py-5 mt-5">Edit student</h2>
<form class="form-horizontal" action="{{ route('student.update', $student->id) }}" method="post" data-parsley-validate>
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
<div class="row">
  <div class="col-md-6 pb-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">First Name:</span>
      </div>
      <input type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" required>
    </div>
  </div>
  <div class="col-md-6 pb-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Last Name:</span>
      </div>
      <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" required>
    </div>
  </div>
  <div class="col-md-6 py-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Registration ID</span>
      </div>
      <input type="number" class="form-control" name="registration_id" value="{{ $student->registration_id }}">
    </div>
  </div>
  <div class="col-md-6 py-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Roll:</span>
      </div>
      <input type="number" class="form-control" name="roll" value="{{ $student->roll }}">
    </div>
  </div>
  <div class="col-md-6 py-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Department Name:</span>
      </div>
      <select class="form-control" name="department_name">
        <option value="ARCHITECTURE">Architecture</option>
        <option value="ENGLISH">English</option>
        <option value="LLB">LLB</option>
        <option value="EEE">EEE</option>
        <option value="CSE">CSE</option>
        <option value="PHARMACY">Pharmacy</option>
      </select>
    </div>
  </div>
  <div class="col-md-6 py-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Email:</span>
      </div>
      <input type="email" class="form-control" name="email" value="{{ $student->email }}">
    </div>
  </div>
  <div class="col-md-6 py-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">+880</span>
      </div>
      <input type="number" class="form-control" name="mobile_num" value="{{ $student->mobile_num }}">
    </div>
  </div>
  <div class="col-md-6 py-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Address:</span>
      </div>
      <input type="text" class="form-control" name="address" value="{{ $student->address }}">
    </div>
  </div>
  <div class="col-md-12 py-3">
    <textarea class="form-control" name="info" rows="5">{{ $student->info }}"</textarea>
  </div>
</div>
<input type="submit" class="btn btn-success btn-block w-25 mx-auto mb-3" name="" value="Update Student">
</form>

@endsection
