<?php
//last rev. 10/10/2017
//this is simple session-ending logout script
	require_once('db.php');
	session_start();
	session_unset();
	header("refresh:0, url=http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] . "/../../index.php ");
	exit();
?>
