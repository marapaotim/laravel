<?php  
require_once('inc/Message.class.php');
require_once('inc/User.class.php'); 

$action = '';
if(isset($_REQUEST['action'])){
  $action = filter_var(trim($_REQUEST['action']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
}
$smartyConfig = new Config(); 
$smarty = $smartyConfig->dataConfig(); 

if(isset($_SESSION["fullname"])){ $smarty->assign('fullname', $_SESSION["fullname"]); } else { $smarty->assign('fullname', 'false'); }  

$smarty->assign('action',$action);
switch($action)
{
  case 'main': 
  case 'about-us': 
  case 'blog':
  case 'login': 
  case 'signup':
  case 'profile':
    if(isset($_SESSION["fullname"]) && $action == 'login' || !isset($_SESSION["fullname"]) && $action == 'profile') {  
        $action = 'main';  
    }
    break;
  default:
    if($action != '')
    {
      echo "Error 404: Page not found";
    }
    $action = 'main';
} 
if($action == 'main')
{

  $allEntries = new Messages(); 
  $allEntry = $allEntries->viewMessages(0);
  $smarty->assign('people', $allEntry); 
  $smarty->assign('to', $allEntries->viewMessagePagination());
  $smarty->display('index.tpl'); 
}
if($action == 'about-us')
{ 
  $smarty->display('about_us.tpl');
}

if($action == 'blog')
{ 
  $smarty->display('blog.tpl');
}
if($action == 'login')
{ 
  $smarty->display('login.tpl');
}
if($action == 'signup')
{ 
  $smarty->display('signup.tpl');
}
if($action == 'profile')
{ 
  $smarty->display('profile.tpl');
}