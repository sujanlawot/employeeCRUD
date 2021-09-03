<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>@yield('title')</title>

    

    <!-- Bootstrap core CSS -->
    <link href="{{url('asset/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('asset/css/dashboard.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href=" {{url('asset/css/fontawesome.css')}}">

    <script src="{{url('asset/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Employement CRUD System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
                <a class="nav-link" href="{{url('employee')}}">
                  <span data-feather="file"></span>
                  View Employee
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('employee/create')}}">
                  <span data-feather="shopping-cart"></span>
                  Add Employee
                </a>
              </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container">
      <div class="row">       
        <div class="col">
          @include('layout.message')
          @yield('content')
        </div>
        </div>
      </div>
    </div>
  
        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    <script type="text/javascript" src="{{url('asset/js/jquery.js')}}">


    <script src="{{url('asset/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{url('asset/js/bs-custom-file-input.js')}}"></script>
    <script type="text/javascript" src="{{url('asset/js/custom.js')}}"></script>

   
   
  </body>
</html>
