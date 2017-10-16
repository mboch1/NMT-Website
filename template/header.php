<?php

$uri = $_SERVER['REQUEST_URI'];
$home = "";

if (strpos($uri, "/admin/") !== false) {
    $home = "../index.php";
} else {
    $home = "index.php";
}

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
                   <li class="nav-item active">
                        <a class="nav-link" href="' . $home . '">Main Page <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">';
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
                        echo '
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
</div>
<!-- end of navbar section  -->';
?>
