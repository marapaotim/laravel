@include('header') 
@include('sidebar')
	<div class="container content-wrap">
		<div class="row"> 
			<div class="page-title">
				<h3>Mobile Project Page</h3>
			</div>  
			<ul class="list-inline">
				<input type="file" value="upload" id="uploadFile" accept=".rar,.zip"/>
				<li><a href="#" class="btn btn-danger" id="import-proj">Import Project</a></li>
				<li> <button type="button" class="btn btn-primary" id="create-proj"><i class="fa fa-plus" aria-hidden="true"></i> Create Project</button> </li> 
			</ul>
			<div class="col-md-12 project text-center text-success"></div> 
		</div>



		<div id="myModal" class="modal-custom"> 
			  <div class="modal-content-custom"> 
			    <span class="close-custom"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span>
				    <form id="form-project">
				    	<div class="form-group">
					    	<label for="email">Project Name</label>
					    	<input type='text' name='maker' id='proj-name' class="form-control" required/>
					  	</div>
					  	 <button type="submit" class="btn btn-primary">Submit</button>
				    </form>

			  </div> 
		</div> 
	</div> 

	</div>
</div>  
<script type="text/javascript" src="/js/projectAjax.js"></script> 
<script type="text/javascript">
  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>  