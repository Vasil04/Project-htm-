<?php
include ('db.php');
$q = "SELECT * FROM `comment` ";
echo "<div";
$result = mysqli_query($conn, $q);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo  "<p>" .$row['comment_name']. "";
		echo "<a href='comments/update.php?id=".$row['comment_id']."'> Update <a/>";
		echo "<a href='comments/delete.php?id=".$row['comment_id']."'> Delete <a/>";
		echo  "" .$row['comment_date']. "";
		echo "</P>";
	}
}
echo "</div>";