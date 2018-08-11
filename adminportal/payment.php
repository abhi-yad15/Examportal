<?php
     include('session.php');
	 $name=$_GET['name'];
      $sql = "UPDATE school_entries SET payment='1' WHERE username='$name'";
	  if(!mysqli_query($con,$sql)){
	    die('Error: ' . mysqli_error($con));      
       }
      else{
          header("Location: school.php");
      }
 ?>