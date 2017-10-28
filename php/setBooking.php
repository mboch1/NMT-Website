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
    $error = false;
    $errMsg = "";

    $sql = "SELECT * FROM Course WHERE id='$course_id'";
    $res = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($res);
    if ($row["bookings"] < 15) {
        $createBooking = "INSERT INTO Booking (course_id, date_booked, user_id)
    		VALUES ('$course_id', '$date_booked', '$user_id')";

        $insertData = mysqli_query($con, $createBooking);

        $temp = mysqli_error($con);
        if ($temp) {$error = true;$errMsg += $temp;}

        $sql = "UPDATE Course SET bookings=bookings+1 WHERE id='$course_id'";
        $updateData = mysqli_query($con, $sql);

        $temp = mysqli_error($con);
        if ($temp) {$error = true;$errMsg += $temp;}
    } else {
        $errMsg = "Overbooked";
        $error = true;
    }

    if ($error) {
        echo $errMsg;
    }else {
        echo "Success";
    }
