<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 20-Oct-17
 * Time: 4:57 PM
 */
    require_once ('db.php');
    session_start();

    $course_id = $_GET['course_id'];
    $date_booked = date("Ymd");
    $user_id = $_SESSION['user_id'];


    $createBooking = "INSERT INTO Booking (course_id, date_booked, user_id) 
		VALUES ('$course_id', '$date_booked', '$user_id')";

    $insertData = mysqli_query($con, $createBooking);


    print "Course booking accepted!<br>";
    print "Redirecting...<br>";
    header("refresh:3, url=http://localhost/NMT-Website/index.php ");



