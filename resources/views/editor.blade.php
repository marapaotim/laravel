@include('header') 
<div class="container">
		<div class="row">
			<div class="page-title">
				<h3>Editor Page</h3>
			</div> 
			<div class="col-md-2 option-list-2">
				<ul class="list-group list-unstyled">
					<!--<li class="check"><a href="note.xml">Files 1</a></li>
					<li class="check"><a href="#">Files 2</a></li>
					<li class="check"><a href="#">Files 3</a></li>
					<li class="check"><a href="#">Files 4</a></li>
					<li class="check"><a href="#">Files 5</a></li>
					<li class="check"><a href="#">Files 6</a></li>
					<li class="check"><a href="#">Files 7</a></li> 	-->			
				</ul>
			</div>
			<div class="col-md-10">
				<form>
					<div class="form-group">
						<label for="pwd">Editor:</label>
						<textarea rows="15" id="xmlcontent" class="form-control"></textarea>
					</div>
					<button class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>

</div> 

 <div id="tvteditor"></div>



<!-- Code Mirror -->

<script type="text/javascript" src="/js/editorAjax.js"></script>
<script type="text/javascript" src="/codemirror/lib/codemirror.js"></script>
<script type="text/javascript" src="/codemirror/selection/active-line.js"></script>
<script type="text/javascript" src="/codemirror/xml/xml.js"></script>


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
 
@include('footer')