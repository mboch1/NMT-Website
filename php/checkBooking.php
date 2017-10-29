<?php

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
    if ($row["bookings"] >= 15) {
        $errMsg = "Overbooked";
        $error = true;
    }

    if ($error) {
        echo $errMsg;
    }else {
        echo "Success";
    }

?>
