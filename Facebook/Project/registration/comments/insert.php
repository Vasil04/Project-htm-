<?php
include ('db.php');
if (empty($_POST['submit'])) {
} else {
	$comment_name = $_POST['comment_name'];
	$date = date('Y-m-d');
	$insert_query = "INSERT INTO `comment`( `comment_name`, `comment_date`) VALUES ('".$comment_name."', '".$date."')";
	$result = mysqli_query($conn, $insert_query);

	if ($result) {
		echo "Success!!";
	}
}
echo "<a href='ex4.php'>RETURN TO DB</a>";
 