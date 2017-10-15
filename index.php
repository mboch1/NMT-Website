<?php
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

    <title>NMT Project Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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
    <!-- banner space -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <a href="https://placeholder.com"><img style='width: 100%; object-fit: contain' src="http://via.placeholder.com/800x150"></a><br>
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
                        <a class="nav-link" href="index.php">Main Page <span class="sr-only">(current)</span></a>
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
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Register/Login</a>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='#'>
                                <form action='php/login.php' method='post'>
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
                              <a class='dropdown-item' href='#'>
                                <form action='register.php' method='post'>
                                  <div class='form-group'>
                                    <label for='submit'>Go to registration page.</label><br>
                                    <button id='submit' type='submit' class='btn btn-primary' name='register'>Register</button>
                                  </div>
                                </form></a>
                            </div>
                        </li>";
                        }
                    ?>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
        <div class="col-2"></div>
    </div>
    <!-- end of navbar section  -->
    <!-- carousel section -->
    <div class="container" style="height: 200px;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" style='height: 100%; width: 100%; object-fit: contain' src="http://via.placeholder.com/800x150" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style='height: 100%; width: 100%; object-fit: contain' src="http://via.placeholder.com/800x150" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style='height: 100%; width: 100%; object-fit: contain' src="http://via.placeholder.com/800x150" alt="First slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!-- end of carousel section  -->
    <!-- middle section -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <div class="row">
                    <form class="form-inline" action="#" method="post">
                        <legend>Selection Filtering: </legend>
                        <div class="form-group">
                            <label for="city">Choose Location: </label>
                            <select name="city" id="city" class="form-control input-sm">
								<?php

									// Get venues from db
									$sql = "SELECT * FROM courses_venue";
									$res = mysqli_query($con, $sql);

									// Loop through venues
									while ($row = mysqli_fetch_assoc($res)) {

										// Display venue
										echo '<option value="' . $row["venue_name"] . '">' . $row["venue_name"] . '</option>';

									}

								 ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Choose Course: </label>
                            <select name="course" id="course" class="form-control input-sm">
                              <option value="PRINCE2">PRINCE2</option>
                              <option value="Magic Tricks">Magic Tricks</option>
                              <option value="Sleeping">Sleeping</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="date">Date</label>
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                        </div>
                        <button type="submit" name="filter" class="btn btn-default">Filter Results</button>
                    </form>
                </div>
                <div class="row">
					<?php

						// Fetch courses from database
						$sql = "SELECT * FROM courses";
						$res = mysqli_query($con, $sql);

						// Display courses
						while ($row = mysqli_fetch_assoc($res)) {

							// If course doesn't have an image, give it a placeholder
							if ($row["product_image"] == "") {
								$row["product_image"] = "http://placehold.it/700xx400";
							}

							// Display course
							echo '<div class="col-lg-4 col-md-6 mb-4">
			                    <div class="card card-custom">
			                        <a href="#"><img class="card-img-top" src="' . $row["product_image"] . '" alt=""></a>
			                        <div class="card-body">
			                          <h4 class="card-title">
			                            <a href="#">' . $row["course_title"] . '</a>
			                          </h4>
			                          <h5>£' . $row["course_price"] . '</h5>
			                          <p class="card-text">' . $row["course_description"] . '</p>
			                        </div>
			                        <div class="card-footer">
			                          <small class="text-muted">★ ★ ★ ★ ☆</small>
			                        </div>
			                    </div>
			                  </div>';
						}

					?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--  end of midle section -->
    <!--  footer section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <footer>
                    <center>copyright none 2017</center>
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
    <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    </script>
</body>
</html>
