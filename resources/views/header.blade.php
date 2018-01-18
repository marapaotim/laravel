<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- BxSlider --> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <!-- BxSlider --> 


  <!-- DataTables Library -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <!-- DataTables Library -->

  <!-- DateTime Picker Library -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <!-- DateTime Picker Library --> 

</head>
<body> 
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
    <div class="container-fluid bottom-border">
      <div class="col-md-9"></div>
      <div class="col-md-3 sub-container">
        <div class="row">
          <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  placeholder="Search" >
              <span class="input-group-addon">
                  <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>  
              </span>
          </div>
        </div>
      </div>
    </div>  
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?action=main">Guestbook Project</a>
    </div> 
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="/index">Home</a></li> 
          <li><a href="/about">About Us</a></li> 
          <li><a href="#">BLOG</a></li>
          <li><a href="#">Contact Us</a></li> 
        </ul> 
        @if (Route::has('login'))
          <ul class="nav navbar-nav navbar-right">  
        @if (!Auth::check())
            <li><a href="{{ route('register') }}">Sign Up</a></li> 
            <li><a href="{{ route('login') }}">Login</a></li> 
        @else        
         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome: {{ Auth::user()->name }}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">My Profile</a></li>
              <li class="logout"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a></li> 
            </ul>
          </li> 
        @endif 
        </ul>
      @endif 
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>  
    </div>
  </div>
</nav>
 <div class="wrapper"> 