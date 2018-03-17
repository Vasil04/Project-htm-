<?php
include ('db.php');
if (empty($_POST['submit'])) {


	$comment_id = $_GET['id'];
	$select_query = "SELECT * FROM `comment` WHERE `comment_id` =  $comment_id";
	$result = mysqli_query($conn, $select_query);
	if ($result) {
		$row = mysqli_fetch_assoc($result);

	
	?>
<form action="update.php" method="post">
	<label for="comment_name">Add comment
	<input type="text" name="comment_name" value="<?= $row['comment_name'] ?>" id="comment_name">
	<input type="hidden" name="comment_id" value="<?= $row['comment_id'] ?>">
	</label>
	<input type="submit" name="submit" value="Submit">
</form>

	<?php 
	}
} else {
	$comment_name = $_POST['comment_name'];
	$comment_id = $_POST['comment_id'];
	$update_query = "UPDATE `comment` SET `comment_name`= ('$comment_name') WHERE `comment_id` = $comment_id";
	$result = mysqli_query($conn, $update_query);
	if ($result) {
		echo "Suceesful update";
	}
}
echo "<a href='welcome.php'>Return to DataBase!</a>";