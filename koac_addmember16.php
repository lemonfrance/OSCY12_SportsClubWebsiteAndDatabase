<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="28/08/2017"/>
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
mysqli_select_db($conn, $dbname);

//--------------------------------------------------------

if (isset($_POST["firstname"])){ 
	$firstname = $_POST["firstname"]; 
}

if (empty($_POST["firstname"])){
	echo "You have not entered your first name. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["lastname"])){
	$lastname = $_POST["lastname"];
}

if (empty($_POST["lastname"])){
	echo "You have not entered your last name. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["parents"])){
	$parents = $_POST["parents"];
}

if (empty($_POST["parents"])){
	echo "You have not entered your first name. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["street"])){
	$street = $_POST["street"];
}

if (empty($_POST["street"])){
	echo "You have not entered your street address. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["suburb"])){
	$suburb = $_POST["suburb"];
}

if (empty($_POST["suburb"])){
	echo "You have not entered your suburb. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["phone"])){
	$phone = $_POST["phone"];
}

if (empty($_POST["phone"])){
	echo "You have not entered your phone number, so '---' will be the temporary value for the meantime. <br>";
	$phone = '---';
}

//--------------------------------------------------------

if (isset($_POST["birth"])){
	$birth = $_POST["birth"];
}

if (empty($_POST["birth"])){
	echo "You have not entered your birthday. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["gr"])){
	$gr = $_POST["gr"];
	if ($_POST["gr"] == 'Junior'){
		$annualfee = 250.00;
	}

	if ($_POST["gr"] == 'Intermediate'){
		$annualfee = 300.00;
	}

	if ($_POST["gr"] == 'Junior'){
		$annualfee = 350.00;
	}
}

if (empty($_POST["gr"])){
	echo "You have not entered your Grade. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["memberb4"])){
	$memberb4 = $_POST["memberb4"];
}

if (empty($_POST["memberb4"])){
	$memberb4 = 'FALSE';
}

//--------------------------------------------------------

if (isset($_POST["nzres"])){
	$nzres = $_POST["nzres"];
}

if (empty($_POST["nzres"])){
	$nzres = 'FALSE';
}

//--------------------------------------------------------

//--------------------------------------------------------

$amountpaid = 0;
$haspaid = "FALSE";
$datepaid = "";

$sql = "INSERT INTO club_members(FirstName, LastName, Parent_or_Guardian, StreetAddress, Suburb, PhoneNo, Birthdate, Grade, AnnualFee, AmountPaid, HasPaid, DatePaid)
VALUES('$firstname','$lastname', '$parents', '$street', '$suburb', '$phone', '$birth', '$gr', '$annualfee', '$amountpaid', '$haspaid', '$datepaid')"; 
$result = mysqli_query($conn, $sql);
if($result){
	echo "Successful insertion of new member.";
}
else{
	echo "Member insertion error:".mysqli_errno($conn).":".mysqli_error($conn);
}
?>
<p>
<input type="submit" formaction="koac_admindatabase16.php" value="Go back to Admin - Database">
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

 <div id= 'tabs'>

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

 <div id= 'header'>
 <img id='logo' src='koac logo.png'>
 </div>

 <a href='#top'> <div id= 'backtotop'>
 <h3> back to top </h3>
 </div> </a>


</body>

</html>