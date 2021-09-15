<?php
session_start();
require_once("class.user.php");
$login = new USER();
if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}
 
if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "<p><center>Wrong Details !</center></p>";
	}	
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Technopoints:Login</title>
  <link rel='stylesheet prefetch' href='bootstrap/js/jquery-ui.css'>
  <link rel="stylesheet" href="bootstrap/css/style-new.css">  
  <link rel="stylesheet" href="style.css">
</head>
 
<body>
<br/><br/><br/>
  <div class="login-card">
    <h1>Log-in</h1><br>
  <form method="post" id="login-form">
    <input type="text" name="txt_uname_email" placeholder="Username or E mail ID">
    <input type="password" name="txt_password" placeholder="Your Password">
    <input type="submit" name="btn-login" class="login login-submit" value="login">
  </form>
  <div class="login-help">
    <a href="sign-up.php">Register</a>
  </div>
</div>
 
<div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
</body>
</html>