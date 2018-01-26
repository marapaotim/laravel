<?php
/* Smarty version 3.1.32-dev-38, created on 2018-01-11 16:29:54
  from 'C:\xampp\htdocs\smarty\tpl\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a5782f2afd023_70357985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'facf80d96c77d10ea389148022a17aa59af86e77' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty\\tpl\\menu.tpl',
      1 => 1515672979,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5782f2afd023_70357985 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo '<script'; ?>
 src="js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/bootstrap.min.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="ajax/message.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="ajax/user.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="ajax/global.js"><?php echo '</script'; ?>
>


<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/global.css">  
<link rel="stylesheet" type="text/css" href="css/login.css"> 
<link rel="stylesheet" type="text/css" href="css/profile.css">

<?php echo '<script'; ?>
 type="text/javascript" src="fancybox-2.1.7/source/jquery.fancybox.pack.js?v=2.1.5"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="fancybox-2.1.7/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<style type="text/css"> 
html {
  position: relative;
  min-height: 100%;
}
body { 
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px;
  background-color: #333;
}

.container1 {
  width: auto;
  padding-left: 20px;
}
.container1 .text-muted {
  margin: 20px 0;
}
</style>
 

  <?php echo '<script'; ?>
>
    $(document).ready(function(){
      

      $('.fancybox').fancybox();
      $('.slider').bxSlider({  
        slideWidth: 300,
        pause: 3000,
        minSlides: 4,
        maxSlides: 5,
        moveSlides: 1,
        slideMargin: 10,
        infiniteLoop: true,
        pager: false,
        auto: true,
        onSliderLoad: function () {
          $('.bx-controls-direction').hide();
          $('.bx-wrapper').hover(
          function () { $('.bx-controls-direction').fadeIn(300); },
          function () { $('.bx-controls-direction').fadeOut(300); }
          );
          }
      });
    });
  <?php echo '</script'; ?>
>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid bottom-border">
      <div class="col-md-9"></div>
      <div class="col-md-3 sub-container">
        <div class="row">
          <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  placeholder="Search" >
              <span class="input-group-addon">
                  <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>  
              </span>
          </div>
        </div>
      </div>
  </div> 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?action=main">Guestbook Project</a>
    </div> 
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="?action=main">Home</a></li> 
        <li><a href="?action=about-us">About Us</a></li> 
        <li><a href="?action=blog">BLOG</a></li> 
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <?php if ($_smarty_tpl->tpl_vars['fullname']->value == 'false' || $_smarty_tpl->tpl_vars['fullname']->value == '') {?> 
          <li><a href="?action=signup">Sign Up</a></li> 
          <li><a href="?action=login">Login</a></li> 
        <?php } else { ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome: <?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>

          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?action=profile">My Profile</a></li>
            <li class="logout"><a href="#">Logout</a></li> 
          </ul>
        </li> 
        <?php }?>
      </ul>  
    </div>
  </div>
</nav><?php }
}
