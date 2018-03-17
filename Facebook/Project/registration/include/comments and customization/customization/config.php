<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
$link = mysqli_connect('localhost', 'root', '', 'registration');
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 //Made by Alexander
?>