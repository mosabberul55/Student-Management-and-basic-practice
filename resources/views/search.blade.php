@extends('master')
@section('content')
      <table class="table table-bordered table-hover text-center table1">
          <thead class="table-dark">
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Registration ID</th>
              <th>ROll</th>
              <th>Department Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Address</th>
              <th>Info</th>
              <th>Action</th>
            </tr>
          </thead>
          @php $i = 0;  @endphp
          @foreach ($students as $student)
            <tr>
              @php $i++  @endphp
              <td>{{ $i }}</td>
              <td>{{ $student->first_name }}</td>
              <td>{{ $student->last_name }}</td>
              <td>{{ $student->registration_id }}</td>
              <td>{{ $student->roll }}</td>
              <td>{{ $student->department_name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->mobile_num }}</td>
              <td>{{ $student->address }}</td>
              <td>{{ $student->info }}</td>
              <td>
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>

                <form class="form-inline" action="{{ route('student.delete', $student->id) }}" method="post">
                  @csrf
                  <input type="button" class="btn btn-danger" name="" value="Delete"  data-toggle="modal" data-target="#modal1">
                  <div id="modal1" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            Are you Sure Want to delete this?
            <button type="button" class="close" data-dismiss="modal" name="button">&times;</button>
          </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-warning" name="" value="Delete">
              <button type="button" class="btn btn-danger" name="button" data-dismiss="modal">Close</button>
            </div>


        </div>
      </div>
    </div>
                </form>
              </td>
            </tr>

          @endforeach
        </table>

    @endsection
