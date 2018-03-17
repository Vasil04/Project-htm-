<?php
function img($fileExt, $fileTmp) {
include ('db.php');
$filePath = 'images/' . substr(md5(time()), 0, 10) . '.' . $fileExt;
move_uploaded_file($fileTmp, $filePath);
$time = time();
$insert = "INSERT INTO image VALUES('', '$filePath')";
$result = mysqli_query($conn, $insert);
header('Location: welcome.php');
}
?>