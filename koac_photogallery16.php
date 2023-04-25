<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<meta name="title" content="Kiwi Ormiston Athletic Club - Photo Gallery">
<meta name="keyword" content="kiwi ormiston athletic club,kiwi ormiston, kiwi,ormiston,sports,athletic,club,koac,koac albums, koac photo albums, koac photos,koac gallery, koac photo gallery,kiwi ormiston albums, kiwi ormiston photo albums, kiwi ormiston photos,kiwi ormiston gallery, kiwi ormiston photo gallery">
<meta name="description" content="Here you can see albums with photos related to our club."/>
<meta name="revised" content="27/08/2017"/>
<title> Kiwi Ormiston Athletic Club - Photo Gallery </title>

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

<p class="titles" id="bodyttl"> Photo Gallery </p>

<p> Click on the large blue button to open and see the photos inside the album.</p>
<font id="orangefont">

<form enctype='multipart/form-data' method="POST" action='koac_displayphotos16.php'>

<?php
include "koac_connection16.php";
$sql = "SELECT * FROM club_albums";
$result = mysqli_query($conn,$sql);

if($result){
	while ($albums = mysqli_fetch_assoc($result)){
		$openalbum = $albums['AlbumName'];
		echo "<div id='album'> <img class='albumcover' src='album_covers/".$albums['AlbumCover']."'>";
		echo "<button class='openalbum' name='album' value='".$openalbum."'>".$albums['AlbumName']."</button></div>";
	}
}
else{
	echo mysqli_errno($conn).":".mysqli_error($conn)."<br>";
}

?>

</font>

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