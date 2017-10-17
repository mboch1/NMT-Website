<?php
    ob_start();
	require_once __DIR__ . '/../php/db.php';
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
    <?php include(__DIR__ . "/../template/header.php") ?>

    <!-- middle section -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
            <?php
                if(isset($_SESSION['username'])!=""){
                //register new course to db:
                echo '<form class="form-horizontal" action="'.addNewCourse($con).'" method="post">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Title:</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="title" name="title" placeholder="PRINCE2" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="desc">Description:</label>
                            <div class="col-sm-6">
                              <textarea class="form-control" rows="4" name="description" id="desc"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label cols-sm-2" for="city">Select city:</label>
                            <select class="form-control cols-sm-6" name="city" id="city">';
                              // Get cities from db
                              $sql = "SELECT * FROM Venue";
                              $res = mysqli_query($con, $sql);
                              // Loop through cities
                              while ($row = mysqli_fetch_assoc($res)){
                              // Display city option
                                echo '<option value="' . $row["city"] . '">' . $row["city"] . '</option>';
                              }
                           echo '</select>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="start_date">Start Date:</label>
                            <div class="col-sm-6">
                              <input class="datepicker" name="date" data-date-format="mm/dd/yyyy" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="image">Image:</label>
                            <div class="col-sm-6">
                              <input type="text" name="image" placeholder="image_name" id="image" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="price">Price:</label>
                            <div class="col-sm-6">
                              <input type="value" name="price" placeholder="100" id="price" required>
                            </div>
                          </div>              
                          <div class="form-group">
                            <label class="control-label cols-sm-2" for="titles">Select Category Title:</label>
                            <select class="form-control cols-sm-6" id="titles" name="titles">';                 
                              // Get titles from db
                              $sql = "SELECT * FROM Category";
                              $res = mysqli_query($con, $sql);
                              // Loop through titles
                              while ($row = mysqli_fetch_assoc($res)){
                              // Display title option
                                echo '<option value="' . $row["title"] . '">' . $row["title"] . '</option>';
                              }
                            echo '</select>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                              <button type="submit" name="addNew" class="btn btn-default">Submit</button>
                            </div>
                          </div>    
                        </form>';
                        }
               ob_end_flush();?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--  end of middle section -->
    <?php include(__DIR__ . "/../template/footer.php") ?>
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

    $(".card-text").each(function() {
        $clamp(this, {clamp: 3});
    });

</script>
</body>
</html>