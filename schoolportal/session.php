<?php
	$dbhost = 'localhost';
   $dbuser = '';
   $dbpass = '';
   $db='intellify';
   $error="";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select username from school_login where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>
