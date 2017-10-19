<?php
	require_once('php/db.php');
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

    <title>NMT Project Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

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
				<form method="post" action="php/setRegister.php">
                    <div class="form-group">
                        <label for="inputEmail">Email Address:</label>
                        <input type="email" class="form-control" name="login" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Password:</label>
                        <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="nameInput">Forename:</label>
                        <input type="name" class="form-control" name="name" id="nameInput" placeholder="John" required>
                    </div>
                    <div class="form-group">
                        <label for="surnameInput">Surname:</label>
                        <input type="name" class="form-control" name="surname" id="surnameInput" placeholder="Smith" required>
                    </div>
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
                    <div class="form-group">
                        <label for="phoneInput">Phone Number:</label>
                        <input type="text" class="form-control" name="phone" id="phoneInput" placeholder="01315551234" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Submit</button>
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
</body>
</html>
