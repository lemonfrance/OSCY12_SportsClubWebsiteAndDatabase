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
Select Applicant:
<select id="dropbox" name="member_applicant">
<?php
include "koac_connection16.php";
$sql = "SELECT * FROM club_applymember";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)){
	echo "<option value='".$row['ID']."'>".$row['ID'].":".$row['FirstName']."&nbsp".$row['LastName']."</option>";
}
?>
</select>
</p>

<p> <input type="submit" formaction="koac_adminmember_acc16.php" value="Accept"/> 
<input type="submit" formaction="koac_adminmember_dec16.php" value="Decline"/>  </p>

</form>

<hr>

<p>
<?php
include "koac_connection16.php";
$member_sql = "SELECT * FROM club_applymember";
$member_result = mysqli_query($conn,$member_sql);

if($member_result){
	echo "<table>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Parent/s or Guardian/s</th>";
	echo "<th>Street Address</th>";
	echo "<th>Suburb</th>";
	echo "<th>Phone Number</th>";
	echo "<th>Date of Birth</th>";
	echo "<th>Grade</th>";
	echo "<th>Had Been a Member Before</th>";
	echo "<th>New Zealand Resident</th>";
	echo "</tr>";
	while ($row= mysqli_fetch_assoc($member_result)){
		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['FirstName']."</td>";
		echo "<td>".$row['LastName']."</td>";
		echo "<td>".$row['Parent_or_Guardian']."</td>";
		echo "<td>".$row['StreetAddress']."</td>";
		echo "<td>".$row['Suburb']."</td>";
		echo "<td>".$row['PhoneNo']."</td>";
		echo "<td>".$row['Birthdate']."</td>";
		echo "<td>".$row['Grade']."</td>";
		echo "<td>".$row['MemberBefore']."</td>";
		echo "<td>".$row['NZResident']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo mysqli_errno($conn).":".mysqli_error($conn)."<br>";
}

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