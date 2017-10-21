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
                $isActive = $row['isActive'];
                
                if($isActive==0){
                  echo '<option value="'.$id.'">INACTIVE'.$title.' '.$start_date.'</option>';
                }
                else{
                  echo '<option value="'.$id.'">'.$title.' '.$start_date.'</option>';
                }
                
              }
            echo '</select>
          </div>
          <div class="form-group filter-option"> 
              <button type="submit" name="Selected" class="btn btn-default">Select</button>
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
      $isActive = $row['isActive'];

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
                  <button type="submit" name="UpdateCourse" class="btn btn-default">Update</button>
                </div>
              </form>
                <div>
                  <form action="'.deactivateCourse($con).'" method="post">
                    <div class="form-group filter-option">
                      <input type="hidden" name="courseID" value="'.$id.'">
                  ';
                  if($isActive == 1){
                      echo '<button type="submit" name="Deactivate" class="btn btn-default">Deactivate</button>';
                  }
                  else{
                    echo '<button type="submit" name="Reactvate" class="btn btn-default">Reactivate</button>';
                  }  
                    echo'
                    </div>   
                  </form>
                  </div>';
  }
}

//DELETE COURSE
function deactivateCourse(mysqli $con){
  if(isset($_POST['Deactivate'])){

    $did = $_POST['courseID'];
    $deactiv = 0;

    $sql = "UPDATE Course SET isActive ='$deactiv' WHERE id=$did";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
    } 
  }
    if(isset($_POST['Reactivate'])){

    $did = $_POST['courseID'];
    $deactiv = 1;

    $sql = "UPDATE Course SET isActive ='$deactiv' WHERE id=$did";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
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
//ADD NEW VENUE
function addNewVenue(mysqli $con){
  if(isset($_POST['addVenue'])){
    $vn = $_POST['vn'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $postcode = $_POST['postcode'];

    $sql = "INSERT INTO Venue (city, address1, address2, postcode) VALUES ('$vn','$add1', '$add2', '$postcode')";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseAdd.php");
      exit; 
    } 
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
  }
}
//GET COURSE NAMES
function getCourseNames(mysqli $con){

  $sql = "SELECT Course.isActive, Course.bookings, Course.id, Course.venue_id, Course.title, Course.start_date, b.city, b.postcode FROM Course INNER JOIN Venue b ON Course.venue_id = b.id";
  $result = mysqli_query($con, $sql);

  date_default_timezone_set('Europe/London');
  $current_date = date_create(date('Y-m-d'));
  $warningsID = array();

  echo'<table class="table table-bordered">
        <tr>
            <th>Course ID</th>
            <th>Course Title</th>
            <th>City</th>
            <th>Postcode</th>
            <th>Bookings</th>
            <th>Starts</th>
            <th>Is Advertised</th>
            <th>Cancel</th>
        </tr>';

  while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $city = $row['city'];
    $postcode = $row['postcode'];
    $bookings = $row['bookings'];
    $isActive = $row['isActive'];
    $setText = "True";
    $start_date = date_create($row['start_date']); 
    $diff = $start_date->diff($current_date);

    if($isActive==0){
      $setText="False";
    }

    if($isActive==1){
      if($diff->days<=14 && $diff->days>0){
        if($bookings<=15){
          array_push($warningsID, $id);
        }
      }
    }

    echo "<tr>
            <td>" . $id . "</td>
            <td>" . $title . "</td>
            <td>" . $city . "</td>
            <td>" . $postcode . "</td>
            <td>" . $bookings . "</td>
            <td>" . $diff->format("%R%a days") . "</td>
            <td>" . $setText . "</td>
            <td><form action='".cancelCourse($con)."' method='post'>
                <input type='hidden' name='courseID' value='".$id."'>
                  <button type='submit' name='Cancel' class='btn btn-default'>Cancel</button>
                </form></td>
          </tr>";
  }
    echo ' </tbody>
        </table><br>';
    if(sizeof($warningsID)!=0){
      for($i=0; $i<sizeof($warningsID); $i++){
        echo '<h4>WARNING Course ID: '.$warningsID[$i].' has not enough bookings consider taking action</h4><br>';
      }
    }
}

//if course is cancelled send message to all users subscribed to it
function cancelCourse(mysqli $con){
    if(isset($_POST['Cancel'])){ 
      $id = $_POST['courseID'];
      removeAllBookings($con, $id);   
    }
}

//remove booking 
function removeAllBookings(mysqli $con, $courseID){
  
  $sql = "SELECT Booking.user_id, Booking.course_id, user.email FROM Booking INNER JOIN Users user ON Booking.user_id = user.id";

  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($result)) {
    //send emails to the users here:
    $email = $row['email'];
    $userID = $row['user_id'];
    $course = $row['course_id'];

    if($courseID==$course){
      // the message
      $msg = "Due to the low interest, the course You have booked was cancelled. Please contact administration";
      // use wordwrap() if lines are longer than 70 characters
      $msg = wordwrap($msg,70);
      // send email
      $headers = "From: webmaster@example.com" . "\r\n" . "CC: somebodyelse@example.com";
      mail($email,"Course Cancelled",$msg,$headers);
      
      //once email was sent remove the booking from database
      $sql2 = "DELETE FROM Booking WHERE user_id='$userID' AND course_id='$courseID'";    
      if (mysqli_query($con, $sql2)) {  
      } 
      else{
        echo "Error updating record: " . mysqli_error($con);
      } 
    }
  }
  //set course inactive so that no user can book it again
  $deactiv = 0;
  $sql3 = "UPDATE Course SET isActive ='$deactiv', bookings='$deactiv' WHERE id=$courseID";
  if (mysqli_query($con, $sql3)) {
    header("refresh:5, url=http://localhost/NMT-Website/admin/adminBookingsView.php");
    exit(); 
  } 
  else{
    echo "Error updating record: " . mysqli_error($con);
  }
}
?>