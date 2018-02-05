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
				<form id="form-contact-us"  method="POST">
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
					<div class="g-recaptcha" data-sitekey="6LdXVEQUAAAAAE5QBTFbNxHyl4KtWqTqrRrvxgDD"></div>
					<div class="text-danger error-captcha">Please verify that you are not a robot.</div>
					<br>
					<button type="submit" class="btn btn-danger" id="submit-contact">Submit <i class="fa fa-spin fa-spinner"></i><!-- <img src="{{asset('images/loading.gif')}}"> --> </button> 
					<div class="display-success"></div>
				</form> 
			</div> 
			<div class="col-md-4 contact-info">

				<iframe width="100%" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJi8MeVwPKlzMRH8FpEHXV0Wk&amp;key=AIzaSyBbsqAET18rKy7xZVzos1LrI1mdypXMOEE" allowfullscreen=""></iframe>
				<br>
				  <h3>Address:</h3><p>1223 sadas asdsd <br> 121212121212 asdasd asdasd sad</p>
				  <h3>Contact Number(s):</h3> <p>121212121212 <br> 121212121212</p> 
				  <h3>Email Address:</h3><p>121212121212@sadasda.com <br> 121212121212@adasdsa.com</p> 
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="./js/contactAjax.js"></script> 
@include('footer')