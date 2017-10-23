<?php

    require_once __DIR__ . '/../php/db.php';

    $display = "";
    $loc = ($_GET["loc"] != "" ? (int)$_GET["loc"] : "%");
    $course = ($_GET["course"] != "" ? (int)$_GET["course"] : "%");
    $date = ($_GET["date"] != "" ? date('Y-m-d', $_GET["date"]) : "%");
    $loggedIn = ($_GET["loggedIn"] == 1 ? true : false);

    // Fetch courses from database
    $sql = "SELECT * FROM Course WHERE venue_id LIKE '" . $loc . "' AND category_id LIKE '" . $course . "' AND start_date LIKE '" . $date . "' ORDER BY start_date ASC";
    $res = mysqli_query($con, $sql);

    // Display courses
    while ($row = mysqli_fetch_assoc($res)) {

        $date_formated = date('d-m-Y', strtotime( $row['start_date'] ));
        // If course doesn't have an image, give it a placeholder
        if ($row["imageName"] == "") {
            $row["imageName"] = "https://i.imgur.com/0ejY8kU.png";
        }

        // Display course
        $display .= '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="' . $row["imageName"] . '" alt="">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">' . $row["title"] . '</a>
                  </h4>
                  <h5>Price: £' . $row["price"] . '</h5>
                  <h5>Start Date:' . $date_formated . '</h5>
                  <p class="card-text">' . $row["description"] . '</p>
                </div>
                <div class="card-footer">';
            if($loggedIn){
                $display .= ' <div class="text-center">
                        <a href="php/setBooking.php?course_id=' . $row["id"]. '" class="btn btn-default" role="button">Book Course</a>
                    </div>';
            }
            else{
                $display .= 'Please login to register for course.';
            }
        $display .= '
                </div>
            </div>
          </div>';
    }

    echo $display;

?>
