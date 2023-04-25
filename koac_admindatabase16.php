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

 <font id='orangefont'>
<p>
 <form enctype="multipart/form-data" method='POST' action = "koac_adminallsearch16.php">
 <input type='text' id="searchbox" name='allsearch'>
 <input type='submit' value='Search'>
</p>

<p>
<a href='koac_admindetails16.php'> Details </a>
&nbsp | &nbsp
<a href='koac_adminfees16.php'> Fees </a>
&nbsp | &nbsp
<a href='koac_adminpoints16.php'> Points </a>
</p>
</font>
</form>
<hr>

<p id="orangefont">> Member and Details:</p>
<?phpinclude "koac_connection16.php";?>

<form enctype="multipart/form-data" method='POST'>
<p>
Add Member: 
</p>

<p>
<label>- First Name:</label>
<input type="text" id="textbox" name="firstname"/>
</p>

<p>
<label>- Last Name:</label>
<input type="text" id="textbox" name="lastname"/>
</p>

<p>
<label>- Parent/s or Guardian/s:</label>
<input type="text" id="textbox" name="parents"/>
</p>

<p>
<label>- Street Address:</label>
<input type="text" id="textbox" name="street"/>
</p>

<p>
<label>- Suburb:</label>
<input type="text" id="textbox" name="suburb"/>
</p>

<p>
<label>- Phone Number:</label>
<input type="text" id="textbox" name="phone"/>
</p>

<p>
<label>- Date of Birth:</label>
<input type="text" id="textbox" name="birth" value="Format should be yyyy-mm-dd"/>
</p>

<p>
<label>- Grade:</label>
<select id="dropbox" name="gr">
<option value="Junior">Junior</option>
<option value="Intermediate">Intermediate</option>
<option value="Senior">Senior</option>
<select/>
</p>

<p>
<input type= "submit" formaction="koac_addmember16.php" value="Add Member"/>
</p>
</form>

<form enctype="multipart/form-data" method='POST'>
<p>
Modify Member Details:
</p>
<p> &nbsp - Select member:
<select id= "dropbox" name="modmember"> 
<?php
include "koac_connection16.php";
$modmember = $_POST['modmember'];
mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn, $sql);
while($member = mysqli_fetch_assoc($result)){
	echo "<option value='".$member['MemberNo']."'>".$member['MemberNo'].":".$member['FirstName']."&nbsp".$member['LastName']."</option>";
}
?>
</select>
</p>

<p> *Leave textbox blank if you do not wish to change the field's content </p>

<p>
<label>- First Name:</label>
<input type="text" id="textbox" name="mod_firstname"/>
</p>

<p>
<label>- Last Name:</label>
<input type="text" id="textbox" name="mod_lastname"/>
</p>

<p>
<label>- Parent/s or Guardian/s:</label>
<input type="text" id="textbox" name="mod_parents"/>
</p>

<p>
<label>- Street Address:</label>
<input type="text" id="textbox" name="mod_street"/>
</p>

<p>
<label>- Suburb:</label>
<input type="text" id="textbox" name="mod_suburb"/>
</p>

<p>
<label>- Phone Number:</label>
<input type="text" id="textbox" name="mod_phone"/>
</p>

<p>
<label>- Date of Birth:</label>
<input type="text" id="textbox" name="mod_birth" value="Format should be yyyy-mm-dd"/>
</p>

<p>
<label>- Grade:</label>
<select id="dropbox" name="mod_gr">
<option value="Junior">Junior</option>
<option value="Intermediate">Intermediate</option>
<option value="Senior">Senior</option>
<select/>
</p>

<p>
<input type= "submit" formaction="koac_modmember16.php" value="Modify Member Details"/>
</p>
</form>

<form enctype="multipart/form-data" method='POST'>
<p>
Delete Member:
</p>
<p>
&nbsp - Select member:
<select id= "dropbox" name="delmember"> 
<?php
include "koac_connection16.php";
$member = $_POST['delmember'];
mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn, $sql);
while($member = mysqli_fetch_assoc($result)){
	echo "<option value='".$member['MemberNo']."'>".$member['MemberNo'].":".$member['FirstName']."&nbsp".$member['LastName']."</option>";
}
?>
</select>
</p>
<p>
<input type= "submit" formaction="koac_delmember16.php" value="Delete Member"/>
</p>
</form>

<hr>

<p id="orangefont">> Fees:</p>

<form enctype="multipart/form-data" method='POST'>
<p>
Settle Full Annual Payments:
</p>
<p>
&nbsp - Select Unpaid Member: 
<select id= "dropbox" name="unpaidmember"> 
<?php
include "koac_connection16.php";

$unpaidmember = $_POST['unpaidmember'];
mysqli_select_db($conn, $dbname);

