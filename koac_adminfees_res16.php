<!doctype html>
<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
<meta name="viewport" content="width:device-width,initial-scale:1.0">
<title> Database (Fees) - Admin </title>

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
 <p class='titles' id='bodyttl'> Database - Fees </p>

 <p>
 <font id='orangefont'>
 <form method='POST'>
 <input type='text' id="searchbox" name='search_input'>
 <input type='submit' value='Search' formaction="koac_adminfees_res16.php">
 </font>
 </form>
</p>
<p>
<?php

$members = "club_members";
$records = "club_results";
	
//PHP PDO code mostly based from: http://tutorial.world.edu/web-development/how-to-create-database-search-mysql-php-script/ 
    $servername = "localhost";
    $user = "root";
    $pw = "";
    $dbname = "kiwi_ormiston";
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pw, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

//PHP PDO shortens the script; the code above selects the database as well as connects. it is the same 
//with the examples because it seems there's no other way to write the code (and probably i'd be doing the 
//same with the rest because i've already tried every possibility but i failed, and everything seems short
//enough and accurately working as it is)

$search= $_POST['search_input'];
$query = $pdo->prepare("select * from $members 
where $members.MemberNo LIKE '%$search%' OR FirstName LIKE '%$search%' OR LastName LIKE '%$search%'");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
 if (!$query->rowCount() == 0) {
		echo "Search results for ' ".$search." ' : <br/>";
		echo "<table id='datatables'>";	
		echo "<tr>";
		echo "<th>MemberNo</th>";
		echo "<th>First Name</th>";
		echo "<th>Last Name</th>";
		echo "<th>Annual Fee</th>";
		echo "<th>Amount Paid</th>";
		echo "<th>Has Paid</th>";
		echo "<th>Date Paid</th>";
		echo "</tr>";				
	while ($results = $query->fetch()) {
		echo "<tr>";
		echo "<td>".$results['MemberNo']."</td>";
		echo "<td>".$results['FirstName']."</td>";
		echo "<td>".$results['LastName']."</td>";
		echo "<td>".$results['AnnualFee']."</td>";
		echo "<td>".$results['AmountPaid']."</td>";
		echo "<td>".$results['HasPaid']."</td>";
		echo "<td>".$results['DatePaid']."</td>";
		echo "</tr>";				
	}		
}
else {
	echo 'No results found for '.$search.'.';
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