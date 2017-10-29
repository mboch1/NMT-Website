<?php

$uri = $_SERVER['REQUEST_URI'];
$home = "adminIndex.php";

/* link unused, place in courses section
<a class="dropdown-item" href="#">
  <a href="adminImageUpload.php" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"> Change Image</span></a>
</a>
*/

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
                  <li class="nav-item">
                    <a class="nav-link" href="' . $home . '"><span class="glyphicon glyphicon-home"> Home</span></a>
                  </li>
                  <li class="nav-item">';
                      if(isset($_SESSION['username'])!=""){
                      echo"
                         <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"."<span class='glyphicon glyphicon-user'><b>Welcome: ".$_SESSION["username"]."</b></span>"."</a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='#'>
                                  <a class='btn btn-default btn-block' type='submit' class='btn btn-primary' href='php/logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>
                                </a>
                            </div>
                          </li>";
                      }  
                      echo '
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Courses</a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <a href="adminCourseAdd.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-chevron-right"></span> Add Course</a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminAddNewCourseType.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-chevron-right"></span> Add Course Type</a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminCourseEdit.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-chevron-right"></span> Edit Course</a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminCourseDelete.php" class="btn btn-default btn-block"><span class="glyphicon glyphicon-chevron-right"></span> Delete Course</a>
                            </a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book"></span> Bookings</a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <a href="adminBookingsView.php" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-chevron-right"></span> Edit Bookings</a>
                            </a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-inbox"></span> Venues</a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <a href="adminVenueAdd.php" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-chevron-right"></span> Add Venue</a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminVenueEdit.php" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-chevron-right"></span> Edit Venue</a>
                            </a>
                          </div>
                      </li>
                  </ul>
                </div>
              </nav>
          </div>
          <div class="col-2"></div>
      </div>
  </div>
<!-- end of navbar section  -->';
?>
