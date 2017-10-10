<?php
	require_once('php/db.php');
	session_start();

	if(isset($_SESSION['username'])!="")
	{
		header("Location: main.php");
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
    <div>
        banner side <br>
    </div>
    <!-- top section  -->
    <div>
        <form action="php/login.php" method="post">
            <fieldset>
                <legend>Login Details:</legend>
                Your registered email:<br>
                <input type="email" name="login"><br>
                Password:<br>
                <input type="password" name="password"><br>
                <input type="submit" value="Submit"><br>
            </fieldset>
        </form>
    </div>
    <!-- middle section -->
    <div></div>
   <!--  //bottom section -->
    <div></div>
</body>

<footer>
    copyright none
</footer>
<script> 

</script>
</html> 