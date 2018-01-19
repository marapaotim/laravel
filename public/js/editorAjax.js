$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var editor = '';
$(document).ready(function(e) {  

displayFiles();  
	function displayFiles(){
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'xmlfiles', 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){
	        	//console.log(result);
	        	var rows = '';
	        $.each(result, function(i, item) {
                rows = rows + '<li class="check"><a href="#" onclick="retrieveXML(this); return false" data-path='+ item.file +'>';
            	rows = rows + item.file + '</a></li>';  
            }, "json")
	        	$('.option-list-2 ul').html(rows); 
	    }); 
	}

	editor = CodeMirror.fromTextArea(document.getElementById("xmlcontent"), {
	  mode: "application/xml",
	  styleActiveLine: true,
	  lineNumbers: true,
	  lineWrapping: true
	});

});


	
function retrieveXML(data){ 
	$.ajax({
            dataType: 'json',
            type:'GET',
            url: 'xmlcontent',
            data:{
				path: data.getAttribute("data-path"),
			},
            _token: '{{ csrf_token() }}'
        }).done(function(result){
        	//console.log(result);
        	editor.setValue(result);
           //$("textarea#xmlcontent").val(result); //console.log(result); 
        }); 
}
