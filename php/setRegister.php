<?php
//created on 11/05/2016 last rev. 12/05/2016
//This script places senior player data record into database
	require_once ('db.php');
	session_start();

	$login = $_POST['login'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$phone = $_POST['phone'];
	
	//check if the record already exists!
	$result = mysqli_query($con,"SELECT * FROM Users WHERE email='$login' LIMIT 1");

    if(mysqli_fetch_array($result) == 0)
	{
		$createAccount = "INSERT INTO Users (email, password, firstname, surname, teleno) 
		VALUES ('$login', '$password', '$name', '$surname', '$phone')";
	
		$insertData = mysqli_query($con, $createAccount);
	
		if($insertData=1)
		{
			print "Record was created!<br>";
			print "Redirecting...<br>";
			header("refresh:3, url=http://localhost/NMT-Website/index.php ");
		}
		else
		{
			print "An error has occured!<br>";
			print "Redirecting...<br>";
			header("refresh:3, url=http://localhost/NMT-Website/index.php ");
		}
	}
	else
	{
		print "Record for this member already exists, please use different email instead!<br>";
		print "Redirecting...<br>";
		header("refresh:3, url=http://localhost/NMT-Website/index.php ");
	}
?>