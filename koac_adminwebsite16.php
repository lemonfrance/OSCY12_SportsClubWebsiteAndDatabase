<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Website - Admin </title>

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
<?php include "koac_connection16.php";?>

<p class="titles" id="bodyttl"> Website </p>

<form method="POST">
<p id="orangefont"> Announcements: </p>

	<p> > Add to Announcements: </p>
	<p>Title:
	<input type="text" id="textbox" name="announce_ttl">
	</p>
	<p>Content:
	<br><textarea rows="12" cols="60" name="announce_body"></textarea>
	</p>
	
	<p> > Modify Announcements: 
	<select id="dropbox" name="modann">
	<?php
	$annsql = "SELECT * from club_bulletin WHERE BulletinSection LIKE 'Announcements'";
	mysqli_select_db($conn,$dbname);
	$allann = mysqli_query($conn,$annsql);
	while ($ann = mysqli_fetch_assoc($allann)){
		echo "<option value='".$ann['Title']."'>".$ann['Title']."</option>";
	}
	echo "</select>";
	echo "<p> *Leave textbox blank if you do not wish to change the field's content </p>";
	echo "<p>";
	echo "Title: &nbsp <input type='text' name='modann_ttl'/>";
	echo "</p>";
	echo "<p>";
	echo "Body: &nbsp <input type='text' name='modann_body'/>";
	echo "</p>";
	?>
	</p>
	<p>
	<input formaction="koac_modannexec16.php" type='submit' value='Modify Announcement'/>
	</p>
	
	<p> > Delete Announcement: 
	<select id="dropbox" name="deleteann">
	<?php
	$annsql = "SELECT * from club_bulletin WHERE BulletinSection LIKE 'Announcements'";
	mysqli_select_db($conn,$dbname);
	$allann = mysqli_query($conn,$annsql);
	while ($ann = mysqli_fetch_assoc($allann)){
		echo "<option value='".$ann['Title']."'>".$ann['Title']."</option>";
	}
	echo "</select>";
	?>	
	<p>
	<input formaction="koac_dellann16.php" type='submit' value='Delete Announcement'/>
	</p>

	<input formaction='koac_add_announce16.php' type='submit' value='Add Data to Announcements'/>
</form>

<hr>

<form method="POST">
<p id="orangefont"> Upcoming Events: </p>
	<p> > Add to Upcoming Events: </p>
	<p>Title:
	<input type="text" id="textbox" name="upc_ttl">
	</p>
	<p>Content:
	<br> <textarea rows="12" cols="60" name="upc_body"></textarea>
	</p>
	
	<p> > Modify Upcoming Events:
	<select id="dropbox" name="modupc">
	<?php
	$upcsql = "SELECT * from club_bulletin WHERE BulletinSection LIKE 'Upcoming Events'";
	mysqli_select_db($conn,$dbname);
	$allupc = mysqli_query($conn,$upcsql);
	while ($upc = mysqli_fetch_assoc($allupc)){
		echo "<option value='".$upc['Title']."'>".$upc['Title']."</option>";
	}
	echo "</select>";
	echo "<p> *Leave textbox blank if you do not wish to change the field's content </p>";
	echo "<p>";
	echo "Title: &nbsp <input type='text' name='modupc_ttl'/>";
	echo "</p>";
	echo "<p>";
	echo "Body: &nbsp <input type='text' name='modupc_body'/>";
	echo "</p>";
	?>
	</p>
	<p>
	<input formaction="koac_modupcexec16.php" type='submit' value='Modify Upcoming Event'/>
	</p>
	<p> > Delete Upcoming Events: 
	<select id="dropbox" name="delupc">
	<?php
	$upcsql = "SELECT * from club_bulletin WHERE BulletinSection LIKE 'Upcoming Events'";
	mysqli_select_db($conn,$dbname);
	$allupc = mysqli_query($conn,$upcsql);
	while ($upc = mysqli_fetch_assoc($allupc)){
		echo "<option value='".$upc['Title']."'>".$upc['Title']."</option>";
	}
	echo "</select>";
	?>
	<p>
	<input formaction="koac_delupc16.php" type='submit' value='Delete Upcoming Event'/>
	</p>
	
	<input formaction="koac_add_upc16.php" type='submit' value='Add Data to Upcoming Events'/>
</form>

<hr>

<form enctype="multipart/form-data" method="POST">
<p> <font id="orangefont"> Newsletters: </font>
<br> <sub> *Please add your newsletters in order </sub></p>
	<p> > Add to Newsletters: </p>
	<p>Newsletter Year:
	<input type="text" id="textbox" name="newsletterYR">
	</p>
	<p>Newsletter Title:
	<input type="text" id="textbox" name="newsletterTTL">
	</p>
	<p>Newsletter File:
	<input type='hidden' name='MAX_FILE_SIZE' value='100000000'/>
	<input name='newsletterfile' type='file'/>
	</p>
	<input formaction="koac_add_newsletters16.php" type='submit' value='Add Data to Newsletters'/>
	
	<p> > Delete Newsletters: 
	<select id="dropbox"  name="delnews">
	<?php
	$newssql = "SELECT * from club_newsletters";
	mysqli_select_db($conn,$dbname);
	$allnews = mysqli_query($conn,$newssql);
	while ($news = mysqli_fetch_assoc($allnews)){
		echo "<option value='".$news['NewsletterTitle']."'>".$news['NewsletterTitle']."</option>";
	}
	echo "</select>";
	?>
	<p>
	<input formaction="koac_delnews16.php" type='submit' value='Delete Newsletters'/>
	</p>
	
