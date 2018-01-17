@include('header')
<div class="container">    
<div class="page-title">
	<h3>Home Page</h3>
</div> 
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
  <script src="/js/postsAjax.js"></script>
@include('footer')