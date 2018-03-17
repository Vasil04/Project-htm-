<?php
// Start session
session_start();
$_SESSION = array();
 
// Destroying it
session_destroy();
 
//Go to the login page!!!
header("location: login.php");
exit;
?>