@include('header')
<div class="container-fluid header-other">
	<div class="row">
			<div><img src="{{asset('images/owl.jpg')}}" title="Pandas" class="img-responsive"/></div>
	</div>
</div>
<div class="maxsize">
	<div class="container">
		<div class="row">
			<div class="page-title">
				<h3>Contact  Page</h3>
			</div>
			<div class="col-md-8 contact-form">
				<form id="form-contact-us">
					<div class="form-group">
						<label for="email">Name *</label>
						<input type="text" id="name" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="email">Email *</label>
						<input type="email" id="email" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="email">Subject *</label>
						<input type="text" id="subject" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="email">Your Message *</label>
						<textarea rows="6" id="message" class="form-control" required></textarea>
					</div>
					<button type="submit" class="btn btn-danger" id="submit-contact">Submit <img src="{{asset('images/loading.gif')}}"> </button> 
					<div class="display-success"></div>
				</form>
			</div> 
			<div class="col-md-4 contact-info">
				  <h3>Contact Number(s):</h3> <p>121212121212 <br> 121212121212</p> 
				  <h3>Email Address:</h3><p>121212121212@sadasda.com <br> 121212121212@adasdsa.com</p> 
				  <h3>Address:</h3><p>1223 sadas asdsd <br> 121212121212 asdasd asdasd sad</p>
				
			</div> 
		</div>
	</div>
</div>
<script type="text/javascript" src="./js/contactAjax.js"></script>
@include('footer')