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

  <link rel="stylesheet" type="text/css" href="{{asset('codemirror/lib/codemirror.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('codemirror/theme/night.css')}}"> 

  <link rel="stylesheet" type="text/css" href="{{asset('codemirror/display/fullscreen.css')}}">  


<script type="text/javascript">
  $(document).ready(function(e) { 
   // $('.cookies-request').slideDown('slow'); 
    $('#accept').click(function(e) {  
      e.preventDefault(); 
         $('.cookies-request').slideUp();
    });
    $('#decline').click(function(e) {  
      e.preventDefault(); 
         $('.cookies-request').slideUp();
    });
  })
</script> 
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('treeview/easyTree.css')}}"> 
  <script type="text/javascript" src="{{asset('treeview/easyTree.js')}}"></script> -->
  <!-- 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/codemirror.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/addon/dialog/dialog.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/theme/icecoder.min.css">


<link rel="stylesheet" type="text/css" href="/tvteditor/src/css/jquery.enhsplitter.css"> 
<link type="text/css" rel="stylesheet" href="/tvteditor/src/css/tvteditor.css" /> -->

</head>
<body> 
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
  <div class="container-fluid text-left cookies-request" style="position:absolute;background:red;width:100%;display:none;">
      <div class="row">
        <div class="col-md-12"> 
          <ul class="list-inline">
            <li><h2>This website requires cookies</h2></li>
            <li><a href="#" id="accept" class="btn btn-default">Accept</a></li>
            <li><a href="#" id="decline" class="btn btn-danger">Decline</a></li>
          </ul> 
        </div> 
      </div>
  </div>
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
      <a class="navbar-brand" href="/index">IGenDev Technologies</a> 
    </div> 
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="/index">Home</a></li> 
          <li><a href="/about">About Us</a></li> 
          <li><a href="#">BLOG</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="/project">Mobile Projects</a></li> 
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
<div id="wrapper">
  <div id="page-content-wrapper"> 