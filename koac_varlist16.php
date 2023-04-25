<?php

if (isset($_POST["firstname"])){ 
	$firstname = $_POST["firstname"]; 
}

if (empty($_POST["firstname"])){
	echo "You have not entered your first name. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["lastname"])){
	$lastname = $_POST["lastname"];
}

if (empty($_POST["lastname"])){
	echo "You have not entered your last name. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["parents"])){
	$parents = $_POST["parents"];
}

if (empty($_POST["parents"])){
	echo "You have not entered your first name. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["street"])){
	$street = $_POST["street"];
}

if (empty($_POST["street"])){
	echo "You have not entered your street address. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["suburb"])){
	$suburb = $_POST["suburb"];
}

if (empty($_POST["suburb"])){
	echo "You have not entered your suburb. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["phone"])){
	$phone = $_POST["phone"];
}

if (empty($_POST["phone"])){
	echo "You have not entered your phone number, so '---' will be the temporary value for the meantime. <br>";
	$phone = '---';
}

//--------------------------------------------------------

if (isset($_POST["birth"])){
	$birth = $_POST["birth"];
}

if (empty($_POST["birth"])){
	echo "You have not entered your birthday. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["gr"])){
	$gr = $_POST["gr"];
}

if (empty($_POST["gr"])){
	echo "You have not entered your Grade. This is required and can't be null. <br>";
}

//--------------------------------------------------------

if (isset($_POST["memberb4"])){
	$memberb4 = $_POST["memberb4"];
}

if (empty($_POST["memberb4"])){
	$memberb4 = 'FALSE';
}

//--------------------------------------------------------

if (isset($_POST["nzres"])){
	$nzres = $_POST["nzres"];
}

if (empty($_POST["nzres"])){
	$nzres = 'FALSE';
}

//--------------------------------------------------------

if (isset($_POST["schl_wrk"])){
	$schl_wrk = $_POST["schl_wrk"];
}

if (empty($_POST["schl_wrk"])){
	echo "You have not entered your school or workplace, so '---' will be the value for your school/workplace. <br>";
	$schl_wrk = '---';
}

?>