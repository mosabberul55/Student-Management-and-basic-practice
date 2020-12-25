<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Student Management</title>
</head>
<body>
  <nav class="navbar bg-dark navbar-dark navbar-expand-md fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">Student Management</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#MYnav" name="button"><span class="navbar-toggler-icon"></span></button>
      <div id="MYnav" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('student.create') }}">Create</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Dropdown</a>
            <div class="dropdown-menu bg-warning">
              <a class="dropdown-item" href="">ONE</a>
              <a class="dropdown-item" href="">TWO</a>
              <a class="dropdown-item" href="">THREE</a>
              <div class="dropdown-divider">

              </div>
              <a class="dropdown-item" href="">FOUR</a>

            </div>
          </li>
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Log In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('image.create') }}">Image</a>
          </li>

        </ul>
        <form class="form-inline ml-auto" action="{!! route('search') !!}" method="get" data-parsley-validate>
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
          <input type="text" class="form-control mr-3" name="search" placeholder="Search" required>
          <input type="submit" class="btn btn-warning" value="Search">

        </form>
      </div>
    </div>
  </nav>

  <div class="container clearfix">
    @yield('content')
  </div>

  <script src="{{ asset('bootstrap\js\jquery-3.2.1.slim.min.js') }}" ></script>
  <script src="{{ asset('bootstrap\js\bootstrap.min.js') }}" ></script>
  <script src="{{ asset('bootstrap\js\popper.min.js') }}" ></script>
  <script src="{{ asset('js\parsley.min.js') }}" ></script>
</body>
</html>
