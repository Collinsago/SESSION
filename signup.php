
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
  <form action="sign-up.php" method="post" id="login-form">
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
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='signin.php'>login</a> here
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
    Already Registered? <a href="signin.php">Login Here</a>
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