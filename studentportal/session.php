<?php
	$dbhost = 'localhost';
   $dbuser = '';
   $dbpass = '';
   $db='';
   $error="";
   $con = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select * from entries where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $username = $row['username'];
   $level = $row['level'];
   if(!isset($_SESSION['login_user'])){
      mysqli_close($con);
      header("location:index.php");
   }
?>
