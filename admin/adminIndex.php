<?php
    ob_start();
	require_once('php/db.php');
    include('php/scripts.php');
	session_start();
    global $con;
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

    <title>NMT Admin Page</title>
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
            <div class="col-2"></div>
            <div class="col">
                <a href="https://placeholder.com"><img style='height: 100%; width: 100%; object-fit: contain' src="http://via.placeholder.com/800x150"></a><br>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!-- navbar -->
    <div class="row">
        <div class="col-2"></div>
        <div class="col" >
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#"> Menu </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                        <a class="nav-link" href="#">Main Page <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <?php 
                        if(isset($_SESSION['username'])!=""){
                        echo"                     
                         <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"."<span class='glyphicon glyphicon-user'><b>Welcome: ".$_SESSION["username"]."</b></span>"."</a>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='#'>
                                <form action='php/logout.php' method='post'>
                                <label for='logoutBtn'>Safe logout</label>
                                    <button id='logoutBtn' type='submit' class='btn btn-primary' name='logout'>Logout</button>  
                                </form></a>
                            </div>
                          </li>";
                        }
                        else{
                        echo"
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Login</a>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='#'>
                                <form action='php/adminLogin.php' method='post'>
                                  <div class='form-group'>
                                    <label for='inputEmail'>Email address</label>
                                    <input type='email' class='form-control' name='login' id='inputEmail' aria-describedby='emailHelp' placeholder='Enter email'>
                                  </div>
                                  <div class='form-group'>
                                    <label for='inputPassword'>Password</label>
                                    <input name='password' type='password' class='form-control' id='inputPassword' placeholder='Password'>
                                  </div>
                                  <button type='submit' class='btn btn-primary' name='submit'>Login</button>
                                </form></a>
                            </div>
                        </li>";
                        }
                    ?>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
        <div class="col-2"></div>
    </div>
    <!-- end of navbar section  -->

    <!-- middle section -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
            <?php 
                if(isset($_SESSION['username'])!=""){
                //load courses from db:
                getCourses($con);
                //register new course to db:
                echo" <h3>Register New Course:</h3><br>
                <form action='".addNewCourse($con)."' method='post'> 
                    <div class='form-group'>
                        <label for='category'>Category(numeric identifier):</label>
                        <input type='value' class='form-control' name='category' id='category' placeholder='1234567890' required>
                    </div>
                    <div class='form-group'>
                        <label for='venue'>Venue unique id:</label>
                        <input type='value' class='form-control' name='venue' id='venue' placeholder='1234567890' required>
                    </div>
                    <div class='form-group'>
                        <label for='title'>Title:</label>
                        <input type='text' class='form-control' name='title' id='title' placeholder='Course name' required>
                    </div>
                    <div class='form-group'>
                        <label for='description'>Description:</label>
                        <input type='text' class='form-control' name='description' id='description' placeholder='Course long description' required>
                    </div>
                    <div class='form-group'>
                        <label for='price'>Price(value only):</label>
                        <input type='value' class='form-control' name='price' id='price' placeholder='9999' required>
                    </div>
                  <button type='submit' name='addCourse' class='btn btn-default'>Add Course</button>
                </form> 
               ";
            }
               ob_end_flush();?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--  end of middle section -->
    <!--  footer section -->
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <footer>
                    <center>copyright none</center>
                </footer>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--  end of footer section -->
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