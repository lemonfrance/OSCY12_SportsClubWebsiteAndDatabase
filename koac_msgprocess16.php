<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<meta name="revised" content="27/08/2017"/>
<title> Kiwi Ormiston Athletic Club - Contacts </title>

<link rel="stylesheet" type="text/css" href="koac_stylesheet16.css">
</head>

<body>

<div id=="bodybg">

<div id="content">

<p class="titles" id="bodyttl"> Contacts </p>
<p>
<?php
include "koac_connection16.php";

if(isset($_POST['msg_name'])){
	echo "Successfully added Name; <br>";
	$msg_name = $_POST['msg_name'];
}
else{
	echo "Name of sender not indicated; value set to 'Unkown Sender' <br>";
	$msg_name = "Unknown Sender";
}

if(isset($_POST['msg_email'])){
	$msg_email = $_POST['msg_email'];
}
else{
	echo "Email of sender not indicated; can't be left null <br>";
}

if(isset($_POST['msg_phone'])){
	$msg_phone = $_POST['msg_phone'];
}
else{
	echo "Phone number of sender not indicated; left null <br>";
	$msg_phone = "";
}

if(isset($_POST['msg'])){
	$msg = $_POST['msg'];
}
else{
	echo "No message;  can't be left null <br>";
}

$sql = "INSERT INTO club_messages(SenderName, SenderPhoneNo, SenderEmail, SenderMessage) VALUES('$msg_name' , '$msg_phone' ,'$msg_email' , '$msg') ";
$result = mysqli_query($conn,$sql);

if($result){
	echo "Your message has been sent. <br>";
}
else{
	echo mysqli_errno($conn).":".mysqli_error($conn)."<br>";
}

?>
</p>

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

</body>

</html>