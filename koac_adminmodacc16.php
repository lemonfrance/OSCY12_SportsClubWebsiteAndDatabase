<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Settings - Admin </title>

<link rel="stylesheet" type="text/css" href="koac_stylesheet16.css">
</head>

<body>

<style>
body{
	font-family: Arial, Calibri, sans-serif;
	background-color: #7F7F7F;
}
</style>

<div id="admin_content">

<p class="titles" id="bodyttl"> Settings </p>
<form enctype='multipart/form-data' method="POST">
<?php 
include "koac_connection16.php";

$old_pw = $_POST['old_pw'];

$new_pw = $_POST['new_pw'];

$re_pw = $_POST['re_pw'];

mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM admin_account";

$result = mysqli_query($conn, $sql);

$admin_details = mysqli_fetch_assoc($result);

if($old_pw == $admin_details['AdminPass']){
	echo "Old password recognized";
	$new_pw = $_POST['new_pw'];
	if($re_pw == $new_pw){
		echo "<p>Old password recognized</p>";
		$sql = "UPDATE admin_account
		SET AdminPass = '$new_pw'";
		mysqli_select_db($conn,$dbname);
		$result = mysqli_query($conn,$sql);
		echo "<p>Password changed.</p>";
	}
	else{
		echo "<p> New password error. </p>";
	}
}
else{
	echo "<p> You entered the wrong old password. </p>";
}

?>
<p>
<input type="submit" formaction="koac_adminsettings16.php" value="Go back to Admin - Settings"/>
</p>
</form>

 <div id= 'admin_footer'>
 <sub>Website by Franz Naling, © 2017</sub>
 </div>

 </div>
 
  <div id= 'admin_nav'>
 <p><h3> Navigation: </h3></p>
 <p><a id='navlinks' href='koac_index16.php'>Website</a><p>
 <hr>
 <p><a target='_blank' id='navlinks' href='https://en-gb.facebook.com/login/'><img id='footerlogos' src='koac_fb.png'></a> <br><a target='_blank' id='navlinks' href='https://en-gb.facebook.com/login/'>Facebook</a></p>
 <p><a target='_blank' id='navlinks' href='https://www.tumblr.com/login'><img id='footerlogos' src='koac_tumblr.png'></a> <br><a target='_blank' id='navlinks' href='https://www.tumblr.com/login'>Tumblr</a></p>
 <p><a target='_blank' id='navlinks' href='https://www.instagram.com/accounts/login/'><img id='footerlogos' src='koac_ig.png'></a>  <br><a target='_blank' id='navlinks' href='https://www.instagram.com/accounts/login/'>Instagram</a></p>
 </div>

<div id= "tabs">

 <p><h2>
 <a id='tablinks' href='koac_adminsummary16.php'> Summary </a> &nbsp &nbsp
 
 <div class='tabdrop'>
	<a class='tabbtn' href='koac_admindatabase16.php'> Database </a> &nbsp &nbsp
	 <div class='tabcont'>
		 <a href='koac_admindetails16.php'> Details </a>
		 <a href='koac_adminfees16.php'> Fees </a>
		 <a href='koac_adminpoints16.php'> Points </a>
	 </div>
 </div>
 <div class='tabdrop'>
	 <a class='tabbtn' href='koac_adminapply16.php'> Application </a> &nbsp &nbsp
	 <div class='tabcont'>
		 <a href='koac_adminmember16.php'> Membership </a>
		 <a href='koac_adminemploy16.php'> Employment </a>
	 </div>
 </div>

 <a id='tablinks' href='koac_adminwebsite16.php'> Website </a> &nbsp &nbsp
 
 <a id='tablinks' href='koac_adminmessage16.php'> Messages </a> &nbsp &nbsp

 <a id='tablinks' href='koac_adminsettings16.php'> Settings </a> &nbsp &nbsp
 
 <div class= 'logout'>
 <a id='tablinks' href='koac_index16.php'> >> Logout </a>
 </div>
 
 </p></h2>
 
</div>

<div id= "header">
<img id="logo" src="koac logo.png">
</div>

<a href="#top"> <div id= "backtotop">
<h3> back to top </h3>
</div> </a>

</body>

</html>