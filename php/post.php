<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 28-Oct-17
 * Time: 11:34 PM
 */
require_once('db.php');
session_start();

$date = date("Ymd");
$poster = $_SESSION['username'];
$message = $_POST['message'];

$createPost = "INSERT INTO Forum (poster, post_date, message) VALUES('$poster', '$date', '$message')";

mysqli_query($con, $createPost);

header("refresh:0, url=../forum.php");