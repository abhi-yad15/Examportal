<?php
 include('session.php');
 ?>
<html>
   
   <head>
      <title>ChangePassword Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
      <style>
	   /* unvisited link */
      a:link {
        color: white;
      }

      /* visited link */
     a:visited {
        color: white;
     }

     /* mouse over link */
     a:hover {
        color: hotpink;
     }

     /* selected link */
     a:active {
        color: blue;
     } 
	  </style>
   </head>
   </html>
<?php
// Create connection
$con = new mysqli($servername, $serverusername, $serverpassword1,$db);
// Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
 }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $oldpassword=$_POST['oldpassword'];
      $newpassword=$_POST['newpassword'];
	  $cnewpassword=$_POST['cnewpassword'];
		$count =1;  
      $query = "SELECT * FROM admin1 "; 
	 
      if(!mysqli_query($con,$query)){
	    die('Error: ' . mysqli_error($con));
      }
      $result=mysqli_query($con,$query);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      $check1=$row['username'];
      $check2=$row['password']; 
      //$oldpassword=md5($oldpassword);
      if($oldpassword==$check2&&$newpassword==$cnewpassword)
		 $count=1;
	  else
		 $count =0;
      if($count == 1) {
		  //$newpassword=md5($newpassword);
         $sql = "UPDATE admin1 SET password='$newpassword' WHERE username='admin'";
		   if(!mysqli_query($con,$sql)){
				 echo "Failed Password Could Not Be Updated!<br>";
			  die('Error: ' . mysqli_error($con));
		    }
			echo "Password Changed";
         header("location: profile.php");
      }else {
         echo "Your Old Password is Wrong  or New Passwords are not same<br><br><br>";
		 echo ' <a href="changepassword.php">Back to ChangePassword Page:</a><br><br><br>';
		 echo ' <a href="profile.php">Back to HomePage</a>';
      }
   }
 
?>