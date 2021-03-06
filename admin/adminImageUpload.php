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

    <title>NMT Admin  Image Uploader</title>
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
                echo '              
                <form class="form-horizontal" action=<?php echo uploadImage($con);?> method="post" enctype="multipart/form-data">
                  <legend>Update Course Image</legend>  
                     <div class="form-group filter-option">
                        <input class="form-control filter-option" type="hidden" name="courseID" value="'.$id.'">
                        <!-- File Button --> 
                        <div class="form-group filter-select">
                          <label class="filter-label" for="name">Select Image to Upload</label>
                          <input id="name" name="name" type="file" accept="image/*">
                        </div><br>
                          <!-- Select -->
                        <div class="form-group filter-option">
                            <label class="filter-label" for="courseName">Select Course Title</label>
                            <select id="courseName" name="courseName" class="input-sm filter-select">
                              <?php // Get titles from db
                                $sql = "SELECT * FROM Course";
                                $res = mysqli_query($con, $sql);
                                // Loop through titles
                                while ($row = mysqli_fetch_assoc($res)){
                                // Display title option
                                  $title=$row['title'];
                                  echo '<option value="'.$title.'">'.$title.'</option>';
                                }?>
                            </select>
                            <button type="submit" name="UploadImage" class="btn btn-default">Upload</button>
                        </div>
                      </div>   
                  </form>
                  '};?>
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