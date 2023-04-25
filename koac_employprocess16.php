<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<meta name="revised" content="27/08/2017"/>
<title> Kiwi Ormiston Athletic Club - Apply for Membership </title>

<link rel="stylesheet" type="text/css" href="koac_stylesheet16.css">
</head>

<body>

<style>
body{
	font-family: Arial, Calibri, sans-serif;
	background-color: #7F7F7F;
}
</style>

<div id="bodybg">

<div id="content">

<p class="titles" id="bodyttl"> Employment Opportunities </p>
<form enctype="multipart/form data" action="" method="POST">

<p>
<?php
include "koac_varlist16.php";
include "koac_connection16.php";

mysqli_select_db($conn,$dbname);

$sql = "INSERT INTO club_employment(FirstName, LastName, StreetAddress, Suburb, PhoneNo, Birthdate, School_Workplace, Member_EmpBefore, NZResident, ApplyJob)
VALUES ('$firstname', '$lastname', '$street', '$suburb', '$phone', '$birth', '$schl_wrk', '$memberb4', '$nzres', '$applyjob')";

$result = mysqli_query($conn,$sql);
if ($result){
	echo "<form enctype='multipart/form data' action='koac_index16.php' method='POST'>";
	echo "Your application has successfully been submitted. <br>";
	echo "<input type='submit' value='Go Back to Home Page'>";
}
else{
	echo "<form enctype='multipart/form data' action='koac_employform16.php' method='POST'>";
	echo "Your application form has been declined due to an error. <br>";
	echo mysqli_errno($conn).":".mysqli_error($conn)."<br>";
	echo "<input type='submit' value='Go Back to Employment Registration Form'>";
}

?>
</p>

<input type="submit" value="Submit Form">

</form>

</div>

<div id= "footer">
<a target='_blank' href='https://en-gb.facebook.com/login/'><img id="footerlogos" src="koac_fb.png"></a> &nbsp &nbsp &nbsp
<a target='_blank' href='https://www.tumblr.com/login'><img id="footerlogos" src="koac_tumblr.png"></a> &nbsp &nbsp &nbsp
<a target='_blank' href='https://www.instagram.com/accounts/login/'><img id="footerlogos" src="koac_ig.png"></a>
<br><sub>Website by Franz Naling, © 2017</sub>
</div>

</div>

<div id= "navigation">
<p><h3> Quick Links: </h3></p>
<p><a id="navlinks" href="koac_login16.php">Account Login</a><p>
<p><a id="navlinks" href="koac_memberform16.php">Apply for membership</a><p>
<p><a id="navlinks" href="koac_employform16.php">Employment opportunities</a></p>
</div>

<div id= "tabs">

<p><h2>
<a id="tablinks" href="koac_index16.php"> Home </a> &nbsp &nbsp 

<div class="tabdrop">
	<a class="tabbtn" href="koac_aboutus16.php"> About Us </a> &nbsp &nbsp
	<div class="tabcont">
		<a href="koac_uniforms16.php"> Uniforms </a> 
		<a href="koac_sched16.php"> Schedule and Activities </a>
	</div>
</div>

<a id="tablinks" href="koac_parents16.php"> Parents Section </a> &nbsp &nbsp

<a id="tablinks" href="koac_photogallery16.php"> Photo Gallery </a> &nbsp &nbsp

<div class="tabdrop">
	<a class="tabbtn" href="koac_events16.php"> Events </a> &nbsp
	<div class="tabcont">
		<a href="koac_bulletin16.php"> Bulletin </a>
		<a href="koac_newsletters16.php"> Newsletters </a>
	</div>
</div>

<div class="tabdrop">
	<a class="tabbtn" href="koac_application16.php"> Application </a> &nbsp &nbsp
	<div class="tabcont">
		<a href="koac_memberform16.php"> Apply for Membership </a>
		<a href="koac_employform16.php"> Employment Opportunities </a> 
	</div>
</div>

<a id="tablinks" href="koac_contacts16.php"> Contacts </a></h2></p>

</div>

<div id= "header">
<img id="logo" src="koac logo.png">
</div>

<a href="#top"> <div id= "backtotop">
<h3> back to top </h3>
</div> </a>

</body>

</html>