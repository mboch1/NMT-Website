<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 22-Oct-17
 * Time: 7:06 PM
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

    <title>NMT Project Login Page</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="jquery/clamp.js"></script>
    <script src="jquery/moment.min.js"></script>
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
<?php include("template/header.php") ?>
<!-- carousel section -->
<div class="container" >
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            Change Management:<br>
            The Change Management course offers a structured method for ensuring changes are implemented efficiently and with ease. This course is aimed at project and team managers, however the lessons taught can be of value to anyone working in a team environment. The Change Management course teaches activities such as efficient expression of ideas, planning and assessing stakeholders and continues through the entire lifecycle of applying large changes to a project or team.
            <br>
            <br>
            ITIL:<br>
            The ITIL course is a brief overview of the five core volumes of the texts associated with the management methodology. Originally named as an acronym for Information Technology Infrastructure Library, the ITIL course is aimed not only at IT professionals, but also businesses and team members that want to better understand the IT services in their workplace. The course does not cover all aspects of the ITIL principles, however resources and links will be available for additional reading.
            <br>
            <br>
            PRINCE2:<br>
            The PRINCE2 course is an introductory look at project-management techniques implemented by the process-based methodology. An acronym for PRojects IN Controlled Environments, PRINCE2 is a standard of the UK Government and used internationally, in the private sector, to a lesser extent. Please note that this course is only an introduction to the PRINCE2 methodology, and does not come with any formal qualification level, however this course is an excellent initiation to this form of project management.
            <br>
            <br>
            Project Management:<br>
            The Project Management course is a high level, introductory class that briefly touches on various methods of project management. Many of the methods taught in this course are available as the subject of teaching in other courses offered by Napier Management Training. If you, or your team are looking for an introductory look at various management styles and techniques for improving the workplace, then this is the appropriate course.
            <br>
            <br>
            Risk Management:<br>
            The Risk Management course offers skills and techniques for assessing the risks that may affect a project. Whether your team is about to start a project, or is already conducting one, this course can offer valuable information and improve the quality of the delivered product. Remember that the Risk Management course is not designed exclusively for groups already facing risks, but also aids the identification of potential risks and issues before they can occur, aiding their quick resolution.
            <br>
            <br>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!-- end of carousel section  -->
<!-- middle section -->
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <div class="row">
                <form class="form-inline" action="#" method="post">
                    <legend>Upcoming Courses: </legend>
                    <div class="form-group filter-option">
                        <label for="city" class="filter-label">Choose Location: </label>
                        <select name="city" id="city" class="form-control input-sm filter-select">
                            <option value="" selected>All Locations</option>
                            <?php

                            // Get venues from db
                            $sql = "SELECT * FROM Venue";
                            $res = mysqli_query($con, $sql);

                            // Loop through venues
                            while ($row = mysqli_fetch_assoc($res)) {

                                // Display venue
                                echo '<option value="' . $row["id"] . '">' . $row["city"] . '</option>';

                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group filter-option">
                        <label for="course" class="filter-label">Choose Course: </label>
                        <select name="course" id="course" class="form-control input-sm filter-select">
                            <option value="" selected>All Courses</option>
                            <?php

                            // Get venues from db
                            $sql = "SELECT * FROM Category";
                            $res = mysqli_query($con, $sql);

                            // Loop through venues
                            while ($row = mysqli_fetch_assoc($res)) {

                                // Display venue
                                echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';

                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group filter-option">
                        <label class="control-label filter-label" for="date">Date</label>
                        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
                    </div>
                    <button id="filterSubmit" type="button" name="filter" class="btn btn-default" style="margin-top: 18px;">Filter Results</button>
                </form>
            </div>
            <div id="courseDisplay" class="row"></div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!--  end of middle section -->
<?php include("template/footer.php") ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);

        loadCourses();

        $(".card-text").each(function() {
            $clamp(this, {clamp: 3});
        });

        $("#filterSubmit").click(function() {
            loadCourses();
        });
    });

    function loadCourses() {

        var date = null;

        if ($("#date").datepicker('getDate') != null) {
            var momentDate = moment($("#date").datepicker('getDate'));
            momentDate = momentDate.format("X");
            date = momentDate.toString();
        }

        <?php

        if (isset($_SESSION['username']) != "") {
            echo '$("#courseDisplay").load("template/getEvents.php?" + $.param({
						loc: $("#city").val(),
						course: $("#course").val(),
						date: date,
						loggedIn: 1}));';
        } else {
            echo '$("#courseDisplay").load("template/getEvents.php?" + $.param({
						loc: $("#city").val(),
						course: $("#course").val(),
						date: date}));';
        }

        ?>
    }

</script>
</body>
</html>
