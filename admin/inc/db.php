<?php  
	$db = mysqli_connect("localhost", "root", "", "food_order");

	if ( $db ) {
		echo "DATABASE CONNECTED SUCESSFULLY";
	}
	else {
		die("Mysqli Error." . mysqli_error($db));
	}
?>