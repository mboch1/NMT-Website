<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 28-Oct-17
 * Time: 10:16 PM
 */
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

    <title>Forum</title>
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
<?php include("template/header.php");
//<!-- middle section -->
echo '<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">';
            $q = "SELECT * FROM Forum" ;
            $r = mysqli_query( $con, $q ) ;
            if ( mysqli_num_rows( $r ) > 0 ) {
                echo '<table>' ;
                while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
                {
                    $date = date('d-m-Y', strtotime($row['post_date']));
                    echo '<tr><td><b>By</b> '. $row['poster'] . ' <b>on</b> '. $date.'</td></tr>
                <tr><td>' . $row['message'] . '</td> </tr>';
                }
                echo '</table>' ;
            }

            if (isset($_SESSION['username']) != "") {
              echo '<form method="post" action ="php/post.php">
                        <div class="form-group">
                         <label for="messageInput">Message:</label>
                         <input type="text" class="form-control" name="message" id="message" placeholder="Hello World!" required>
                         </div>
                         <button type="submit" name="register"  class="btn btn-primary">Post</button>
            		</form>';

            }
            else{
                echo'Please login to post message';
            }
echo '      </div>
        <div class="col-2"></div>
    </div>
</div>';

?>
<!--  end of midle section -->
<?php include("template/footer.php") ?>
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
