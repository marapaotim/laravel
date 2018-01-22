$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var editor = '';
$(document).ready(function(e) {  
tvt_editor();
displayFiles();  
	function displayFiles(){
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'xmlfiles', 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){
	        	//console.log(result);
	        	//var rows = '';
	        $.each(result, function(i, item) {
                rows = rows + '<li class="check"><a href="#" onclick="retrieveXML(this); return false" data-path='+ item.file +'>';
            	rows = rows + item.file + '</a></li>';  
            }, "json")
	        	//$('.option-list-2 ul').html(rows); 
	    }); 
	}

	editor = CodeMirror.fromTextArea(document.getElementById("xmlcontent"), {
	  mode: "application/xml",
	  styleActiveLine: true,
	  lineNumbers: true,
	  lineWrapping: true
	});


	var rows = '';
	function tvt_editor(){
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'tveditor', 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){
	        	rows = '';
	        	display_files(result); 
	        	$('.option-list-2').append(rows); 
	        	//console.log(result); 
	        	$('.option-list-2 li a').click(function(e) {
				  e.preventDefault(); 
				  $(this).closest("li").find("[class^='options']").slideToggle();
				  //$("ul.options ").css("display","none");
				}); 
	    	});  
	} 
	function display_files(itemarray){  
		$.each(itemarray, function(index, item_second) {  
			 rows = rows + '<ul class="options" style="list-style-type:none">'; 
	        if($.isNumeric(index) == false)
	        { 
	         	rows = rows + '<li class="folder"><a href="#">' + index + '</a></li>'; 
	         	display_files(item_second);
	        }
	        else
	        {  
	         	rows = rows + '<li class="check"><a href="#" onclick="retrieveXML(this); return false" data-path='+ item_second.path +'>' + item_second.name + '</a></li>';
	        } 
	        rows = rows + '</ul>'; 
	    }, "json")  
	}

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
