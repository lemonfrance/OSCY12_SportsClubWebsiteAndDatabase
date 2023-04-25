<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Summary - Admin </title>

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

<p class="titles" id="bodyttl"> Summary </p>
<p>
<font id='orangefont'>
Total Members:
</font>
<?php 
include "koac_connection16.php";
$details = "club_members";
$sql = "SELECT * FROM $details";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$sql);
$numrows_all = mysqli_num_rows($result);
echo $numrows_all."<br>";

$sql_j = "SELECT * FROM $details WHERE Grade LIKE 'Junior'";
mysqli_select_db($conn,$dbname);
$result_j = mysqli_query($conn,$sql_j);
$numrows_j = mysqli_num_rows($result_j);

$sql_i = "SELECT * FROM $details WHERE Grade LIKE 'Intermediate'";
mysqli_select_db($conn,$dbname);
$result_i = mysqli_query($conn,$sql_i);
$numrows_i = mysqli_num_rows($result_i);


$sql_s = "SELECT * FROM $details WHERE Grade LIKE 'Senior'";
mysqli_select_db($conn,$dbname);
$result_s = mysqli_query($conn,$sql_s);
$numrows_s = mysqli_num_rows($result_s);

echo "<font id='orangefont'>- Juniors:</font> &nbsp".$numrows_j."<br>";
echo "<font id='orangefont'>- Intermediate:</font> &nbsp".$numrows_i."<br>";
echo "<font id='orangefont'>- Seniors:</font> &nbsp".$numrows_s;
?>
</p>

<p>
<font id='orangefont'>
Unpaid Members:
</font>
<?php 
$sql = "SELECT * FROM $details WHERE HasPaid LIKE 'FALSE'";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$sql);
$numrows = mysqli_num_rows($result);
echo $numrows.'/'.$numrows_all;
?>
</p>

<p>
<font id='orangefont'>
Total Fees:
</font>
<?php 
$sql = "SELECT SUM(AnnualFee) FROM $details ";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$sql);
$paidfees = mysqli_fetch_assoc($result);
echo "$".$paidfees['SUM(AnnualFee)'].".00";
?>
</p>

<p>
<font id='orangefont'>
Total Fees Received:
</font>
<?php 
$sql = "SELECT SUM(AmountPaid) FROM $details ";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$sql);
$paidfees = mysqli_fetch_assoc($result);
echo "$".$paidfees['SUM(AmountPaid)'].".00";
?>
</p>

<p>
<font id='orangefont'>
Total Fees Due:
</font>
<?php 
$sql = "SELECT SUM(AnnualFee) FROM $details ";
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$sql);
$annualfees = mysqli_fetch_assoc($result);
$duefees =($annualfees['SUM(AnnualFee)']) - ($paidfees['SUM(AmountPaid)']);
echo "$".$duefees.".00";
?>
</p> 

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

<div id= "header">
<img id="logo" src="koac logo.png">
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



</body>

</html>