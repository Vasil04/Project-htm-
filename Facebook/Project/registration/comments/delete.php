<?php
include ('db.php');
$comment_id = $_GET['id'];
$delete_query = "DELETE FROM comment WHERE comment_id = $comment_id";
$result = mysqli_query($conn, $delete_query);

if ($result) {
	echo "Succesfull  delete!!";
}
else {
	
}