@include('header')
@include('sidebar') 
<div class="maxsize">
	<div class="container content-wrap">
		<div class="row">
			<div class="page-title">
				<h3>Editor Page</h3>
			</div> 
			<div class="col-md-3 option-list-2">  
			<div class="row">
			<form>
				<ul class="list-inline">
					<li><a href="#" id="import" class="btn btn-danger">Import</a>  
					<input type="file" value="upload" id="uploadFile" accept=".rar,.zip"/></li>
					<li><a href="#" id="export_project" class="btn btn-primary">Export</a></li>
				</ul> 
			</form> 
				<div class="text-center file-name"></div>
				<div class="files-lists"></div> 
			</div>   
			</div>
			<div class="col-md-9">
				<form id="texteditor">
					<div class="form-group">
						<label for="label-file" class="label-file text-danger">Editor:</label>
						<ul class="nav nav-tabs marginBottom" id="myTab">   
					    </ul>
						<textarea id="xmlcontent" class="form-control"></textarea>
					</div>
					<button class="btn btn-primary" id="save_files" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Save</button> <img src="{{asset('images/loading.gif')}}">
				</form>
			</div>
		</div>
	</div>  
</div>
	</div>  
</div>    



<!-- Code Mirror -->

<script type="text/javascript" src="/js/editorAjax.js"></script>
<script type="text/javascript" src="/codemirror/lib/codemirror.js"></script>
<script type="text/javascript" src="/codemirror/selection/active-line.js"></script>
<script type="text/javascript" src="/codemirror/xml/xml.js"></script> 
<script type="text/javascript" src="/codemirror/mode/css/css.js"></script> 
<script type="text/javascript" src="/codemirror/edit/closebrackets.js"></script> 
<script type="text/javascript" src="/codemirror/edit/closetag.js"></script>
<script type="text/javascript" src="/codemirror/display/fullscreen.js"></script>
<script type="text/javascript" src="/codemirror/keymap/sublime.js"></script>
<script type="text/javascript">
  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script> 

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/codemirror.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/xml/xml.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/javascript/javascript.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/css/css.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/clike/clike.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/php/php.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/ruby/ruby.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/python/python.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/vb/vb.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/addon/dialog/dialog.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/addon/search/searchcursor.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.23.0/addon/search/search.min.js"></script>

<script src="/TVTeditor/src/js/jquery.enhsplitter.js"></script>

<script src="/TVTeditor/src/js/tvteditor.js"></script> -->
 