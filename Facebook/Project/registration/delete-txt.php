<?php
include ('dbtxt.php');
$text_id = $_GET['id'];
$delete_query = "DELETE FROM 'text' WHERE text_id = $text_id";
$result = mysqli_query($conn, $delete_query);

if ($result) {
}
else {
	echo mysqli_error($conn);
	
}