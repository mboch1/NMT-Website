<?php
    ob_start();
	require_once __DIR__ . '/../php/db.php';
  include('php/scripts.php');
	session_start();
    global $con;

    if(isset($_SESSION['username'])=="" || $_SESSION['isAdmin']==0){
        header("Location: adminLogin.php");
    }
    //load data to be placed in form:
    if(isset($_POST['Selected'])){
      $sid = $_POST['courseList'];
      $result = mysqli_query($con,"SELECT * FROM Course WHERE id = $sid");
      $row = mysqli_fetch_array($result);
      $courseID = $row['id'];
      $courseTitle = $row['title'];
      $coursedDesc = $row['description'];
      $courseVenue = $row['venue_id'];
      $courseStart = $row['start_date'];
      $coursePrice = $row['price'];
      $courseCategoryID = $row['category_id'];
      $courseImageName = $row['imageName'];
      $isActive = $row['isActive'];
    }

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

    <title>NMT Admin Course Editor</title>
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
                echo'
                <form class="form-horizontal" action="'.updateCourse($con).'" method="post">
                    <fieldset>
                    <!-- Form Name -->
                    <legend>Course Editor</legend>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="control-label" for="courseTitle">Course Title:</label>
                      <input id="courseTitle" value="'.$courseTitle.'" name="courseTitle" class="form-control input-md" required="" type="text">
                      <span class="help-block">Name your course here. Use unique name for better recognition.</span>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                      <input id="courseImageName" value="'.$courseImageName.'" name="courseImageName" class="form-control input-md" type="hidden">
                    </div>
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class="control-label" for="courseDesc">Course Description</label>
                      <textarea class="form-control" id="courseDesc" name="courseDesc">'.$coursedDesc.'</textarea>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="control-label" for="coursePrice">Course Price</label>
                      <input id="coursePrice" value="'.$coursePrice.'" name="coursePrice" class="form-control input-md" required="" type="value">
                      <span class="help-block">Use number only</span>
                    </div>
                    <!-- Date input-->
                    <div class="form-group">
                        <label class="control-label" for="startDate">Start Date:</label>
                        <input data-provide="datepicker" value="'.$courseStart.'" class="form-control input-md datepicker" id="startDate" name="startDate" data-date-format="yyyy-mm-dd" required>
                    </div>

                    <!-- Select -->
                    <div class="form-group">
                      <label class="control-label" for="selectCategory">Select Course Category</label>
                        <select id="selectCategory" name="selectCategory" class="form-control input-sm filter-select">';}?>
                        <?php // Get titles from db
                          $sql = "SELECT * FROM Category";
                          $res = mysqli_query($con, $sql);
                          // Loop through titles
                          while ($row = mysqli_fetch_assoc($res)){
                          // Display title option
                            $id=$row['id'];
                            $title=$row['title'];
                            echo '<option value="'.$id.'">'.$title.'</option>';}?>
                      <?php echo '</select>
                    </div>';?>
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="control-label" for="venueSelect">Select Venue</label>
                        <select id="venueSelect" name="venueSelect" class="form-control input-sm filter-select">
                        <?php // Get cities from db
                          $sql = "SELECT * FROM Venue";
                          $res = mysqli_query($con, $sql);
                          // Loop through cities
                          while ($row = mysqli_fetch_assoc($res)){
                          // Display city option
                            $id = $row['id'];
                            $city = $row['city'];
                            echo '<option value="'.$id.'">'.$city.'</option>';
                          }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input <?php echo 'value="'.$courseID.'"';?> name="courseID" type="hidden">
                        <button type="submit" name="Update" class="btn btn-default">Update</button>
                    </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--  end of middle section -->
    <?php include(__DIR__ . "/template/footer.php");
    ob_end_flush();?>
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
