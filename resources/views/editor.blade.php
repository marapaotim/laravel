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
<script type="text/javascript" src="/js/editorAjax.js"></script>
<script type="text/javascript" src="codemirror/lib/codemirror.js"></script>
<script type="text/javascript" src="codemirror/selection/active-line.js"></script>
<script type="text/javascript" src="codemirror/xml/xml.js"></script>
 
@include('footer')