 <?php
         
         include('session.php');
         $name=$_GET['name'];
        // echo $name;
         $sql="SELECT * FROM entries WHERE username='$name'";
        $result=mysqli_query($conn,$sql);
        $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        $level=$row['level'];
	 $query = "DELETE  FROM entries WHERE username='$name'"; 
	 //echo $name;
    if(!mysqli_query($conn,$query)){
	    die('Error: ' . mysqli_error($conn));
    }
        // echo $name; 
       
	$query = "DELETE  FROM login WHERE username='$name'"; 
	 
    if(!mysqli_query($conn,$query)){
	    die('Error: ' . mysqli_error($conn));
    }
       $query = "DELETE  FROM details WHERE username='$name'"; 
	 
    if(!mysqli_query($conn,$query)){
	    die('Error: ' . mysqli_error($conn));
    }
	//delete from interns:
	 echo $level;
	  $query = "SELECT * FROM students WHERE type='$level'";
	  $result=mysqli_query($conn,$query);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $temp=$row['count'];
	  echo $temp;
	  $temp--;
	  echo $temp;
	  echo $name;
      $sql = "UPDATE students SET count='$temp' WHERE type='$level'";
	  if(!mysqli_query($conn,$sql)){
	    die('Error: ' . mysqli_error($conn));
      }
	  else{
		  echo "Delete Sucessfull:<br><br><br>";
		  header('Location: delete.php');
	  }
	  
 ?>