</form>

<hr>

<form enctype="multipart/form-data" method="POST">
<p id="orangefont"> Photo Gallery </p>

	<p> > Add New Album </p>
	<p>
	<label>New Album Name:</label> <input type="text" id="textbox" name="newalbum_name"> 
	</p>
	<p>
	<label> Album Cover Photo: </label>
	<input type='hidden' name='MAX_FILE_SIZE' value='100000000'/>
	<input name='newalbumcover' type='file'/>
	</p>
	<input formaction="koac_add_newalbum16.php" type='submit' value='Add New Album'/>


	<p> > Add Photo and/or Caption to Selected Album: 
	<select id="dropbox" name="selectalbum"> 
	<?php
		$sql = "SELECT * from club_albums";
		mysqli_select_db($conn,$dbname);
		$result = mysqli_query($conn,$sql);
		
		while ($albums = mysqli_fetch_assoc($result)){
			echo "<option value='".$albums['AlbumName']."'>".$albums['AlbumName']."</option>";
		}
	?>
	</select>
	</p>
	<p>Title:
	<input type="text" id="textbox" name="photottl">
	</p>
	<p>Photo:
	<input type='hidden' name='MAX_FILE_SIZE' value='100000000'/>
	<input name='addphoto' type='file'/>
	</p>
	<p>Caption:
	<input type="text" id="textbox" name="photocaption">
	</p>
	<p>
	<input formaction='koac_add_newphoto16.php' type='submit' value='Add to Album'/>
	</p>
	
	<p> > Delete Album: 
	<select id="dropbox" name="delalbum">
	<?php
		$sql = "SELECT * from club_albums";
		mysqli_select_db($conn,$dbname);
		$result = mysqli_query($conn,$sql);
		
		while ($album = mysqli_fetch_assoc($result)){
			echo "<option value='".$album['AlbumName']."'>".$album['AlbumName']."</option>";
		}
	?>
		</select>
	</p>
	<p>
	<input formaction='koac_delalbum16.php' type='submit' value='Delete Album'/>
	</p>
	
	<p> > Delete Photo: 
	<select id="dropbox" name="delphoto">
	<?php
		$sql = "SELECT * from club_albumphotos";
		mysqli_select_db($conn,$dbname);
		$result = mysqli_query($conn,$sql);
		
		while ($photo = mysqli_fetch_assoc($result)){
			echo "<option value='".$photo['PhotoTitle']."'>".$photo['PhotoTitle']."&nbsp from &nbsp".$photo['AlbumName']."</option>";
		}
	?>
		</select>
	</p>
	<p>
	<input formaction='koac_delphoto16.php' type='submit' value='Delete Photo and Caption'/>
	</p>

</form>
	
<hr>

<form method="POST">
<p id="orangefont"> Employment Opportunities: </p>
	<p>
	(table w/ modify and delete buttons)
	</p>
	<p> > Add Vacant Job:
	<input type="text" id="textbox" name="vacantjob"> 
	</p>
	<p> > Add Job Description:
	<br> <textarea rows="12" cols="60" name="jobdesc"></textarea>
	</p>
	<p>
	<input formaction="koac_addjob16.php" type='submit' value='Add Vacant Job'/>
	</p>
	
	<p> > Modify Vacant Job: 
	<select id="dropbox" name="modjob">
	<?php
	$sql = "SELECT * from club_vacantjobs";
	mysqli_select_db($conn,$dbname);
	$result = mysqli_query($conn,$sql);
	while ($job = mysqli_fetch_assoc($result)){
		echo "<option value='".$job['Job']."'>".$job['Job']."</option>";
	}
	echo "</select>";
	echo "<p> *Leave textbox blank if you do not wish to change the field's content </p>";
	echo "<p>";
	echo "Job: &nbsp <input type='text' name='modjob_name'/>";
	echo "</p>";
	echo "<p>";
	echo "Job Description: &nbsp <input type='text' name='modjob_desc'/>";
	echo "</p>";
	
	// must have varlist and process files
	?>
	</p>
	<p>
	<input formaction="koac_modjobexec16.php" type='submit' value='Modify Vacant Job'/>
	</p>
	
	<p> > Delete Vacant Job: 
	<select id="dropbox" name="deljob">
	<?php
		$jobsql = "SELECT * from club_vacantjobs";
		mysqli_select_db($conn,$dbname);
		$alljobs = mysqli_query($conn,$jobsql);
		
		while ($job = mysqli_fetch_assoc($alljobs)){
			echo "<option value='".$job['Job']."'>".$job['Job']."</option>";
		}
		echo "</select>";
	?>
		
	</p>
		<p>
	<input formaction="koac_deljob16.php" type='submit' value='Delete Vacant Job'/>
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