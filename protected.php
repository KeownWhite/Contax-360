PHP
<?php
// initialize session
session_start();

if(!isset($_SESSION['user'])) {
	// user is not logged in, do something like redirect to login.php
	header("Location: index.php");
	die();
}else{
    header("Location: dashboard.php");
}
?>

