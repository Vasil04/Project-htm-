<?php
include ('db.php');
require 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
</head>
<body>
	<?php
	if (isset($_FILES['img'])) {
		if (empty($_FILES['img']['name'])) {
			echo "You need to insert an image!";
		} else {
			$allowed = ['jpg', 'png', 'jpeg'];
			$fileName = $_FILES['img']['name'];
			$fileAExt = explode('.', $fileName);
  			$fileExt = strtolower(end($fileAExt));
			$fileTmp = $_FILES['img']['tmp_name'];

			if (in_array($fileExt, $allowed)) {
				img($fileExt, $fileTmp);
			} else {
				echo "This is not an acceptable extension!";
			}
		}
	}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="img">
		<input type="submit" name="submit">
		<input type="hidden" name="userid">
	</form>
</body>
</html>