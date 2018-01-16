<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script src="/js/postsAjax.js"></script>

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
<div class="container">    
<h1>AJAX CRUD FORM</h1>  
<div class="row">
 	<div class="col-md-3">
		<form id="form-car" method = "post">
		  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
		  <div class="form-group">
		    <label for="email">Maker</label>
		    <input type='text' name='maker' id='maker' placeholder="Maker" class="form-control" required/>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Model:</label>
		    <input type='text' name='model' id='model' placeholder="Model" class="form-control" required/>
		  </div> 

		  <div class="form-group">
		    <label for="pwd">Produced on:</label>
		    <div class='input-group date' id='datetimepicker1'>
		    	<input type='text' name='date' id='produced_on' placeholder="Produced Date" class="form-control" required/>
		    	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		  	</div> 
		  </div> 
		  <button type="submit" class="btn btn-primary form-control crud-submit">Save Data</button>
		</form> 
 	</div>  
 	<div class="col-md-9">
	  <table class="table table-striped table-bordered" id="tblcar">
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
  </div> 
</div> 
</body>
</html>
