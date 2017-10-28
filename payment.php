<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 27-Oct-17
 * Time: 10:45 PM
 */
require_once ('php/db.php');
session_start();

$course_id = $_GET['course_id'];




?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="jquery/clamp.js"></script>
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
<!-- middle section -->
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <form method="post">
                <h4>Card Details</h4>
                <div class="form-group">
                    <label for="nameInput">Forename:</label>
                    <input type="name" class="form-control" name="name" id="nameInput" placeholder="John" required>
                </div>
                <div class="form-group">
                    <label for="surnameInput">Surname:</label>
                    <input type="name" class="form-control" name="surname" id="surnameInput" placeholder="Smith" required>
                </div>
                <div class="form-group">
                    <label for="nameInput">Card Number:</label>
                    <input type="name" class="form-control" name="name" id="nameInput" placeholder="1111222233334444" required>
                </div>
                <div class="form-group">
                    <label for="surnameInput">Security Code:</label>
                    <input type="name" class="form-control" name="surname" id="surnameInput" placeholder="321" required>
                </div>
                <div class="form-group">
                    <label class="filter-label" for="start_date">Experation Date:</label>
                    <input data-provide="datepicker" class="datepicker" id="start_date" name="start_date" data-date-format="yyyy-mm" required>
                </div>
                <h4>Billing Address</h4>
                <div class="form-group">
                    <label for="addInput">Address:</label>
                    <input type="name" class="form-control" name="add1" id="addInput" placeholder="Address line 1" required>
                </div>
                <div class="form-group">
                    <input type="name" class="form-control" name="add2" id="add2Input" placeholder="Address line 2">
                </div>
                <div class="form-group">
                    <label for="cityInput">City:</label>
                    <input type="name" class="form-control" name="city" id="cityInput" placeholder="Edinburgh" required>
                </div>
                <div class="form-group">
                    <label for="postcodeInput">Postcode:</label>
                    <input type="name" class="form-control" name="postcode" id="postcodeInput" placeholder="EH1 1BC" required>
                </div>
                <button type="submit" name="register" class="btn btn-primary">Submit</button>
            </form>
            OR
            <br>
            <br>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="nmtcoursepayments@outlook.co.uk">
                <input type="hidden" name="lc" value="GB">
                <input type="hidden" name="item_name" value="NMT Course Payment">
                <input type="hidden" name="amount" value="0.01">
                <input type="hidden" name="currency_code" value="GBP">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!--  end of midle section -->
<?php include("template/footer.php") ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy-mm',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })

    $(".card-text").each(function() {
        $clamp(this, {clamp: 3});
    });
</script>
</body>
</html>