<?php
     include('session.php');
     $school=$_POST['school'];
	 $query = "SELECT * FROM details WHERE school='$school'"; 
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result=mysqli_query($con,$query);
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $temp=$row['username']; 
        $query = "SELECT * FROM entries WHERE username='$temp'";
        $result1=mysqli_query($con,$query);
        $row2=mysqli_fetch_array($result1,MYSQLI_ASSOC);  
        $to=$row2['email'];
        $first_name = $_POST['name'];
        $sql="SELECT * FROM login WHERE username='$temp'";
        $result1=mysqli_query($con,$sql);
        $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC); 
        $subject = $first_name.", you have sucessfully registered";
        $message ="Your user name is:" .$row['username'] ."\n\n" ."Your Password is :". $row1['password'];
        $headers = "From: ISCO";
       if(mail($to,$subject,$message,$headers))
         echo "Mail Sent"; 
        //mail($to,$subject,$message,$headers); 
     }
      header('Location: school.php');
?>