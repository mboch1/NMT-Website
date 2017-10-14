<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 14-Oct-17
 * Time: 5:03 PM
 */
require_once('php/db.php');
session_start();

if (isset($_GET['course_id']) && is_numeric($_GET['course_id']))
{
    $courseID=$_GET['course_id'];

    mysqli_query($con, "DELETE FROM courses where course_id=$courseID");

    header("Location: adminIndex.php");
}