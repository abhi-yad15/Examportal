<?php
 include('session.php');
     $type=$_POST['type1'];
	 $level=$_POST['level'];
     $all=$_POST['all'];
     $sampletest="";
     $school="";
     if($all=="schoolwise")
        $school=$_POST['school'];
     if($type=="sampletest")
        $sampletest=$_POST['sampletestn'];
    $query="";
    if($type=="sampletest" && $all=="all"){
      $score=$sampletest."_score";    
	  $query = "SELECT * FROM details WHERE level='$level' ORDER BY $score DESC";
    }
    if($type=="sampletest" && $all=="schoolwise"){
      $score=$sampletest."_score";    
	  $query = "SELECT * FROM details WHERE level='$level' AND school='$school' ORDER BY $score DESC";
    }
    if($type=="round2" && $all=="all"){
      $score="score";    
	  $query = "SELECT * FROM details WHERE level='$level' ORDER BY $score DESC";
    }
    if($type=="round2" && $all=="schoolwise"){
      $score="score";    
	  $query = "SELECT * FROM details WHERE level='$level' AND school='$school' ORDER BY $score DESC";
    }
    

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
	echo"<th>Score</th>";
	echo"<th>Delete</th>";
    echo"<th>Rank</th>";
  echo "</tr>";
     $rank=1;
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);    
	  echo "<tr>";	
	  $temp1=$row['name'];
	  echo "<td>$temp1</td>";
	  $temp=$row['level'];
	  echo "<td>$temp</td>";
	  $temp=$row['email'];
	  echo "<td>$temp</td>";
	  $temp=$row['contact'];
	  echo "<td>$temp</td>";
      $temp=$row1['score'];
	  echo "<td>$temp</td>";
      $temp1=$row['username'];     
	  echo '<td> <a href="delete.php?name=' . $temp1 . '& type=' .$level.'">Delete</a></td>';
	  echo "<td>$rank</td>";
      $rank++;     
      echo "</tr>";
	 }
    
echo "</table>";

?>