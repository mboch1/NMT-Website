<?php
/**
 * User: MB
 * Date: 10/10/2017
 * Time: 13:58
 */
	require_once __DIR__ . '/../../php/db.php';
	session_start(['cookie_lifetime' => 86400]); // Starting Session, cookie set to 1 day

	global $con;

	if(isset($_POST["submit"])){
        if(empty($_POST["login"]) || empty($_POST["password"])){
            $error = "Both fields are required.";
        }
        else if(!empty($_POST["login"]) || !empty($_POST["password"])){
            // Define $username and $password
            $username=$_POST['login'];
            $password2=$_POST['password'];

            // To protect from MySQL injection
            $username = stripslashes($username);
            $password2 = stripslashes($password2);
            $username = mysqli_real_escape_string($con, $username);
            $password2 = mysqli_real_escape_string($con, $password2);

            //Check for active username in database
            $sql="SELECT * FROM Users WHERE email='$username'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            //super admin account for testing purposes
            if($username=="admin@email.com"&&$password2=="1234"){
                $_SESSION['username'] = $username; // Start Session
                $_SESSION['password'] = $password2;
                echo "Welcome Admin, redirecting you to the admin panel";
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
            else{
                echo "An unknown error has occurred while checking credentials, please contact administration.";
                echo "Redirecting...";
                header("refresh:6; url=http://localhost/NMT-website/index.php");
            }
        }
        else{
            echo "Login/Password doesn't exist or unknown error has occured.";
            echo "Redirecting...";
            header("refresh:6; url=http://localhost/NMT-website/index.php");
        }
    } 
?>