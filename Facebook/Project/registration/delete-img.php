<?php
include ('db.php');
$image_id = $_GET['id'];
$delete_query = "DELETE FROM image WHERE image_id = $image_id";
$result = mysqli_query($conn, $delete_query);

if ($result) {
	echo "You have succesfully deleted a comment!";
}
else {
	echo mysqli_error($conn);
	
}

