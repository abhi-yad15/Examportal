<?php
	$dbhost = 'localhost';
   $dbuser = 'intellifyiitd16';
   $dbpass = 'intellify2016';
   $db='intellify';
   $error="";
   $con = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
   session_start();
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>