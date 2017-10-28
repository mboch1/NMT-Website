<?php

    require_once __DIR__ . '/../php/db.php';

    $display = "";
    $loc = ($_GET["loc"] != "" ? (int)$_GET["loc"] : "%");
    $course = ($_GET["course"] != "" ? (int)$_GET["course"] : "%");
    $date = ($_GET["date"] != "" ? date('Y-m-d', $_GET["date"]) : "%");
    $loggedIn = ($_GET["loggedIn"] == 1 ? true : false);

    // Fetch courses from database
    $sql = "SELECT Course.*, Category.description caDescription, Category.defaultImage FROM Course INNER JOIN Category ON Category.id = Course.category_id WHERE venue_id LIKE '$loc' AND category_id LIKE '$course' AND start_date LIKE '$date' AND isActive=1 AND bookings<15 ORDER BY start_date ASC";
    $res = mysqli_query($con, $sql);

    $temp = mysqli_error($con);
    if ($temp) {
        echo $temp;
    }

    // Display courses
    while ($row = mysqli_fetch_assoc($res)) {

        $date_formated = date('d-m-Y', strtotime( $row['start_date'] ));
        // If course doesn't have an image, give it a placeholder
        if ($row["imageName"] == "") {
            $row["imageName"] = $row["defaultImage"];
        }

        if ($row["description"] == "") {
            $row["description"] = $row["caDescription"];
        }

        // Display course
        $display .= '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="' . $row["imageName"] . '" alt="">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="courseDetails.php#' . $row["title"] . '">' . $row["title"] . '</a>
                  </h4>
                  <h5>Price: £' . $row["price"] . '</h5>
                  <h5>Start Date:' . $date_formated . '</h5>
                  <p class="card-text">' . $row["description"] . '</p>
                </div>
                <div class="card-footer">';
            if($loggedIn){
                $display .= ' <div class="text-center">
                        <a tabindex="0" role="button" class="btn btn-default book-button" data-toggle="popover" data-trigger="focus" data-id="' . $row["id"] . '" data-content="Attempting to book course...">Book Course</a>
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
