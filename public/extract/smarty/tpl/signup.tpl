{include file="menu.tpl"}
<div class="container">
	<div class="row">
		<center><h3><u>Signup Form</u></h3></center>
		<hr> 
		<div class="col-sm-6 col-md-4 col-md-offset-4 account-wall">
			<form method="post" id="signupform">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Fullname</label>
			    <input type="text" class="form-control" id="signup_fullname" placeholder="Fullname" required> 
			  </div>
			  <div class="form-group">
			    <label for="">Username</label>
			    <input type="text" class="form-control" id="signup_username" placeholder="Username" required> 
			  </div>
			  <div class="form-group">
			    <label for="">Password</label>
			    <input type="password" class="form-control" id="signup_password" placeholder="Password" required>
			  </div> 
			  <div class="form-group">
			  	 <label for="exampleInputEmail1">Gender</label><br>
			  	<label class="radio-inline"><input type="radio" name="signup_gender" value="Male" checked>Male</label>
				<label class="radio-inline"><input type="radio" name="signup_gender" value="Female">Female</label> 
			  </div> 
			  <input type="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="SUBMIT">    
			</form>
		</div>
	</div>
</div>
{include file="footer.tpl"}