<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script src="/js/postsAjax.js"></script>
</head>
<body> 
<div class="container">    
<h1>AJAX CRUD FORM</h1>  
 
	<form class="form-inline" action="" method = "post" id="form-car">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
	  <div class="form-group">
	    <label for="email">Maker</label>
	    <input type='text' name='maker' id='maker' class="form-control" required/>
	  </div>
	  <div class="form-group">
	    <label for="pwd">Model:</label>
	    <input type='text' name='model' id='model' class="form-control" required/>
	  </div> 
	  <button type="submit" class="btn btn-danger crud-submit">Save Data</button>
	</form>  
	   <br>
  <table class="table table-striped table-bordered tbl-car">
    <thead>
      <tr> 
        <th>Make</th>
        <th>Model</th>
        <th>Produced On</th>
        <th>Created at</th>
        <th>Updated at</th> 
        <th>Action</th>
      </tr>
    </thead>
    <tbody> 
	<!--@foreach($cars as $car)
	      <tr>
	        <td>{{$car->make}}</td>
	        <td>{{$car->model}}</td>
	        <td>{{$car->produced_on}}</td>
	        <td>{{$car->created_at}}</td>
	        <td>{{$car->updated_at}}</td> 
	        <td> <a href="#" onclick="retrieveData({{$car->id}},'{{$car->make}}', '{{$car->model}}'); return false">Edit</a> | <a href="#" onclick="deleteCar({{$car->id}}); return false">Delete</a></td>
	      </tr>  
	@endforeach-->
    </tbody>
  </table>  
</div> 
</body>
</html>
