<?php
	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	//Image
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	//unlink("user_images/".$userRow['userPic']);
 
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome, <?php print($userRow['user_name']) ?></title>
<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/style.css">
<link rel="stylesheet" href="style.css">

 
</head> 
<body>
<nav class="navbar navbar-default navbar-expand-xl navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="#">Tutorial</a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<ul class="nav navbar-nav">
			<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="" class="nav-link">Edit</a></li>
			<li class="nav-item"><a href="https://www.technopoints.co.in/about" class="nav-link">About</a></li>
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="#" class="dropdown-item">Web Design</a></li>
					<li><a href="#" class="dropdown-item">Web Development</a></li>
					<li><a href="#" class="dropdown-item">Graphic Design</a></li>
					<li><a href="#" class="dropdown-item">Digital Marketing</a></li>
				</ul>
			</li>
			<li class="nav-item"><a href="https://www.technopoints.co.in" class="nav-link">Blog</a></li>
			<li class="nav-item"><a href="https://www.technopoints.co.in/contact" class="nav-link">Contact</a></li>
		</ul>
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<ul class="nav navbar-nav navbar-right ml-auto">
			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="images/default-pic.png" class="avatar" alt="Avatar"> <?php print($userRow['user_name']); ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="logout.php?logout=true" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<left>
<h1>Welcome, <?php print($userRow['user_name']) ?></h1>
<br/><br/><br/>
<img src="images/default-pic.png"/>
<h3>Name:<?php print($userRow['user_name']) ?></h3>
<h3>Email: <?php print($userRow['user_email']) ?></h3>
<h3>User ID: <?php print($userRow['user_id']) ?></h3>
<button class="button button1" onclick="window.location.href='logout.php?logout=true'">Logout</button>
</left>

<div class="container">
<div class="row">
<div class="col-md-12">

<table style="font-family: arial, sans-serif; border-collapse: collapse; width: 50%;">
    <tr style="background-color: lightgray;">
      <td colspan="2" style="border: 2px solid #dddddd; text-align: left; padding: 10px; 
      font-weight:900; font-size: 20px;">PROFILE <span style="float: right;"> Edit 
       </span> 
      </td> 
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Picture</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> 
    <center><img class="pp" src="<?php echo $image; ?>" height="140" width="160"></center></td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">User ID</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> <?php echo $userRow['user_id'];?> </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">User Name</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"><?php echo $userRow['user_email'];?></td>
    
      
  </tr>
    </table>

     <br><br>

    <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 50%;">

    <tr style="background-color: lightgray;">
      <td colspan="2" style="border: 2px solid #dddddd; text-align: left; 
      padding: 10px;font-weight:900; font-size: 20px;">PERSONAL INFORMATION </td>
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">First Name</td>
    <td style="border: 2px solid #dddddd; text-align: left;"><?php echo $userRow['user_name'];?></td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Middle Name</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"><?php echo $userRow['user_name'];?></td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Last Name</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> <?php echo $userRow['user_name'];?> </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Date of Birth</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Gender</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> <?php echo $userRow['gender'];?></td>
    
  </tr>

  <tr >
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Marital Status</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">  <?php echo $userRow['status'];?></td>
  </tr>

  <tr >
  <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Mobile Phone</td>
  <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
</tr>

<tr >
<td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">L.G.A</td>
<td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> <?php echo $userRow['lga'];?> </td>
</tr>

<tr >
<td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">State of Origin</td>
<td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> <?php echo $userRow['state'];?> </td>
</tr>

<tr>
<td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Religion</td>
<td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">  </td>
</tr>

</table>

<br><br>

<table style="font-family: arial, sans-serif; border-collapse: collapse; width: 50%;">

    <tr style="background-color: lightgray;">
      <td colspan="2" style="border: 2px solid #dddddd; text-align: left; padding: 10px; 
      font-weight:900; font-size: 20px;">CONTANT ADDRESS</td>
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Address</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">  </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">L.G.A</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">State of Origin</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">  </td>
    
      
  </tr>
</table>

<br><br>

<table style="font-family: arial, sans-serif; border-collapse: collapse; width: 50%;">

    <tr style="background-color: lightgray;">
      <td colspan="3" style="border: 2px solid #dddddd; text-align: left; padding: 10px; 
      font-weight:900; font-size: 20px;">EDUCATION</td>
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Qualification</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> School/Institution</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> Date</td>
  </tr>

  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    
  </tr>
</table>

<br><br>

<table style="font-family: arial, sans-serif; border-collapse: collapse; width: 50%;">

    <tr style="background-color: lightgray;">
      <td colspan="2" style="border: 2px solid #dddddd; text-align: left; padding: 10px; 
      font-weight:900; font-size: 20px;">BANK DETAILS</td>
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Account Name</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Account NO:</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    
  </tr>
  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Bank Name</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
  </tr>

  <tr>
  <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">Identity No:</td>
  <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
</tr>
</table>

<br><br>

<table style="font-family: arial, sans-serif; border-collapse: collapse; width: 50%;">

    <tr style="background-color: lightgray;">
      <td colspan="2" style="border: 2px solid #dddddd; text-align: left; padding: 10px; 
      font-weight:900; font-size: 20px;">MEANS OF IDENTIFICATION</td>
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">ID</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    
  </tr>

  <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;">ID NO:</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    </tr>

    <tr>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 30px;">Upload ID</td>
    <td style="border: 2px solid #dddddd; text-align: left; padding: 10px;"> </td>
    </tr>
    </table>

<br><br>
</body>
</html>