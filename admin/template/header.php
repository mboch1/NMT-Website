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
            <a href="https://placeholder.com"><img style="width: 100%; object-fit: contain" src="http://via.placeholder.com/800x150"></a><br>
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
                          <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>"."<span class='glyphicon glyphicon-user'>User:".$_SESSION["username"]."</span>"."</a>
                          <div class='dropdown-menu'>
                            <a class='dropdown-item' href='#'>
                              <form action='php/logout.php' method='post'>
                              <label for='logoutBtn'>End Session </label>
                                  <button id='logoutBtn' type='submit' class='btn btn-default' name='logout'>Logout</button>
                              </form></a>
                          </div>
                        </li>";
                      }  
                      echo '
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"> Courses</span></a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <a href="adminCourseAdd.php" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"> Add Course</span></a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminCourseEdit.php" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"> Edit Course</span></a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminCourseDelete.php" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"> Delete Course</span></a>
                            </a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book"> Bookings</span></a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <a href="adminBookingsView.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-right"> Edit Bookings</span></a>
                            </a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-inbox"> Venues</span></a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                              <a href="adminVenueAdd.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-right"> Add Venue</span></a>
                            </a>
                            <a class="dropdown-item" href="#">
                              <a href="adminVenueEdit.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-right"> Edit Venue</span></a>
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
