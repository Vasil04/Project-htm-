<?php
include ('dbtxt.php');
if (empty($_POST['submit'])) {
	?>
<form action="inserttxt.php" method="post">
	<label for="txt">Add Your text
	<input type="text" name="txt" value="" id="txt">
	</label>
	<input type="submit" name="submit" value="Submit">
</form>
	<?php
} else {
	$txt = $_POST['txt'];

	$insert_query = "INSERT INTO text (`text_name`) VALUES ('".$txt."')";
	$result = mysqli_query($conn, $insert_query);

	if ($result) {
		header ('Location: welcome.php');
	}
}
 