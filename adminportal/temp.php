<?php
include('session.php');
//get values passes from login.php
    $sql="SELECT * FROM entries WHERE schoolname='Carmel Convent Sr. Sec. School Bhel'";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $username=$row['username'];
        $temp=$row['email'];
        $gmail= '@g';
        $yahoo='@y';
        $rediff='@r';
        $g = strpos($temp, $gmail);
        $y = strpos($temp, $yahoo);
        $r = strpos($temp, $rediff);
        if (!($g === false)) {
          $user = strstr($temp, '@', true);
          $user.="@gmail.com"; 
          $sql="UPDATE entries SET email='$user' WHERE username='$username'";
             if(!mysqli_query($con,$sql)){
			  die('Error: ' . mysqli_error($con));
		     }    
        }
        if (!($y === false)) {
          $user = strstr($temp, '@', true);
          $user.="@yahoo.com"; 
          $sql="UPDATE entries SET email='$user' WHERE username='$username'";
             if(!mysqli_query($con,$sql)){
			  die('Error: ' . mysqli_error($con));
		     }    
        }
        if (!($r === false)) {
          $user = strstr($temp, '@', true);
          $user.="@rediffmail.com"; 
          $sql="UPDATE entries SET email='$user' WHERE username='$username'";
             if(!mysqli_query($con,$sql)){
			  die('Error: ' . mysqli_error($con));
		     }    
        }
        
    }
?>