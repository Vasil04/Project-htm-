<?php
$conn = mysqli_connect('localhost', 'root', '', 'comments');
mysqli_query($conn, "SET CHARACTER SET 'utf8'");
if ($conn) {
	# code...
}
else {
	echo "There is something wrong!";
}