<?php
//created on 28/10/2017 by MB

function getAboutUsText(mysqli $con){

	$sql = "SELECT * FROM AboutUs WHERE id=1";

	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result)){
	    $aboutUsText = $row['AboutUsText'];
		$heading = $row['Heading'];
		$contact = $row['Contact'];
		echo '<div class="page-header">
				<h1>'.$heading.'</h1>
			  </div>';
    	echo '<p>'.$aboutUsText.'</p><br>';
    	echo '<p>'.$contact.'</p><br>';
	}
}
?>