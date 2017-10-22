<?php
//last rev. 10/10/2017
//this is simple session-ending logout script
	require_once __DIR__ . '/../../php/db.php';
	session_start();
	unset($_SESSION['username'], $_SESSION['password']);
	header("refresh:0, url=http://localhost/NMT-Website/admin/adminLogin.php ");
	exit();
?>