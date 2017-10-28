<?php

$uri = $_SERVER['REQUEST_URI'];
$home = "index.php";

echo '
<!-- banner space -->
<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <p style="text-align: center; background-color: yellow;">2017, This website was created for the Project Management course assignment purpose only, it is not an actual business offer.</p>
            <img style="margin-left: 15px; object-fit: contain" src="https://i.imgur.com/0ejY8kU.png"><br>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!-- navbar -->
<div class="container-fluid">
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
                    <a class="nav-link" href="' . $home . '"><span class="glyphicon glyphicon-home"> Home</span></a>
                  </li>
                  <li class="nav-item">';
                        if(isset($_SESSION['username'])!=""){
                        echo"
                         <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"."<span class='glyphicon glyphicon-user'><b>Welcome: ".$_SESSION["username"]."</b></span>"."</a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='#'>
                                <form action='php/logout.php' method='post'>
                                  <a class='btn btn-primary' type='submit' class='btn btn-primary' href='#'><span class='glyphicon glyphicon-log-out'></span> Logout</a>
                                </form>
                                </a>";
                        if ($_SESSION["isAdmin"]){
                          echo '<a class="dropdown-item" href="#">
                                  <a class="btn btn-primary" href="admin/adminIndex.php"><span class="glyphicon glyphicon-pencil"></span> Admin Area</a>
                                </a>';
                        }
                        echo "
                          </div>
                        </li>";
                        }else{
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
                        echo '
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="courseDetails.php"><span class="glyphicon glyphicon-book"></span> Course Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contactForm.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="venueDetails.php"><span class="glyphicon glyphicon-globe"></span> Venues</a>
                  </li>
                  ';
echo '
                </ul>
              </div>
            </nav>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!-- end of navbar section  -->';
?>
