<?php
function getCourses(mysqli $con){

  $result = mysqli_query($con,"SELECT * FROM courses");

     echo"<h3>Registered Courses: </h3><br>
          <div class='table-responsive'>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
              <tr>";
      while($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $courseTitle = $row['course_title'];
        $coursePrice = $row['course_price'];
        $courseVenueId = $row['course_venue_id'];
        $courseDescription = $row['course_description'];

          echo"<td>".$id."</td>";
          echo"<td>".$courseTitle."</td>";
          echo"<td>".$courseVenueId."</td>";
          echo"<td>".$courseDescription."</td>";
          echo"<td>".$coursePrice."</td>";
          echo"<td>
                <form action='".deleteCourse($con, $id)."' method=post>
                   <button type='submit' name='".$id."' class='btn btn-default'>Delete</button>
                </form>";
        echo"</tr>";
      }
        echo"
          </tbody>
        </table>
      </div>
      <br>";
}

function deleteCourse(mysqli $con, $id){
  if(isset($_POST[$id])){
    mysqli_query($con, "DELETE FROM courses where id=$id");
    header("refresh:0, url=http://localhost/NMT-Website/admin/adminIndex.php");
  }
}

function addNewCourse(mysqli $con){
  if(isset($_POST['addCourse'])){
    $category = $_POST['category'];
    $venue = $_POST['venue'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $insert_data = "INSERT INTO courses (course_category_id, course_venue_id, course_title, course_description, course_price) VALUES ('$category','$venue', '$title', '$description', '$price')";

    $insert_data_query = mysqli_query($con, $insert_data);

    header("refresh:0, url=http://localhost/NMT-Website/admin/adminIndex.php");
  }
}
?>
