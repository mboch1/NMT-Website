<?php
/* 
  Author: Michal Bochenek 
  Date: 17/10/2017
  version 1
*/
//GET COURSES LIST
function getCourseList(mysqli $con){
  
  echo '<form action="'.getSelectedCourse($con).'" method="post">
          <div class="form group filter-option">
          <label class="filter-label" for="courseList">Select Course To Edit:</label>
            <select class="form-control input-sm filter-select" name="courseList" id="courseList">';
              // Get cities from db
              $sql = "SELECT * FROM Course";
              $res = mysqli_query($con, $sql);
              // Loop through cities
              while ($row = mysqli_fetch_assoc($res)){
              // Display city option
                $id = $row['id'];
                $title = $row['title'];
                $start_date = $row['start_date'];
                echo '<option value="'.$id.'">'.$title.' '.$start_date.'</option>';
              }
            echo '</select>
          </div>
          <div class="form-group filter-option">
            <div class="col-sm-offset-2 col-sm-4">
              <button type="submit" name="Selected" class="btn btn-default">Select</button>
            </div>
          </div>
        </form><br><br>';
}

//COURSE EDITOR
function getSelectedCourse(mysqli $con){
    
  if(isset($_POST['Selected'])){

    $sid = $_POST['courseList'];

    $result = mysqli_query($con,"SELECT * FROM Course WHERE id = $sid");

    $row = mysqli_fetch_array($result);

      $id = $row['id'];
      $title = $row['title'];
      $description = $row['description'];
      $venue_id = $row['venue_id'];
      $start_date = $row['start_date'];
      $image = $row['image'];
      $price = $row['price'];
      $category_id = $row['category_id'];

      echo '<form action="'.updateCourses($con).'" method="post">
              <div class="form-group filter-option">
                <label class="filter-label" for="cid">Course ID:</label>
                  <input type="value"  class="form-control" name="cid" id="cid" value="'.$id.'" readonly>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="title">Title:</label>
                  <input type="text" class="form-control" id="title" name="title" value="'.$title.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="description">Description:</label>
                  <textarea class="form-control" rows="4" name="description" id="description">'.$description.'</textarea>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="venue_id">City:</label>
                  <select class="form-control input-sm filter-select" name="venue_id" id="venue_id">';
                  // Get cities from db
                  $sql = "SELECT * FROM Venue";
                  $res = mysqli_query($con, $sql);
                  // Loop through cities
                  while ($row = mysqli_fetch_assoc($res)){
                  // Display city option
                    $id = $row['id'];
                    $city = $row['city'];
                    echo '<option value="'.$id.'">'.$city.'</option>';
                  }
            echo '</select>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="start_date">Start Date:</label>
                  <input data-provide="datepicker" class="datepicker" name="start_date" id="start_date" value="'.$start_date.'" data-date-format="yyyy-mm-dd" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="image">Image:</label>
                  <input class="form-control" type="text" name="image" value="'.$image.'" id="image" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="price">Price:</label>
                  <input class="form-control" type="value" name="price" value="'.$price.'" id="price" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="category_id">Category:</label>
                  <select class="form-control input-md filter-select" name="category_id" id="category_id">';
                  // Get titles from db
                  $sql = "SELECT * FROM Category";
                  $res = mysqli_query($con, $sql);
                  // Loop through titles
                  while ($row = mysqli_fetch_assoc($res)){
                  // Display title option
                    $id=$row['id'];
                    $title=$row['title'];
                    echo '<option value="'.$id.'">'.$title.'</option>';
                  }
            echo '</select>
              </div>
                <div class="form-group filter-option">
                  <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" name="UpdateCourse" class="btn btn-default">Submit</button>
                  </div>
                  <div class="col-sm-offset-1 col-sm-4">
                  <form action="'.deleteCourse($con).'" method="post">
                    <input type="hidden" name="courseID" value="'.$id.'">
                    <button type="submit" name="Delete" class="btn btn-default">Delete</button>
                  </form>
                  </div>
                </div>    
              </form>';
  }
}

//DELETE COURSE
function deleteCourse(mysqli $con){
  if(isset($_POST['Delete'])){

    $did = $_POST['courseID'];

    $sql = "DELETE FROM Course WHERE id = $did";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
      exit; 
    } 
  }
}