$sql = "SELECT * FROM club_members WHERE HasPaid LIKE 'FALSE'";
$result = mysqli_query($conn, $sql);
while($fee = mysqli_fetch_assoc($result)){
	echo "<option value='".$fee['MemberNo']."'>".$fee['MemberNo'].":".$fee['FirstName']."&nbsp".$fee['LastName']."</option>";
}
?>
</select>
</p>
<p>
Date Paid: <input type="text" id="textbox" name="datepaid" value="Format should be yyyy-mm-dd">
</p>
<p><sub>*Annual fee: $350 for Seniors, $300 for Intermediate, $250 for Juniors</sub></p>
<p><input type= "submit" formaction="koac_settlefee16.php" value="Settle Payment"/>
</p>
</form>

<hr>
<p id="orangefont">> Points:</p>

<form enctype="multipart/form-data" method='POST'>
<p>
Display Total Points of a Member: <br>
&nbsp - Select member:
<select id= "dropbox" name="totalpts"> 
<?php
include "koac_connection16.php";

mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn, $sql);
while($totalpts = mysqli_fetch_assoc($result)){
	echo "<option value='".$totalpts['MemberNo']."'>".$totalpts['MemberNo'].":".$totalpts['FirstName']."&nbsp".$totalpts['LastName']."</option>";
}
?>
</select>
<br>
<input type= "submit" formaction="koac_totalpts16.php" value="Display Member's Total Points"/>
</p>
</form>

<form enctype="multipart/form-data" method='POST'>
<p>
Add Member Points:<br>
&nbsp - Select member: 
<select id= "dropbox" name="addpts"> 
<?php
include "koac_connection16.php";

mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn, $sql);
while($pts = mysqli_fetch_assoc($result)){
	echo "<option value='".$pts['MemberNo']."'>".$pts['MemberNo'].":".$pts['FirstName']."&nbsp".$pts['LastName']."</option>";
}
?>
</select>
</p>
<p>
New Points: <input type="text" id="textbox" name="addpts_points">
</p>
<p>
New Event Date: <input type="text" id="textbox" name="addpts_date" value="Format should be yyyy-mm-dd"> 
</p>
<p>
<input type= "submit" formaction="koac_addpts16.php" value="Add Points"/>
</p>
</form>

<form enctype="multipart/form-data" method='POST'>
<p>
Modify Member Points:<br>
&nbsp - Select member:
<select id= "dropbox" name="modpts_member"> 
<?php
include "koac_connection16.php";

mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn, $sql);
while($pts = mysqli_fetch_assoc($result)){
	echo "<option value='".$pts['MemberNo']."'>".$pts['MemberNo'].":".$pts['FirstName']."&nbsp".$pts['LastName']."</option>";
}
?>
</select>
<br>
&nbsp - Select event date:
<select id= "dropbox" name="modpts_eventdate"> 
<?php
include "koac_connection16.php";

mysqli_select_db($conn, $dbname);
$sql = "SELECT EventDate FROM club_results UNION SELECT EventDate FROM club_results ORDER BY EventDate";
$result = mysqli_query($conn, $sql);
while($pts = mysqli_fetch_assoc($result)){
	echo "<option value='".$pts['EventDate']."'>".$pts['EventDate']."</option>";
}
?>
</select>
</p>
<p> *Leave textbox blank if you do not wish to change the field's content </p>
<p>
New Points: <input type="text" id="textbox" name="modnewpts_points">
</p>
<p>
New Event Date: <input type="text" id="textbox" name="modnewpts_date" value="Format should be yyyy-mm-dd"> 
</p>
<p>
<input type= "submit" formaction="koac_modpts16.php" value="Modify Points and Event Date"/>
</p>
</form>

<form enctype="multipart/form-data" method='POST'>
<p>
Delete Member Points:<br>
&nbsp - Select member:
<select id= "dropbox" name="delpts_member"> 
<?php
include "koac_connection16.php";

mysqli_select_db($conn, $dbname);
$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn, $sql);
while($pts = mysqli_fetch_assoc($result)){
	echo "<option value='".$pts['MemberNo']."'>".$pts['MemberNo'].":".$pts['FirstName']."&nbsp".$pts['LastName']."</option>";
}
?>
</select><br>
&nbsp - Select event date:
<select id= "dropbox" name="delpts_eventdate"> 
<?php
include "koac_connection16.php";

mysqli_select_db($conn, $dbname);
$sql = "SELECT EventDate FROM club_results UNION SELECT EventDate FROM club_results ORDER BY EventDate";
$result = mysqli_query($conn, $sql);
while($pts = mysqli_fetch_assoc($result)){
	echo "<option value='".$pts['EventDate']."'>".$pts['EventDate']."</option>";
}
?>
</select>
<br>
<input type= "submit" formaction="koac_delpts16.php" value="Delete Points"/>
</p>
</form>
<hr> 
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
 </p></h2>
 
 <div class= 'logout'>
 <a id='tablinks' href='koac_index16.php'> >> Logout </a>
 </div>

 </div>

 <div id= 'header'>
 <img id='logo' src='koac logo.png'>
 </div>

 <a href='#top'> <div id= 'backtotop'>
 <h3> back to top </h3>
 </div> </a>


</body>

</html>