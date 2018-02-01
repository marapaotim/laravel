$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var modal;
$(document).ready(function(e) {
	display_project();  
	modal = document.getElementById('myModal');
	$("#create-proj").click(function () {  
		modal.style.display = "block";
    });

    $("#myModal span").click(function () {  
		modal.style.display = "none";
    });
});

   $("#form-project").submit(function(e) {
       e.preventDefault();  
       create_project(); 
   });

function getBase64(file) {
   var reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = function () {
   	get_files(reader.result, file.name)
    // console.log(reader.result, file.name);
   };
   reader.onerror = function (error) {
     console.log('Error: ', error);
   };
}
$('#uploadFile').change( function(event) { 
		$('#import-proj').attr("disabled", "disabled"); 
		$('a#import-proj').text('Loading. . .');
		getBase64(event.target.files[0]); 
}); 

$("#import-proj").click(function(){
    $('#uploadFile').trigger('click');
});
function get_files(files, filename){
	$.ajax({
	            dataType: 'json',
	            type:'POST',
	            url: 'get_file_zip',
	            data:{
	            	files: files,
	            	filename:filename
	            },
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){ 
	        	display_project();  
	         	console.log(result); 
	    }); 
}
function display_project(){
		$('#import-proj').attr("disabled", "disabled"); 
		$('a#import-proj').text('Loading. . .');
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'display_projects', 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){  
	         	//console.log(result);
	         	$('.project').html(''); 
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
	         	$("#import-proj").removeAttr("disabled");  
				$('a#import-proj').html('<i class="fa fa-download" aria-hidden="true"></i>  Import Project');
	    }); 
	}

function create_project(){
	var folder_name = $('#proj-name').val();
	$.ajax({
	            dataType: 'json',
	            type:'post',
	            url: 'create_mobile_project', 
	            data:{
	            	folder_name: folder_name, 
	            }, 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){   
	        	display_project();
	        	alert(result.status);
	        	$('#form-project')[0].reset(); 
	    });
}