//UPDATE COURSE
function updateCourses(mysqli $con){
  
  if(isset($_POST['UpdateCourse'])){
      $cid = $_POST['cid'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $venue_id = $_POST['venue_id'];
      $start_date = $_POST['start_date'];
      $image = $_POST['image'];
      $price = $_POST['price'];
      $category_id = $_POST['category_id'];
      
      $sql = "UPDATE Course SET title='$title', description='$description', venue_id='$venue_id', start_date='$start_date', image='$image', price='$price', category_id='$category_id' WHERE id=$cid";

      if (mysqli_query($con, $sql)) {

        header("refresh:10, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
        exit;
      } 
      else{
        echo "Error updating record: " . mysqli_error($con);
      }
    }
}

//ADD NEW COURSE
function addNewCourse(mysqli $con){
  if(isset($_POST['addNew'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $venue_id = $_POST['venue_id'];
    $start_date = $_POST['start_date'];
    //convert date:
    //$con_date = date('Y-m-d', strtotime($start_date));
    $image = $_POST['image'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO Course (title, description, venue_id, start_date, image, price, category_id) VALUES ('$title','$description', '$venue_id', '$start_date', '$image', '$price', '$category_id')";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseAdd.php");
      exit; 
    } 
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
  }
}

//VENUE EDITOR (update 1 venue at a time)
function getVenues(mysqli $con){

  $result = mysqli_query($con,"SELECT * FROM Venue");

    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $city = $row['city'];
      $add1 = $row['address1'];
      $add2 = $row['address2'];
      $postcode = $row['postcode'];

      echo '<form class="form-horizontal" action="'.updateVenues($con, $id).'" method="post">
              <div class="form-group filter-option">
                <label class="filter-label" for="vid">ID:</label>
                  <input type="value"  class="form-control" name="vid" id="vid" value="'.$id.'" readonly>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="city">City:</label>
                  <input type="text" class="form-control" id="city" name="city" value="'.$city.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="add1">Address 1:</label>
                  <input type="text" class="form-control" id="add1" name="add1" value="'.$add1.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="add2">Address 2:</label>
                  <input type="text" class="form-control" id="add2" name="add2" value="'.$add2.'"required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="pcode">Postcode:</label>
                  <input type="text" class="form-control" id="pcode" name="postcode" value="'.$postcode.'"required>
              </div>
              <div class="form-group filter-option">
                <div class="col-sm-offset-2 col-sm-4">
                  <button type="submit" name="'.$id.'"class="btn btn-default">Submit</button>
                </div>
                <div class="col-sm-offset-1 col-sm-4">
                <form action="'.deleteVenue($con, $id).'" method="post">
                  <input type="hidden" name="venueID" value="'.$id.'">
                  <button type="submit" name="Delete" class="btn btn-default">Delete</button>
                </form>
                </div>
              </div>    
            </form>';
    }
}

//DELETE VENUE
function deleteVenue(mysqli $con, $id){
  if(isset($_POST['Delete'])){

    $vid = $_POST['venueID'];

    $sql = "DELETE FROM Venue WHERE id = $vid";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminVenueEdit.php");
      exit; 
    } 
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
  }
}

//UPDATE VENUE
function updateVenues(mysqli $con, $id){
  if(isset($_POST[$id])){
    $vid = $_POST['vid'];
    $city = $_POST['city'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $postcode = $_POST['postcode'];

    $sql = "UPDATE Venue SET city='$city', address1='$add1', address2='$add2', postcode='$postcode' WHERE id=$vid";

    if (mysqli_query($con, $sql)) {
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminVenueEdit.php");
      exit; 
    } 
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
  }
}

//VIEW BOOKINGS
function getBookings(mysqli $con){

  $sql = "SELECT Booking, COUNT(*) FROM id GROUP BY course_id";
  $result = mysqli_query($con, $sql);


    foreach($con->query('SELECT user_id,course_id, COUNT(*) FROM Booking GROUP BY course_id') as $row){

      echo "<tr>
              <td>" . $row['course_id'] . "</td>
              <td>" . $row['COUNT(*)'] . "</td>
            </tr>";
    }
}
//GET COURSE NAMES
function getCourseNames(mysqli $con){

  $sql = "SELECT Course.id, Course.venue_id, Course.title, Course.start_date, b.id, b.city, b.postcode FROM Course INNER JOIN Venue b ON Course.venue_id = b.id";
  $result = mysqli_query($con, $sql);

  while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $start_date = $row['start_date'];
    $city = $row['city'];
    $postcode = $row['postcode'];

    echo "<tr>
            <td>" . $id . "</td>
            <td>" . $title . "</td>
            <td>" . $start_date . "</td>
            <td>" . $city . "</td>
            <td>" . $postcode . "</td>
          </tr>";
  }
}
?>
