<?php
     include('session.php');
	 $level=$_GET['name'];
	 $query = "SELECT * FROM entries WHERE level='$level'";
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result=mysqli_query($con,$query);
 ?>
 <html>
     <head>
      <title>Data Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="form.css" type="text/css">
     <style>
	  img {
       opacity: 0.5;
       filter: alpha(opacity=50); /* For IE8 and earlier */
       }
	  body,html{
		  background:url("Image/images1.jpg");
		  height :100%;
		  background-position: center;
          background-repeat: repeat;
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
    .wrapText{
      table-layout:fixed;
      width: 70%;
      word-wrap: break-word;
      text-align: center;    
    }	 
	
     </style>
     </head>
	 <a href="profile.php" style="color:pink;"><h4>Back to home page</h4></a><br><br>
</html>

<?php
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Name</th>";
    echo"<th>Level</th>";
    echo"<th>Email</th>";
	echo"<th>Contact</th>";
    echo"<th>School</th>";
  echo "</tr>";
     $rank=1;
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){    
	  echo "<tr>";	
	  $temp1=$row['name'];
	  echo "<td>$temp1</td>";
	  $temp=$row['level'];
	  echo "<td>$temp</td>";
	  $temp=$row['email'];
	  echo "<td>$temp</td>";
	  $temp=$row['contact'];
	  echo "<td>$temp</td>";
      $temp=$row['schoolname'];
	  echo "<td>$temp</td>";
      echo "</tr>";
	 }
    
echo "</table>";

?>