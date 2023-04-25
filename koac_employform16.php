<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<meta name="title" content="Kiwi Ormiston Athletic Club - Employment Opportunities">
<meta name="keyword" content="Kiwi Ormiston Athletic Club,kiwi ormiston, kiwi,ormiston,sports,athletic,club,koac,koac employment, kiwi ormiston employment,apply,job,apply for job,athletic club job,kiwi ormiston jobs,kiwi ormiston employment,job opportunities,employment opportunities"/>
<meta name="description" content="Every year with the Kiwi Ormiston Athletic Club is made exciting, challenging and fulfilling with a range of activities and events.
This section includes a compilation of announcements, upcoming events and monthly newsletters."/>
<meta name="revised" content="27/08/2017"/>

<title> Kiwi Ormiston Athletic Club - Employment Opportunities </title>

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

The following are currently available employment opportunities in our club:
<?php 
include "koac_connection16.php";
$sql = "SELECT * FROM club_vacantjobs";
$result = mysqli_query($conn,$sql);

if($result){
	while ($jobs = mysqli_fetch_assoc($result)){
		echo "<p>";
		echo "<font id='orangefont'>> &nbsp".$jobs['Job']."</font>";
		echo "<br>&nbsp - &nbsp".$jobs['JobDescription'];
		echo "</p>";
	}
}
else{
	echo mysqli_errno($conn).":".mysqli_error($conn)."<br>";
}
?>
<hr>


<p class="titles" id="bodysub"> Employment Registration Form: </p>

<form enctype="multipart/form data" action="koac_employprocess16.php" method="POST">

<p>
*Date of birth should be in the format yyyy-mm-dd
</p>

<p>
<label>First Name:</label>
<input type="text" id="textbox" name="firstname"/>
</p>

<p>
<label>Last Name:</label>
<input type="text" id="textbox" name="lastname"/>
</p>

<p>
<label> Street Address:</label>
<input type="text" id="textbox" name="street"/>
</p>

<p>
<label> Suburb:</label>
<input type="text" id="textbox" name="suburb"/>
</p>

<p>
<label>Phone Number:</label>
<input type="text" id="textbox" name="phone"/>
</p>

<p>
<label>Date of Birth:</label>
<input value='Format should be yyyy-mm-dd' type="text" id="textbox" name="birth"/>
</p>

<p>
<label>School/Workplace:</label>
<input type="text" id="textbox" name="schl_wrk"/>
</p>

<p>
<label>Had been a member/employee before:</label>
<input type="checkbox" id="checkbox" name="memberb4" value="TRUE"/>
</p>

<p>
<label>New Zealand Resident:</label>
<input type="checkbox" id="checkbox" name="nzres" value="TRUE"/>
</p>

<p>
<label>Apply for:</label>
<select id= "dropbox" name="applyjob"> 
<?php
include "koac_connection16.php";
$applyjob = $_POST['applyjob'];
mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_vacantjobs";
$result = mysqli_query($conn, $sql);
while($applyjob = mysqli_fetch_assoc($result)){
	echo "<option value='".$applyjob['Job']."'>".$applyjob['Job']."</option>";
}
?>
</select>
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