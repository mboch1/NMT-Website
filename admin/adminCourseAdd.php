<?php
    ob_start();
	require_once __DIR__ . '/../php/db.php';
  include('php/scripts.php');
	session_start();
  global $con;

  if(isset($_SESSION['username'])=="" || $_SESSION['isAdmin']==0){
      header("Location: adminLogin.php");
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

    <title>NMT Admin Add New Course Editor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="jquery/clamp.js"></script>
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
    <?php include(__DIR__ . "/template/header.php") ?>

    <!-- middle section -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
            <?php
                if(isset($_SESSION['isAdmin'])==1){
                //register new course to db:
                echo '<form action="'.addNewCourse($con).'" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="title">Title:</label>                            
                            <input type="text" class="form-control" id="title" name="title" placeholder="ex.PRINCE2" required>
                          </div>
                          <div class="form-group">
                            <label for="desc">Description:</label>
                            <textarea class="form-control" rows="4" name="description" id="desc"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="venue_id">Select city:</label>
                            <select class="form-control input-sm filter-select" name="venue_id" id="venue_id">';
                              // Get cities from db
                              $sql = "SELECT * FROM Venue";
                              $res = mysqli_query($con, $sql);
                              // Loop through cities
                              while ($row = mysqli_fetch_assoc($res)){
                              // Display city option
                                $id = $row['id'];
                                $city = $row['city'];
                                echo '<option value="' . $id . '">'.$city.'</option>';
                              }
                           echo '</select>
                          </div>
                          <div class="form-group">
                            <label class="filter-label" for="start_date">Start Date:</label>
                            <input data-provide="datepicker" class="datepicker" id="start_date" name="start_date" data-date-format="yyyy-mm-dd" required>
                          </div>
                          <div class="form-group">
                            <label class="filter-label" for="imageFile">Image:</label>
                            <input id="imageFile" name="file" class="input-file" type="file" accept="image/*">
                          </div>
                          <div class="form-group">
                            <label class="filter-label" for="price">Price:</label>
                            <input class="form-control" type="value" name="price" placeholder="100" id="price" required>
                          </div>              
                          <div class="form-group">
                            <label class="filter-label" for="category_id">Select Category Title:</label>
                            <select class="form-control input-sm filter-select" id="category_id" name="category_id">';     
                              // Get titles from db
                              $sql = "SELECT * FROM Category";
                              $res = mysqli_query($con, $sql);
                              // Loop through titles
                              while ($row = mysqli_fetch_assoc($res)){
                              // Display title option
                                $id = $row['id'];
                                $title = $row['title'];
                                echo '<option value="' . $id. '">' . $title. '</option>';
                              }
                            echo '</select>
                          </div>
                          <div class="form-group">
                            <button type="submit" name="addNew" class="btn btn-default">Submit</button>
                          </div>    
                        </form>';
                        }
               ob_end_flush();?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--  end of middle section -->
    <?php include(__DIR__ . "/template/footer.php") ?>
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
          format: 'yyyy-mm-dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
        };
        date_input.datepicker(options);
      })

      $(".card-text").each(function() {
          $clamp(this, {clamp: 3});
      });
    </script>
</body>
</html>