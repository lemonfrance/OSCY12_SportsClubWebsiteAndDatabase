<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Database - Admin </title>

<link rel="stylesheet" type="text/css" href="koac_stylesheet16.css">
</head>

<body>

<style>
body{
	font-family: Arial, Calibri, sans-serif;
	background-color: #7F7F7F;
}
</style>

 <div id='admin_content'>
 <p class='titles' id='bodyttl'> Database </p>
<form enctype='multipart/form-data' method='POST'>
<?php
include "koac_connection16.php";
$totalpts = $_POST['totalpts'];
mysqli_select_db($conn, $dbname);
$totalpts = $_POST['totalpts'];

$sql = "SELECT SUM(Points) AS sumpoints FROM club_results WHERE MemberNo LIKE '$totalpts'";
$result = mysqli_query($conn,$sql);
$points = mysqli_fetch_assoc($result);
$points = $points['sumpoints'];

if ($result){
	$sql = " SELECT * FROM club_members WHERE MemberNo LIKE '$totalpts' ";
	$result = mysqli_query($conn,$sql);
	$member = mysqli_fetch_assoc($result);
	echo "<p> Member &nbsp".$member['MemberNo']."&nbsp".$member['FirstName']."&nbsp".$member['LastName']."&nbsp has a total of &nbsp".$points."&nbsp points.";
	$sql = " SELECT * FROM club_results WHERE MemberNo LIKE '$totalpts' ";
	$result = mysqli_query($conn,$sql);
	echo "<p>";
	echo "<b>".$member['MemberNo'].": &nbsp".$member['FirstName']."&nbsp".$member['LastName']."'s Points </b>";
	echo "<table>";
	echo "<tr>";
	echo "<th> Points </th>";
	echo "<th> Event Date </th>";
	echo "</tr>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['Points']."</td>";
		echo "<td>".$row['EventDate']."</td>";
		echo "</tr>";
	}
	echo "<table>";
	echo "</p>";
}
else{
	echo mysqli_errno($conn).":".mysqli_error($conn);
}

?>

<p>
<input type='submit' value='Go Back to Admin - Database' formaction='koac_admindatabase16.php'/>
</p>
</form>

<hr>

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