<?php
//created on 28/10/2017 MB
function getUserDetails(mysqli $con, $username){

  $result = mysqli_query($con,"SELECT * FROM Users WHERE email='$username'");

    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $email = $row['email'];
      $password = $row['password'];
      $firstname = $row['firstname'];
      $surname = $row['surname'];
      $address1 = $row['address1'];
      $address2 = $row['address2'];
      $city = $row['city'];
      $postcode = $row['postcode'];
      $teleno = $row['teleno'];

      echo '<form class="form-horizontal" action="'.updateUserDetails($con).'" method="post">
              <div class="form-group filter-option">
                  <input type="value" name="userID" value="'.$id.'" hidden>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="Email">Email:</label>
                  <input type="email" class="form-control" id="Email" name="Email" value="'.$email.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="Password">Password:</label>
                  <input type="password" class="form-control" id="Password" name="Password" value="'.$password.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="firstname">First name:</label>
                  <input type="name" class="form-control" id="firstname" name="Firstname" value="'.$firstname.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="surname">Surname:</label>
                  <input type="name" class="form-control" id="surname" name="Surname" value="'.$surname.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="address1">Address 1:</label>
                  <input type="text" class="form-control" id="address1" name="Address1" value="'.$address1.'" required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="address2">Address 2:</label>
                  <input type="text" class="form-control" id="address2" name="Address2" value="'.$address2.'">
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="city">City:</label>
                  <input type="text" class="form-control" id="city" name="City" value="'.$city.'">
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="postcode">Postcode:</label>
                  <input type="text" class="form-control" id="postcode" name="Postcode" value="'.$postcode.'"required>
              </div>
              <div class="form-group filter-option">
                <label class="filter-label" for="teleno">Telephone:</label>
                  <input type="value" class="form-control" id="teleno" name="Teleno" value="'.$teleno.'"required>
              </div>
              <div class="form-group filter-option">
                  <button type="submit" name="UserDetails" class="btn btn-default">Update</button>
              </div>
            </form>';
    }
}

function updateUserDetails(mysqli $con){
  if(isset($_POST['UserDetails'])){
    $id = $_POST['userID'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $firstname = $_POST['Firstname'];
    $surname = $_POST['Surname'];
    $address1 = $_POST['Address1'];
    $address2 = $_POST['Address2'];
    $city = $_POST['City'];
    $postcode = $_POST['Postcode'];
    $teleno = $_POST['Teleno'];

    $sql = "UPDATE Users SET email='$email', password='$password', firstname='$firstname', surname='$surname', city='$city', address1='$address1', address2='$address2', postcode='$postcode', teleno='$teleno' WHERE id=$id";

    if (mysqli_query($con, $sql)) {
      header("refresh:0, url=index.php");
      exit;
    }
    else{
      echo "Error updating record: " . mysqli_error($con);
    }
}
}
?>
