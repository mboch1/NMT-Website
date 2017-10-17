<?php
/* 
  Author: Michal Bochenek 
  Date: 17/10/2017
  version 1
*/

//COURSE EDITOR
function getCourses(mysqli $con){
    $result = mysqli_query($con,"SELECT * FROM Course");
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $title = $row['title'];
      $description = $row['description'];
      $venue_id = $row['venue_id'];
      $start_date = $row['start_date'];
      $image = $row['image'];
      $price = $row['price'];
      $category_id = $row['category_id'];

      echo '<form class="form-horizontal" action="'.updateCourses($con, $id).'" method="post">
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
                    echo '<option value="' . $row["id"] . '">' . $row["city"] . '</option>';
                  }
            echo '</select>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="start_date">Start Date:</label>
                  <input class="datepicker" name="start_date" id="start_date" value="'.$start_date.'" data-date-format="yyyy-mm-dd" required>
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
                  <select class="form-control input-sm filter-select" name="category_id" id="category_id">';
                  // Get titles from db
                  $sql = "SELECT * FROM Category";
                  $res = mysqli_query($con, $sql);
                  // Loop through titles
                  while ($row = mysqli_fetch_assoc($res)){
                  // Display title option
                    echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';
                  }
            echo '</select>
              </div>
                <div class="form-group filter-option">
                  <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" name="'.$id.'"class="btn btn-default">Submit</button>
                  </div>
                  <div class="col-sm-offset-1 col-sm-4">
                  <form action="'.deleteCourse($con, $id).'" method="post">
                    <input type="hidden" name="venueID" value="'.$id.'">
                    <button type="submit" name="Delete" class="btn btn-default">Delete</button>
                  </form>
                  </div>
                </div>    
              </form>';
    }
}

//DELETE COURSE
function deleteCourse(mysqli $con, $id){
  if(isset($_POST['Delete'])){

    $cid = $_POST['courseID'];

    $sql = "DELETE FROM Course WHERE id = $vid";

    if (mysqli_query($con, $sql)){
      header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
      exit; 
    } 
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
  }
}

//UPDATE COURSE
function updateCourses(mysqli $con, $id){
  if(isset($_POST[$id])){
      $cid = $_POST['cid'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $venue_id = $_POST['venue_id'];
      $start_date = $_POST['start_date'];
      $image = $_POST['image'];
      $price = $_POST['price'];
      $category_id = $_POST['category_id'];

      $sql = "UPDATE Course SET title = '$title', description ='$description', venue_id ='$venue_id', start_date='$start_date', image = '$image', price = '$price', category_id = '$category_id' WHERE id = $cid";

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
    $image = $_POST['image'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $insert_data = "INSERT INTO Course (title, description, venue_id, start_date, image, price, category_id) VALUES ('$title','$description', '$venue_id', '$start_date', $image, '$price', $category_id)";

    $insert_data_query = mysqli_query($con, $insert_data);

    header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseAdd.php");
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

    $sql = "UPDATE Venue SET city ='$city', address1 ='$add1', address2 ='$add2', postcode ='$postcode' WHERE id = $vid";

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
    $city = $_POST['vn'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $postcode = $_POST['postcode'];

    $insert_data = "INSERT INTO Venue (city, address1, address2, postcode) VALUES ('$city','$add1', '$add2', '$postcode')";

    $insert_data_query = mysqli_query($con, $insert_data);

    header("refresh:0, url=http://localhost/NMT-Website/admin/adminVenueAdd.php");
  }
}
?>
