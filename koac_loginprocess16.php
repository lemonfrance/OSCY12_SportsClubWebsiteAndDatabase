<?php
include "koac_connection16.php";

mysqli_select_db($conn,$dbname);

//since the assessment only requires me to make a 
// program where admin can login

$sql = "SELECT * FROM admin_account";
mysqli_query($conn,$sql);
$result= mysqli_query($conn,$sql);
$details = mysqli_fetch_assoc($result);

$login_username = $_POST['login_username'];
$login_password = $_POST['login_password'];

if ($login_username == $details['AdminUser'] and $login_password == $details['AdminPass']){
	header("Location:koac_adminsummary16.php");
	exit();
}
else{
?>
	<!doctype html>
	<html>

	<head>
	<meta charset= "utf-8">
	<meta name="viewport" content="width:device-width,initial-scale:1.0">
	<meta name="revised" content="27/08/2017"/>
	<title> Kiwi Ormiston Athletic Club - Account Login </title>

	<link rel="stylesheet" type="text/css" href="koac_stylesheet16.css">
	</head>

	<body>
	<form enctype="multipart/form-data" method="POST">

	<div id="login_bg2">
	</div>

	<div id="login_bg1">
	</div>

	<div id="login_content">
	<p id='wronglogin'> Login details do not exist. </p>
	<p> <center><input type="submit" value="Go back to Login Page" formaction="koac_login16.php"/></center> </p>
	
	</div>

	<div id= "login_tabs">
	<h2>
	<a id="tablinks" href="koac_index16.php"> Go to website >> </a>
	</h2>
	</div>

	<div id= "login_footer">
	<a target='_blank' href='https://en-gb.facebook.com/login/'><img id="footerlogos" src="koac_fb.png"></a> &nbsp &nbsp &nbsp
	<a target='_blank' href='https://www.tumblr.com/login'><img id="footerlogos" src="koac_tumblr.png"></a> &nbsp &nbsp &nbsp
	<a target='_blank' href='https://www.instagram.com/accounts/login/'><img id="footerlogos" src="koac_ig.png"></a>
	<br><sub>Website by Franz Naling, © 2017</sub>
	</div>

	<div id= "login_header">
	<img id="login_logo" src="koac logo.png">
	</div>
	
	</form>
	
	</body>

	</html>
<?php
}
?>