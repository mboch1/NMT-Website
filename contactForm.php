<?php
/**
 * User: Michal B
 * Date: 25-Oct-17
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

    <title>NMT Contact Form</title>
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
</head>
<body>
<?php include("template/header.php") ?>
<!-- middle section -->
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <form action="php/sendContactForm.php" method="post">
                <legend>Contact Form: </legend>
                    <h4>*all inputs are required</h4>
                <div class="form-group">
                    <label for="emailUser">Your email:</label>
                    <input class="form-control" id="emailUser" name="emailUser" type="email" required="">
                </div>
                <div class="form-group">
                    <label for="emailHeader">Message title:</label>
                    <input class="form-control" id="emailHeader" name="emailHeader" type="text" required="">
                </div>
                <div class="form-group">
                    <label for="emailMessage">Message:</label>
                    <textarea class="form-control" rows="6" name="msg" id="emailMessage" required=""></textarea>
                </div>
                <button type="submit" name="SendEmail" class="btn btn-default">Send</button>
            </form>
        </div>
        <div class="col-2"></div>
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
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
