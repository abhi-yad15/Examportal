<?php
  include('session.php');
	 $name=$_GET['name'];
     //echo $name;
	 $level=$_GET['type'];
     $query = "DELETE  FROM details WHERE username='$name'"; 
	 
    if(!mysqli_query($con,$query)){
	    die('Error: ' . mysqli_error($con));
    }
	$query = "DELETE  FROM login WHERE username='$name'"; 
	 
    if(!mysqli_query($con,$query)){
	    die('Error: ' . mysqli_error($con));
    }
    $query = "DELETE  FROM entries WHERE username='$name'"; 
	 
    if(!mysqli_query($con,$query)){
	    die('Error: ' . mysqli_error($con));
    }
	//delete from students:
	  $query = "SELECT * FROM students WHERE type='$level'";
	  $result=mysqli_query($con,$query);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $temp=$row['count'];
	  $temp--;
      $sql = "UPDATE students SET count='$temp' WHERE type='$level'";
	  if(!mysqli_query($con,$sql)){
	    die('Error: ' . mysqli_error($con));
      }
	  else{
		  echo "Delete Sucessfull:<br><br><br>";
	  }
	  echo ' <a href="profile.php">Back to HomePage</a>';
      echo "<br><br><br>";	  
	  echo ' <a href="print.php?name=' . $level . '">Back to Previous Page</a>'; 
 ?>
 <html>
     <head>
      <title>Delete Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="form.css" type="text/css">
     <style>
	  img {
       opacity: 0.5;
       filter: alpha(opacity=50); /* For IE8 and earlier */
       }
	  body,html{
		  background:url("file:///C:/Users/insprion/Desktop/intel/intel/assets/css/images/images1.jpg");
		  heigth :100%;
		   background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

	  }
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
.wrapText
{
     table-layout:fixed;
     width: 70%;
     word-wrap: break-word;
}	 
	
}
	  </style>
     </head>
</html>
