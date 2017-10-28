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

        //email both user and admin about booking was made:
        //user:
        $sql = "SELECT Booking.user_id, Booking.course_id, Booking.date_booked, user.email FROM Booking INNER JOIN Users user ON Booking.user_id = user.id WHERE (Booking.course_id='$course_id' AND Booking.user_id='$user_id')";

        $result = mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_array($result)) {

            $userEmail = $row['email'];
            date_default_timezone_set('Europe/London');
            $dateDB = $row['date_booked'];
             
            $dateBooked = date('j F Y', strtotime($dateDB));
            $headers = "From: admin@email.com";

            $msg = "Booking was made by the user: ".$userEmail." on ".$dateBooked.".";
            $msg = wordwrap($msg,70);

            mail($userEmail,"You've booked a course",$msg,$headers);
            
            //admin:
            $adminEmail = "michalbochenek2@gmail.com";
            $headers = "From: michalbochenek2@gmail.com";

            $msg = "Booking was made by the user: ".$userEmail." on ".$dateBooked.".";
            $msg = wordwrap($msg,70);

            mail($adminEmail,"User booked a course",$msg,$headers);
        }

    } else {
        $errMsg = "Overbooked";
        $error = true;
    }

    if ($error) {
        echo $errMsg;
    }else {
        echo "Success";
    }
