<?php
/**
 * User: MB
 * Date: 10/10/2017
 * Time: 13:58
 */
	require_once('db.php');
	session_set_cookie_params(86400);
	session_start(); // Starting Session, cookie set to 1 day

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
            
            if(is_array($row)){
                //temp solution, no password hashing yet:
                if($row["email"]==$username && $row["password"]==$password2){
                    $_SESSION['username'] = $username; // Start Session
                    $_SESSION['password'] = $password2;
                    $_SESSION['user_id'] = $row["id"];
                    header("refresh:1, url=http://localhost/NMT-Website/index.php");
                }

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
