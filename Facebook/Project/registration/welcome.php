<?php
include ('include/comments and customization/customization/welcome.php');
// Initialize the session
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .up {
        	position: absolute;
        	top: 1%;
        	padding: 1px;
        	font-size: 25px;
            color: #FFFFFF;
            left: 22%;
        }
        .up2 {
        	position: absolute;
        	top: 1%;
        	left: 2.5%;
        	padding: 1px;
        	font-size: 35px;
            color: #FFFFFF;
            left: 24%;
        }
        .button {
        	position: absolute;
        	top: 0.6%;
        	left: 89%;
        	font-size: 25px;
        	background-color: #F01717;
        	border-radius: 20%;
        	color: #FFFFFF;
        }
        a {
        	text-decoration: none;
        }
        #mind {
            font-size: 25px;
            font-family: italic;
        }
        #left {
            color: #F40E0E;
            font-size: 20px;
        }
        #right {
            color: #0F36FE;
             font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <p class="up">Hi, <b><?php echo '<p class="up2">' . $_SESSION['username'] . '</p>'; ?></p>
             <p id="mind"> What's on your mind?</p>
             <p><a href="insert.php" id="left">Post a picture O</a><a href="inserttxt.php" id="right">R Write something</a>
                <div id="main">
                    <?php
                    include ('show.php');
                    ?>
                    
                </div>
    </div>
    <p><a href="logout.php" class="button">Sign Out</a></p>
   
</body>
</html>