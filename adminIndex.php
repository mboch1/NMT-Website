<?php
	require_once('php/db.php');
	session_start();

    if(isset($_SESSION['username'])!="admin@email.com")
    {
        header("Location: index.php");
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
                        }?>
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
                Registered Courses
<?php
$result = mysqli_query($con,"SELECT * FROM courses");
echo"<table border='1' cellpadding='10'>";
                   echo"<tr><th>Course ID</th>";
                       echo "<th>Course Title</th>";
                       echo" <th>Course Description</th>";
                       echo" <th>Course Price</th></tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['course_id'] . "</td>";
    echo "<td>" . $row['course_title'] . "</td>";
    echo "<td>" . $row['course_description'] . "</td>";
    echo "<td>" . $row['course_price'] . "</td>";
    echo '<th><a style="color:red;" href="course_delete.php?course_id=' . $row['course_id'] . '">Remove Course</a></th>';
    echo "</tr>";
}





                        echo "</table>";


?>




                Register New Course <br><br>
                <form action="" method="post" >
                    <div class="form-group">
                        <label for="inputID">Course ID:</label>
                        <input type="number" class="form-control" name="ID" id="inputID" placeholder="1000" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Course Title:</label>
                        <input type="name" class="form-control" name="title" id="inputTitle" placeholder="Prince 2 Essentials" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Course Description:</label>
                        <input type="name" class="form-control" name="description" id="inputDescription" placeholder="A course teaching the principles of Prince 2 " required>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice">Course Price:</label>
                        <input type="name" class="form-control" name="price" id="inputPrice" placeholder="49" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
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
<?php
if (isset($_POST['submit']))
{
    $ID = ($_POST['ID']);
    $title = ($_POST['title']);
    $description = ($_POST['description']);
    $price = ($_POST['price']);

    mysqli_query($con,"INSERT courses SET course_id='$ID', course_title='$title', course_description='$description', course_price='$price'");

}






?>