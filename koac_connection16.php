<?php
$user="root";
$password="";
$dbname="kiwi_ormiston"; 
$servername="localhost";

$conn = mysqli_connect($servername,$user,$password,$dbname);
if($conn){
	echo "";
	}
	else{ 
		die("RIP".mysqli_connect_error);
	}

?>