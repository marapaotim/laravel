$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(e) {
	display_project();   

	function display_project(){
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'display_projects', 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){  
	         	//console.log(result); 
	         	var rows = '';
	         	$.each(result, function(index, data) {  
	         	rows = rows + '<div class="col-md-3 project-hov">'; 
	         	rows = rows + '<a href="editor?projectname='+ data +'">'; 
				rows = rows + '<img src="./images/smartphone.png" class="img-responsive" title="'+ data +'">';
				rows = rows + '<div class="middle"><div class="go-to-project">Go to project</div></div>';
				rows = rows + '<figcaption class="text-center text-success">'+ data +'</figcaption>';
	         	rows = rows + '</div>';   
	         	//	console.log(data);
	         	});  
	         	$('.project').append(rows); 
	    }); 
	}

});