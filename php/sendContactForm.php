<?php
/**
 * User: Michal B
 * Date: 25-Oct-17
 */
    require_once ('db.php');
    session_start();

   if(isset($_POST['SendEmail'])){

    $email = $_POST['emailUser'];
    $email = "From: ".$email;
    $title = $_POST['emailHeader'];
    $message = $_POST['msg'];
    //for windows fix:
    $message = wordwrap($message,70);
    $message = str_replace("\n.", "\n..", $message);

    $adminEmail = "40270585@live.napier.ac.uk";

    mail($adminEmail,$title,$message,$email);
    header("refresh:0, url=http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] . "/../../contactForm.php ");
    // echo 'message was sent!';
   }
?>
