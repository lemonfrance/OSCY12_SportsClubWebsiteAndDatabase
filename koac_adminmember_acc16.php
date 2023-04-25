<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Application (Membership) - Admin </title>

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

<p class="titles" id="bodyttl"> Application - Membership Applications </p>

<font id="orangefont">
Membership Applications
</font>

<form enctype='multipart/form-data' method="POST">

<p>
<?php
include "koac_connection16.php";

$member_applicant = $_POST['member_applicant'];

$sql = "SELECT * FROM club_applymember WHERE ID LIKE '$member_applicant'";
$result = mysqli_query($conn,$sql);
if ($result){
	while ($addmember = mysqli_fetch_assoc($result){
		$fname = $addmember['FirstName'];
		$lname = $addmember['LastName'];
		$parent = $addmember['Parent_or_Guardian'];
		$st = $addmember['StreetAddress'];
		$sub = $addmember['Suburb'];
		$phone = $addmember['PhoneNo'];
		$birth = $addmember['Birthdate'];
		$gr = $addmember['Grade'];
	}
	$payment = 0;
	$haspaid = 'FALSE';
	if ($gr == 'Junior'){
		$annfee = 250;
	}
	
	if ($gr == 'Intermediate'){
		$annfee = 300;
	}
	
	if ($gr == 'Senior'){
		$annfee = 350;
	}
	
	$acc_sql = "INSERT INTO club_members(FirstName, LastName, Parent_or_Guardian, StreetAddress, Suburb, PhoneNo, Birthdate, Grade, AnnualFee, AmountPaid, HasPaid) VALUES('$fname', '$lname', '$parent', '$st', '$sub', '$phone', '$birth', '$gr', '$annfee', '$payment', '$haspaid') ";
	$acc_result = mysqli_query($conn,$acc_sql);
	if($acc_result){
		echo "<p> Member number &nbsp".$member_applicant."&nbsp has been accepted as a new member. </p>";
	}
	else{
		mysqli_errno($conn).":".mysqli_error($conn);
	}
}
else{
	mysqli_errno($conn).":".mysqli_error($conn);
}

?>
</p>

<p>
<input type="submit" value="Go Back to Application (Membership) - Admin" formaction="koac_adminmember16.php"/>
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