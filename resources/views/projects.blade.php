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
				<li> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Create Project</button> </li> 
			</ul>
			<div class="col-md-12 project text-center text-success"></div> 
		</div>
	</div> 

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
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