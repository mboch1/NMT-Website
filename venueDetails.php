<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 27-Oct-17
 * Time: 7:42 PM
 */
require_once('php/db.php');
session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>NMT Venue Details</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="jquery/clamp.js"></script>
    <script src="jquery/moment.min.js"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include("template/header.php") ?>
<div class="container" >
    <div class="row">

        <div class="col">
            <br>
            <br>
            <h1>Venues</h1>
            <h3>Edinburgh</h3>
            <div class="row">
            <div class="col-sm-5">
                <img src="https://assets.regus.com/images/426/officespace/1_454x340.jpg" alt="Edinburgh Venue">
            </div>
            <div class="col-sm-2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5315.514246817173!2d-3.310824182661898!3d55.93379855753038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa28c53373f5e4c18!2sRegus+-+Edinburgh+Lochside+Place!5e0!3m2!1sen!2suk!4v1509130760488" width="400" height="340" frameborder="0" style="border:0" ></iframe>
            </div>
            </div>

            <h3>Glasgow</h3>
            <div class="row">
            <div class="col-sm-5">
                <img src="https://assets.regus.com/images/686/officespace/1_454x340.jpg" alt="Glasgow Venue">
            </div>
            <div class="col-sm-2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17912.33308045158!2d-4.2645032071450295!3d55.861943232847864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfac22076c65298a!2sRegus+-+Glasgow+West+George+Street!5e0!3m2!1sen!2suk!4v1509132027646" width="400" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            </div>

            <h3>Aberdeen</h3>
            <div class="row">
            <div class="col-sm-5">
                <img src="https://assets.regus.com/images/486/officespace/1_454x340.jpg" alt="Aberdeen Venue">
            </div>
            <div class="col-sm-2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17304.46593988539!2d-2.106905966706041!3d57.14948675421303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48840e3d6dddef8d%3A0xf16f50ee5fec2856!2sRegus+-+Aberdeen+Berry+Street!5e0!3m2!1sen!2suk!4v1509132136506" width="400" height="340" frameborder="0" style="border:0" allowfullscreen>            </div>
            </div>

        </div>

        </div>
    </div>




<!--  end of middle section -->
<?php include("template/footer.php") ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>
</html>
