$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var editor = '';
var path = '';
var currentTab;
var project_path;
var project_fold;
$(document).ready(function(e) {  
		var qs = decodeURIComponent(window.location.search.substring(1));
		var projectname = qs.split("=");
		console.log(projectname[1]); 
		project_path =  './apps/' + projectname[1];
		project_fold = projectname[1];
		tvt_editor(project_path);
 
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
	function tvt_editor(dir){
		$('#import').attr("disabled", "disabled");
		$('a#import').text('Loading. . .');
		$.ajax({
	            dataType: 'json',
	            type:'GET',
	            url: 'tveditor',
	            data:{
	            	dir:dir
	            },
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){
	        	$('.option-list-2 div.files-lists').html(''); 
	        	rows = ''; 
			 	rows = rows + '<ul style="list-style-type:none">';  
	        		display_files(result); 
	        	rows = rows + '</ul>';   
	        	$('.option-list-2 div.files-lists').append(rows); 

	        	$(".option-list-2 li ul").hide(); 
	        	$('.option-list-2 li a').click(function(e) {
				  e.preventDefault();  
				 $(this).closest("li").find("[class^='options']").toggle();
				});  
 				$("#import").removeAttr("disabled");  
				$('a#import').text('Import');
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
	         	rows = rows + '<li><i class="fa fa-file-code-o fa-2x" aria-hidden="true"></i> <a href="#" onclick="retrieveXML(this); return false" data-path='+ item_second.path.replace(/\s/g,'') +'>' + item_second.name + '</a></li>';
	        } 
	    }, "json")  
	}


	function save_file_contents(){ 
			$('#save_files').attr("disabled", "disabled");
			$('#texteditor img').show();  
		$.ajax({
	            dataType: 'json',
	            type:'POST',
	            url: '/save_file',
	            data:{
  	              	path: path, 
  	              	content: editor.getValue()
            	}, 
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){ 
	         	$("#save_files").removeAttr("disabled");  
	         	$('#texteditor img').hide(); 
	         	alert(result.status); 
	    }); 
	} 

function getBase64(file) {
   var reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = function () {
     ajaxFile(reader.result, file.name);
   };
   reader.onerror = function (error) {
     console.log('Error: ', error);
   };
}

var folder_name = '';
function ajaxFile(files, filename){ 
	$.ajax({
	            dataType: 'json',
	            type:'POST',
	            url: 'files_data',
	            data:{
	            	files: files,
	            	filename:filename,
	            	project_fold:project_fold + '/'
	            },
	            _token: '{{ csrf_token() }}'
	        }).done(function(result){ 
				tvt_editor(project_path); 
	         	console.log(result); 
	    });  
}

	$('#uploadFile').change( function(event) {
		$('div.option-list-2 .file-name').html(event.target.files[0].name); 
		$('#import').attr("disabled", "disabled"); 
		$('a#import').text('Loading. . .');
		getBase64(event.target.files[0]); 
	}); 

}); 

	
function retrieveXML(data){ 
	path = data.getAttribute("data-path"); 
	//console.log(path);
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
        	var arrayTabs = new Array();
        	var tabexist = true;
        	editor.setValue(result);
        	if($('#myTab li a').length == 0){
        		$('#myTab').append('<li><a data-toggle="tab" href="'+ path +'" onclick="tabs_file(this); return false" data-path='+ path +'><button class="close closeTab" type="button" >×</button>'+filename+'</a></li>');   
        	}
   			else{
   				$("#myTab li a").each(function( index ){
   					if(filename == $(this).text().substring(1).toString())
   					{
   						tabexist = true; 
   						return false;
   					} 
   					else{
   						tabexist = false; 
   					}
   				})
   			}
   			if(tabexist == false)
   			{
   				$('#myTab').append('<li><a data-toggle="tab" href="'+ path +'" onclick="tabs_file(this); return false" data-path='+ path +'><button class="close closeTab" type="button" >×</button>'+filename+'</a></li>');  
   			}  
        	
        	close_tab(); 
        }); 
}

function tabs_file(data){
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

function close_tab(){
	$(".closeTab").click(function () {  
		var tabContentId = $(this).parent().attr("href");
		$(this).parent().parent().remove();  
		$(tabContentId).remove();  
    });
}

$("#import").click(function(){
    $('#uploadFile').trigger('click');
});

$("#export_project").click(function(){
if(confirm("Export Project?") == true)
   $.ajax({
            dataType: 'json',
            type:'post',
            url: 'export_proj',
            data:{
				project_path: project_path 
			},
            _token: '{{ csrf_token() }}'
        }).done(function(result){ 
        	window.location = result.file_rar;
        }); 
});



