<?php
/* 
  Author: Michal Bochenek 
  Date: 17/10/2017
  version 1
*/
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
function updateCourse(mysqli $con){
  
  if(isset($_POST['Update'])){
      $cid = $_POST['courseID'];
      $courseTitle = $_POST['courseTitle'];
      $courseDesc = $_POST['courseDesc'];
      $venueSelect = $_POST['venueSelect'];
      $startDate = $_POST['startDate'];
      $coursePrice = $_POST['coursePrice'];
      $selectCategory = $_POST['selectCategory'];

      $sql = "UPDATE Course SET title='$courseTitle',description='$courseDesc',venue_id='$venueSelect',start_date='$startDate',price='$coursePrice',category_id='$selectCategory' WHERE id=$cid";

      if (mysqli_query($con, $sql)) {
        header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
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
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];    
    $name = $_FILES['file']['name'];
    $imageName = $name;

    $target_dir = "../uploaded/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $price = $_POST['price'];
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
      // Insert record
      $query = "INSERT INTO images(name, courseTitle) VALUES('".$name."', '".$title."')";
      mysqli_query($con,$query);
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    }
    
    $sql = "INSERT INTO Course (title, description, venue_id, start_date, price, category_id, imageName) VALUES ('$title','$description', '$venue_id', '$start_date', '$price', '$category_id', '$imageName')";
    if (mysqli_query($con, $sql)){
      header("refresh:10, url=http://localhost/NMT-Website/admin/adminCourseAdd.php");
    } 
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
  }
}

function uploadImage(mysqli $con){
  if(isset($_POST['UploadImage'])){
    $courseName = $_POST['courseName'];
    $name = $_FILES['file']['name'];
    $imageName = $name;
    $target_dir = "../uploaded/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
      // Insert record
      $sql = "DELETE * FROM images WHERE courseName=$courseName";
      if (mysqli_query($con, $sql)){
        
        $query = "INSERT INTO images(name, courseName) VALUES('".$name."', '".$courseName."')";
        if (mysqli_query($con, $query)){
          // Upload file
          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          header("refresh:10, url=http://localhost/NMT-Website/admin/adminImageUpload.php");
        } 
        else{
          echo "Error updating record: " . mysqli_error($con);
        }
      }
      else{
        echo "Error updating record: " . mysqli_error($con);
      }
    }
  }
}
//retrive image name
function getImageNames(mysqli $con, $courseTitle){
  $sql = "SELECT * FROM images WHERE courseTitle=$courseTitle";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);

  return $row['name'];
}
//removes image first from db
function removeImage(mysqli $con, $courseName){
  $sql = "DELETE * FROM images WHERE courseName=$courseName";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
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
      $headers = "From: webmaster@example.com";
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