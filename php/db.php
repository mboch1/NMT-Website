<?php
//created on 23/04/2016 last rev. 23/04/2016
//This script creates a connection to the database, usable over all other scripts
	$servername = "nmt-group-3.ckjabz0gkhe4.us-west-2.rds.amazonaws.com";
	$username = "nmtUser";
	$password = "cJ6*aK4*";
	$dbName = "NMT";

	// Connect to DB $con is going to be used as a global variable!
	$con = mysqli_connect($servername, $username, $password, $dbName);

	if(mysqli_connect_errno()){
		echo "Connection to DB error: " . mysqli_connect_errno();
	}
?>
