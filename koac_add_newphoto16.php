<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Website - Admin </title>

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
<p class="titles" id="bodyttl"> Website </p>
<form enctype='multipart/form-data' method='POST'>
<?php
include "koac_connection16.php";
mysqli_select_db($conn,$dbname);

$storepath = 'album_photos/'.basename($_FILES['addphoto']['name']);

$selectalbum = $_POST['selectalbum'];

if(isset($_POST['photottl'])){
	$photottl = $_POST['photottl'];
}
if (empty($_POST['photottl'])){
	echo "<p>Photo title can't be left null.</p>";
}

if(isset($_FILES['addphoto']['name'])){
	$addphoto = $_FILES['addphoto']['name'];
}
if (empty($_FILES['addphoto']['name'])){
	echo "<p>Photo can't be left null.</p>";
}

if(isset($_POST['photocaption'])){
	$photocaption = $_POST['photocaption'];
}
if (empty($_POST['photocaption'])){
	$photocaption = "";
}

$sql = "INSERT INTO club_albumphotos(AlbumName, PhotoTitle, Photo, Caption) VALUES('$selectalbum','$photottl','$addphoto','$photocaption')";
mysqli_query($conn,$sql);

if(move_uploaded_file($_FILES['addphoto']['tmp_name'],$storepath)){
	echo "Successfully added &nbsp".$addphoto." &nbsp to album &nbsp".$selectalbum."&nbsp.";
}
else{
	echo mysqli_errno($conn).":".mysqli_error($conn);
}

?>
<p>
<input type="submit" formaction="koac_adminwebsite16.php" value="Go back to Admin - Website">
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