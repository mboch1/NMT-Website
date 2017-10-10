<?php
	require_once('php/db.php');
	session_start();

	if(isset($_SESSION['username'])!="")
	{
		header("Location: home.php");
	}
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

    <title>NMT Project Login Page</title>
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
    <!-- banner space -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">banner space</div>
        </div>
    </div>
    <!-- top section  -->
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="php/login.php" method="post">
                    <fieldset>
                        <h2 class="form-signin-heading" >Login Form</h2>
                        <h3 class="form-signin-heading" >Please enter required details</h3>
                        <label for="emailInput" class="sr-only">Your registered email:</label>
                        <input id="emailInput" type="email" name="login" class="form-control" placeholder="Username" autofocus required><br>
                        <label for="passInput" class="sr-only">Your password:</label>
                        <input id="passInput" type="password" name="password" class="form-control" required><br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <!-- middle section -->
        </div>
        <div class="row">
            <!--  //bottom section -->
        </div>
    </div>
</body>

<footer>
    copyright none
</footer>
<script> 

</script>
</html> 