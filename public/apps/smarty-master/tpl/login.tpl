{include file="menu.tpl"}
<div class="container">
	<div class="row">
		<center><h3><u>Login Form</u></h3></center>
		<hr> 
		<div class="col-sm-6 col-md-4 col-md-offset-4 account-wall">
			<form method="post" id="signinform">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" class="form-control" id="username" placeholder="Username" required> 
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password" required>
			  </div> 
			  <input type="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="SUBMIT">   
			  <br>
			  <label><input type="checkbox" value="remember-me"> Remember me</label>
                <a href="?action=signup" class="pull-right">Sign Up here </a>
			</form>
		</div>
	</div>
</div>
{include file="footer.tpl"}