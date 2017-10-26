<?php
/**
 * User: MB
 * Date: 10/10/2017
 * Time: 13:58
 */
	require_once 'db.php';
	session_set_cookie_params(86400, "/");
	session_start(); // Starting Session, cookie set to 1 day
	$baseURL = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	global $con;
	if(isset($_POST["Login"])){
        if(empty($_POST["login"]) || empty($_POST["password"])){
            $error = "Both fields are required.";
        }
        else if(!empty($_POST["login"]) || !empty($_POST["password"])){
            // Define $username and $password
            $username=$_POST['login'];
            $password=$_POST['password'];
            // To protect from MySQL injection
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($con, $username);
            $password = mysqli_real_escape_string($con, $password);
            //Check for active username in database
            $sql="SELECT * FROM Users WHERE email='$username'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            //admin account
            if($username==$row['email']&&$password==$row['password']&&$row['isAdmin']==1){
                $_SESSION['username'] = $username; // Start Session
                $_SESSION['password'] = $password;
                $_SESSION['isAdmin'] = 1;
                header("refresh:0; url=http://" . $baseURL . "/../../index.php");
            }
            else{
                echo "Login not recognized.";
                echo "Redirecting...";
                header("refresh:6; url=http://" . $baseURL . "/../../index.php");
            }
        }
        else{
            echo "Login/Password doesn't exist or unknown error has occured.";
            echo "Redirecting...";
            header("refresh:6; url=http://" . $baseURL . "/../../index.php");
        }
    }
?>
