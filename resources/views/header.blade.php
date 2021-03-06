<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- BxSlider --> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <!-- BxSlider --> 
  <script src='https://www.google.com/recaptcha/api.js'></script>

<!-- <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" /> -->
<!-- <script type="text/javascript">
  $(document).ready(function(e) {  
   $( "#dialog" ).dialog({
      dialogClass: "no-close",
      closeOnEscape: false,
      autoOpen: false,
      height: 300,
        width: 508,
        modal: true,
      buttons: [
        {
            text: "I Agree",
            click: $.noop,
            type: "submit"
        },
        {
            text: "Close",
            click: function() {
                $( this ).dialog( "close" );
            }
        }
    ],
    position: {my: "center",  at: "center", of: $("body"),within: $("body") }
    }); 
 });
</script> -->


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



  <!-- <link rel="stylesheet" type="text/css" href="{{asset('treeview/easyTree.css')}}"> 
  <script type="text/javascript" src="{{asset('treeview/easyTree.js')}}"></script> -->
  <!-- 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/codemirror.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/addon/dialog/dialog.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/theme/icecoder.min.css">


<link rel="stylesheet" type="text/css" href="/tvteditor/src/css/jquery.enhsplitter.css"> 
<link type="text/css" rel="stylesheet" href="/tvteditor/src/css/tvteditor.css" /> -->
 
</script>
</head>
<body> 
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
<!--   <div class="container-fluid text-left cookies-request" style="position:absolute;background:red;width:100%;display:none;">
      <div class="row">
        <div class="col-md-12"> 
          <ul class="list-inline">
            <li><h2>This website requires cookies</h2></li>
            <li><a href="#" id="accept" class="btn btn-default">Accept</a></li>
            <li><a href="#" id="decline" class="btn btn-danger">Decline</a></li>
          </ul> 
        </div> 
      </div>
  </div> -->
    <div class="container-fluid bottom-border">
      <div class="col-md-9"></div>
      <div class="col-md-3 sub-container">
        <div class="row">
          <div class="input-group stylish-input-group search-header">
              <span class="input-group-addon">
                  <button type="submit" id="btnSearch">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>  
              </span>
              <input type="text" id="searchText" class="form-control"  placeholder="Search" >
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
          <li><a href="/blog">BLOG</a></li>
          <li><a href="/contact">Contact Us</a></li>
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