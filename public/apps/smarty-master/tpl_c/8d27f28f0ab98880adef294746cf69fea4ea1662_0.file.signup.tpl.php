<?php
/* Smarty version 3.1.32-dev-38, created on 2018-01-10 17:48:03
  from 'C:\xampp\htdocs\smarty\tpl\signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a5643c3e96974_46509162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d27f28f0ab98880adef294746cf69fea4ea1662' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty\\tpl\\signup.tpl',
      1 => 1514967768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5a5643c3e96974_46509162 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
