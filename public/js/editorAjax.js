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

		//folders_zip(); 
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

	// function folders_zip(){
	// 	$.ajax({
	//             dataType: 'json',
	//             type:'GET',
	//             url: 'folders_zip',
	//             _token: '{{ csrf_token() }}'
	//         }).done(function(result){ 
	//         	console.log(result);
	//         	//var foldername = result[0].split('/');
	//          	//console.log(foldername[0]);
	//     }); 
	// }


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
	        	//console.log('json' + result.file);
	         	console.log(result); 
	    }); 
	//var parts = filename.substr(0, filename.lastIndexOf('.')) || filename;
	//var x = parts[0];
	//console.log('string ' + folder_name);
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
   			//if ( ) {
			//}
   //      	$( ".nav-tabs" ).each(function( index ) {
   //      		console.log($(this + 'li a').text().substring(1).toString());
   //      		if((filename == $(this).text().substring(1).toString()).length == 0 || (filename == $(this).text().substring(1).toString()) == false){
        			
   //      		}
  	// 			// if(filename !== $(this).text().substring(1).toString()){
  	// 			// 	console.log(filename);
  	// 			// //	$('.nav-tabs').append('<li><a href="'+ path +'" onclick="tabs_file(this); return false" data-path='+ path +'><button class="close closeTab" type="button" >×</button>'+filename+'</a></li>');  
  	// 			// } 
			// });
        	
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
		//there are multiple elements which has .closeTab icon so close the tab whose close icon is clicked
		var tabContentId = $(this).parent().attr("href");
		$(this).parent().parent().remove(); //remove li of tab
		//$('#myTab a:last').tab('show'); // Select first tab
		$(tabContentId).remove(); //remove respective tab content 
    });
}

$("#import").click(function(){
    $('#uploadFile').trigger('click');
});


