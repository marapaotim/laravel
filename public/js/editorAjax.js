$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var editor = '';
var path = '';
$(document).ready(function(e) {  
		tvt_editor(); 
		$('#texteditor img').hide(); 
		$('#save_files').click(function(e) {  
			e.preventDefault();  
			save_file_contents(); 
		}); 

	editor = CodeMirror.fromTextArea(document.getElementById("xmlcontent"), {
	  mode: "text/css",
	  styleActiveLine: true,
	  lineNumbers: true,
	  lineWrapping: true,
	  autoCloseBrackets: true,
	  autoCloseTags: true,
	  theme: "night", 
	  extraKeys: {
        "F11": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        }
      }
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
			 	rows = rows + '<div class="row">';
			 	rows = rows + '<ul style="list-style-type:none">'; 
			 	rows = rows + '<h2>Files</h2>';  
	        		display_files(result); 
	        	rows = rows + '</ul>'; 
	        	rows = rows + '</div>'; 
	        	$('.option-list-2 div.files-lists').append(rows); 

	        	$(".option-list-2 li ul").hide(); 
	        	$('.option-list-2 li a').click(function(e) {
				  e.preventDefault();  
				 $(this).closest("li").find("[class^='options']").toggle(); 
				}); 
	    	});  
	} 
	function display_files(itemarray){  
		$.each(itemarray, function(index, item_second) {  
	        if($.isNumeric(index) == false)
	        { 
	         	rows = rows + '<li><i class="fa fa-folder fa-2x" aria-hidden="true"></i> <a href="#">' + index + '</a>'; 
	         	rows = rows + '<ul class="options"  style="list-style-type:none">';
	         		display_files(item_second);
	         	rows = rows + '</ul>';
	         	rows = rows + '</li>';
	        }
	        else
	        {  
	         	rows = rows + '<li><i class="fa fa-file-code-o fa-2x" aria-hidden="true"></i> <a href="#" onclick="retrieveXML(this); return false" data-path='+ item_second.path +'>' + item_second.name + '</a></li>';
	        } 
	    }, "json")  
	}


	function save_file_contents(){ 
			$('#save_files').attr("disabled", "disabled");
			$('#texteditor img').show();  
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'save_file',
	            data:{
  	              	path: path, 
  	              	content: editor.getValue()
            	}, 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){ 
	         	alert(result.status); 
	         	$("#save_files").removeAttr("disabled");  
	         	$('#texteditor img').hide(); 
	    }); 
	}

});


	
function retrieveXML(data){ 
	path = data.getAttribute("data-path"); 
	var fileNameIndex = path.lastIndexOf("\\") + 1;
	var filename = path.substr(fileNameIndex);
	$('label.label-file').html(filename);
	$.ajax({
            dataType: 'json',
            type:'GET',
            url: 'xmlcontent',
            data:{
				path: path,
			},
            _token: '{{ csrf_token() }}'
        }).done(function(result){ 
        	editor.setValue(result);  
        }); 
}
