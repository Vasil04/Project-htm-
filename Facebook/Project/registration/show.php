
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test</title>
	<style type="text/css">
		.edno {
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
		$q = "SELECT * FROM image ";
	include ('db.php');
	$result = mysqli_query($conn, $q);?>
	<div class="edno">
		<?php
	while ($r = mysqli_fetch_assoc($result)) {
		
		echo '<p id="random"><img src="' .$r["image"]. '" height="400" ?id='.$r['image_id'].'><a href="delete-img.php?id='.$r['image_id'].'">Delete</a></p>';
	
		echo '<form action="comments/insert.php" method="post">
	<label for="comment_name">Add comment
	<input type="text" name="comment_name" value="" id="comment_name">
	</label>
	<input type="submit" name="submit" value="Submit">
	</form>';
	include ('comments/show.php');

		
		

	}?>		
</div>
</body>
</html>
