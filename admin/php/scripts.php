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
                <label class="control-label col-sm-2" for="id">ID:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="cid" id="cid" value="'.$id.'"readonly>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" value="'.$title.'" required>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="control-label col-sm-2" for="desc">Description:</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="4" name="description" id="desc">'.$description.'</textarea>
                </div>
              </div>
              <div class="form-group filter-option">
                <label for="city">Select city:</label>
                <select class="form-control input-sm filter-select" name="venue_id" id="city">';
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
                <label class="control-label col-sm-2" for="start_date">Start Date:</label>
                <div class="col-sm-10">
                  <input class="datepicker" name="start_date" value='.$start_date.' data-date-format="yyyy-mm-dd" required>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="control-label col-sm-2" for="image">Image:</label>
                <div class="col-sm-10">
                  <input class="text" name="image" value="'.$image.'" id="image" required>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="control-label col-sm-2" for="price">Price:</label>
                <div class="col-sm-10">
                  <input class="value" name="price" value="'.$price.'" id="price" required>
                </div>
              </div>              
              <div class="form-group filter-option">
                <label for="titles">Select Category Title:</label>
                <select class="form-control input-sm filter-select" id="titles" name="category_id">';                 
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
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
                <div class="col-sm-offset-1 col-sm-4">
                  <form action="'.deleteCourse($con, $id).'" method="post">
                    <button type="submit" name="'.$id.'" class="btn btn-default">Delete</button>
                  </form>
                </div>
              </div>    
            </form>';
    }
}

//DELETE COURSE
function deleteCourse(mysqli $con, $id){
  if(isset($_POST[$id])){
    mysqli_query($con, "DELETE FROM courses where id=$id");
    header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
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

    $sql = "UPDATE Course SET title='$title', description='$description', venue_id='$venue_id', start_date='$start_date', image='$image', price='$price', category_id='$category_id' WHERE id='$cid'";

    mysqli_query($con, $sql);
    header("refresh:0, url=http://localhost/NMT-Website/admin/adminCourseEdit.php");
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
                <div class="col-sm-10">
                  <input type="value" value="'.$id.'" class="form-control" name="vid" id="vid" readonly>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="city">City:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="city" name="city" value="'.$city.'" required>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="add1">Address 1:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="add1" name="add1" value="'.$add1.'" required>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="add2">Address 2:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="add2" name="add2" value="'.$add2.'"required>
                </div>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="pcode">Postcode:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="pcode" name="pcode" value="'.$postcode.'"required>
                </div>
              </div>
              <div class="form-group filter-option">
                <div class="col-sm-offset-2 col-sm-4">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
                <div class="col-sm-offset-1 col-sm-4">
                <form action="'.deleteVenue($con, $id).'" method="post">
                  <button type="submit" name="'.$id.'" class="btn btn-default">Delete</button>
                </form>
                </div>
              </div>    
            </form>';
    }
}

//DELETE VENUE
function deleteVenue(mysqli $con, $id){
  if(isset($_POST[$id])){
    mysqli_query($con, "DELETE * FROM Venue where id='$id'");
    header("refresh:0, url=http://localhost/NMT-Website/admin/adminVenueEdit.php");
  }
}

//UPDATE VENUE
function updateVenues(mysqli $con, $id){
  if(isset($_POST[$id])){
    $vid = $_POST['vid'];
    $city = $_POST['vn'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $postcode = $_POST['postcode'];

    $sql = "UPDATE Venue SET city='$city', address1='$add1', address2='$add2', postcode='$postcode' WHERE id='$vid'";

    mysqli_query($con, $sql);
    header("refresh:0, url=http://localhost/NMT-Website/admin/adminVenueEdit.php");
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
