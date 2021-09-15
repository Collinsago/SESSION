
<?php
session_start();
require_once('class.user.php');
$user = new USER();
 
if($user->is_loggedin()!="")
{
	$user->redirect('account.php');
}
 
if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "<center>sorry username already taken !</center>";
			}
			else if($row['user_email']==$umail) {
				$error[] = "<center>sorry email id already taken !</center>";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}
 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Technopoints:Signup</title>
  
  
  <link rel='stylesheet prefetch' href='bootstrap/js/jquery-ui.css'>
  <link rel="stylesheet" href="bootstrap/css/style-new.css">
  <link rel="stylesheet" href="style.css">
 
  
</head>
 
<body>
<br/><br/><br/>

<div class="login-card">
    <h1>Signup</h1><br>
  <form method="post" id="login-form">
        <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
		?>
    <input type="text" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" /><br><br>
    <input type="text" name="txt_umail" placeholder="Enter Email" value="<?php if(isset($error)){echo $umail;}?>"/><br><br>
	<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" /><br><br>
    <input type="submit" name="btn-signup" class="login login-submit" value="Sign Up" /> <br><br>
  </form>
    
  <div class="login-help">
    Already Registered? <a href="index.php">Login Here</a>
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