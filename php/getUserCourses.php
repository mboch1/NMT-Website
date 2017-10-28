<?php
//created on 17/10/2017 by MB

function getBookedCourses(mysqli $con, $userID){
//check if the record already exists!
	$id = 0;

	$sql = "SELECT Booking.user_id, Booking.course_id, Booking.date_booked, course.title, course.start_date FROM Booking INNER JOIN Users user ON Booking.user_id = user.id INNER JOIN Course course ON Booking.course_id = course.id WHERE Booking.user_id='$userID'";

	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result)){
	    $id = $id+1;
	    $title = $row['title'];
		$start_date = $row['start_date'];
    	$date_booked = $row['date_booked'];
    	
    	echo'<tr>
				<th scope="row">'.$id.'</th>
				<td>'.$title.'</td>
				<td>'.$start_date.'</td>
				<td>'.$date_booked.'</td>
		    </tr>';
	}
	if($id=0){
    	echo'<tr>
				<th scope="row">'.$id.'</th>
				<td>none</td>
				<td>none</td>
				<td>none</td>
		    </tr>';
	}
}
?>