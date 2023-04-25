<html>

<head>
<meta charset= "utf-8">
<meta name="revised" content="27/08/2017"/>
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
 
<div id="admindatabase_allsearch">

<font id='orangefont'>
<p>
 <form method='POST' action = "koac_adminallsearch16.php">
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

<form enctype='multipart/form-data' method='POST'>
<p>
<input type="submit" formaction="koac_admindatabase16.php" value="Go back to Admin - Database">
</p>
</form>
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

$search= $_POST['allsearch'];
$query = $pdo->prepare("select * from $members RIGHT JOIN $records ON $members.MemberNo = $records.MemberNo 
where $members.MemberNo LIKE '%$search%' OR FirstName LIKE '%$search%' OR LastName LIKE '%$search%'");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
 if (!$query->rowCount() == 0) {
		echo "Search results for ' ".$search." ' : <br/>";
		echo "<table>";	
		echo "<tr>";
		echo "<th id='alldata_h'>MemberNo</th>";
		echo "<th id='alldata_h'>First Name</th>";
		echo "<th id='alldata_h'>Last Name</th>";
		echo "<th id='alldata_h'> Parent/s or Guardian/s </th>";
		echo "<th id='alldata_h'>Street Address</th>";
		echo "<th id='alldata_h'>Suburb</th>";
		echo "<th id='alldata_h'>Phone No.</th>";
		echo "<th id='alldata_h'>Birthdate</th>";
		echo "<th id='alldata_h'>Grade</th>";
		echo "<th id='alldata_h'>Annual Fee</th>";
		echo "<th id='alldata_h'>Amount Paid</th>";
		echo "<th id='alldata_h'>Has Paid</th>";
		echo "<th id='alldata_h'>Date Paid</th>";
		echo "<th id='alldata_h'>Event Date</th>";
		echo "<th id='alldata_h'>Points</th>";
		echo "</tr>";				
	while ($results = $query->fetch()) {
		echo "<tr>";
		echo "<td id='alldata_d'>".$results['MemberNo']."</td>";
		echo "<td id='alldata_d'>".$results['FirstName']."</td>";
		echo "<td id='alldata_d'>".$results['LastName']."</td>";
		echo "<td id='alldata_d'>".$results['Parent_or_Guardian']."</td>";
		echo "<td id='alldata_d'>".$results['StreetAddress']."</td>";
		echo "<td id='alldata_d'>".$results['Suburb']."</td>";
		echo "<td id='alldata_d'>".$results['PhoneNo']."</td>";
		echo "<td id='alldata_d'>".$results['Birthdate']."</td>";
		echo "<td id='alldata_d'>".$results['Grade']."</td>";
		echo "<td id='alldata_d'>".$results['AnnualFee']."</td>";
		echo "<td id='alldata_d'>".$results['AmountPaid']."</td>";
		echo "<td id='alldata_d'>".$results['HasPaid']."</td>";
		echo "<td id='alldata_d'>".$results['DatePaid']."</td>";
		echo "<td id='alldata_d'>".$results['EventDate']."</td>";
		echo "<td id='alldata_d'>".$results['Points']."</td>";
		echo "</tr>";				
	}		
}
else {
	echo 'No results found for '.$search.'.';
}
?>
</div>

</body>

</html>