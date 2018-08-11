<?php
  session_start();
  $servername="localhost";
  $serverusername="root";
  $serverpassword="";
  $level=$_GET['level'];
  $level1=$level."a";
  $name=$_GET['name'];
  $con =mysqli_connect($servername,$serverusername,$serverpassword,"examstudent");
	 if(mysqli_connect_errno()){
		 echo "Failed to connect to MYSQL: ". mysqli_connect_error();
	 }
     //section1:
	 $query1 = "SELECT * FROM $name WHERE section='section1'"; 
     if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query1);
     //section2:
     $query2 = "SELECT * FROM $name WHERE section='section2'"; 
     if(!mysqli_query($con,$query2)){
	   die('Error: ' . mysqli_error($con));
     }
     $result2=mysqli_query($con,$query2);
     //section3:
     $query3 = "SELECT * FROM $name WHERE section='section2'"; 
     if(!mysqli_query($con,$query3)){
	   die('Error: ' . mysqli_error($con));
     }
     $result3=mysqli_query($con,$query3);
     
     //calculating skills of the person:
     $level1=$level."q";
    $con1 =mysqli_connect($servername,$serverusername,$serverpassword,$level1);
	 if(mysqli_connect_errno()){
		 echo "Failed to connect to MYSQL: ". mysqli_connect_error();
	 }
 ?>
 <html>
     <head>
      <title>Marks Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="form.css" type="text/css">
     <style>
	  img {
       opacity: 0.5;
       filter: alpha(opacity=50); /* For IE8 and earlier */
       }
	  body,html{
		  background:url("file:///C:/Users/insprion/Desktop/intel/intel/assets/css/images/images1.jpg");
		  height :100%;
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
    .wrapText{
      table-layout:fixed;
      width: 70%;
      text-align: center;
      word-wrap: break-word;
    }	 
	
     </style>
     </head>
	 <a href="profile.php" style="color:pink;"><h4>Back to home page</h4></a><br>
</html>

<?php
echo "<h1> $name : <br></h1>";
echo "<h3> Section 1 :</h3>";
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Attempted</th>";
    echo"<th>Unattempted</th>";
    echo"<th>Score</th>";
	echo"<th>Skill1</th>";
	echo"<th>Skill2</th>";
	echo"<th>Skill3</th>";
    echo"<th>Skill4</th>";
    echo"<th>Skill5</th>";
  echo "</tr>";
  
    $unattempted=0;
    $attempted=0;
    $skill1q=0;
    $skill2q=0;
    $skill3q=0;
    $skill4q=0;
    $skill5q=0;
    $skill1a=0;
    $skill2a=0;
    $skill3a=0;
    $skill4a=0;
    $skill5a=0;
    $score=0;
    while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
       if($row['answer']=="")
         $unattempted++;
       else
         $attempted++;
       $score+=$row['score'];
       $temp=$row['id'];
       $query3 = "SELECT * FROM section1 WHERE id='$temp'";        
       $result=mysqli_query($con1,$query3);
       $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
       if($row1['skill1']!=0)
           $skill1q++;
       if($row1['skill1']!=0 && $row['score']==1)
           $skill1a++;
       
       if($row1['skill2']!=0)
           $skill2q++;
       if($row1['skill2']!=0 && $row['score']==1)
           $skill2a++;
               
        if($row1['skill3']!=0)
           $skill3q++;
       if($row1['skill3']!=0 && $row['score']==1)
           $skill3a++;
               
        if($row1['skill4']!=0)
           $skill4q++;
       if($row1['skill4']!=0 && $row['score']==1)
           $skill4a++;
               
        if($row1['skill5']!=0)
           $skill5q++;
       if($row1['skill5']!=0 && $row['score']==1)
           $skill5a++;           
    } 
	  echo "<tr>";	
	  echo "<td>$attempted</td>";
	  echo "<td>$unattempted</td>";
	  echo "<td>$score</td>";
	  echo "<td>{$skill1a} / {$skill1q}</td>";
      echo "<td>{$skill2a} / {$skill2q}</td>";
      echo "<td>{$skill3a} / {$skill3q}</td>";
      echo "<td>{$skill4a} / {$skill4q}</td>";
      echo "<td>{$skill5a} / {$skill5q}</td>";
      echo "</tr>";
     
echo "</table>";
     echo "<br><br><br>";
//section2:
echo "<h3> Section 2 :<br></h3>";
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Attempted</th>";
    echo"<th>Unattempted</th>";
    echo"<th>Score</th>";
	echo"<th>Skill1</th>";
	echo"<th>Skill2</th>";
	echo"<th>Skill3</th>";
    echo"<th>Skill4</th>";
    echo"<th>Skill5</th>";
  echo "</tr>";
  
    $unattempted=0;
    $attempted=0;
    $skill1q=0;
    $skill2q=0;
    $skill3q=0;
    $skill4q=0;
    $skill5q=0;
    $skill1a=0;
    $skill2a=0;
    $skill3a=0;
    $skill4a=0;
    $skill5a=0;
    $score=0;
    while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
         if($row['answer']=="")
         $unattempted++;
       else
         $attempted++;
       $score+=$row['score'];
       $temp=$row['id'];
       $query3 = "SELECT * FROM section2 WHERE id='$temp'";        
       $result=mysqli_query($con1,$query3);
       $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
       if($row1['skill1']!=0)
           $skill1q++;
       if($row1['skill1']!=0 && $row['score']==1)
           $skill1a++;
       
       if($row1['skill2']!=0)
           $skill2q++;
       if($row1['skill2']!=0 && $row['score']==1)
           $skill2a++;
               
        if($row1['skill3']!=0)
           $skill3q++;
       if($row1['skill3']!=0 && $row['score']==1)
           $skill3a++;
               
        if($row1['skill4']!=0)
           $skill4q++;
       if($row1['skill4']!=0 && $row['score']==1)
           $skill4a++;
               
        if($row1['skill5']!=0)
           $skill5q++;
       if($row1['skill5']!=0 && $row['score']==1)
           $skill5a++;           
    }
      echo "<tr>";	
	  echo "<td>$attempted</td>";
	  echo "<td>$unattempted</td>";
	  echo "<td>$score</td>";
	  echo "<td>{$skill1a} / {$skill1q}</td>";
      echo "<td>{$skill2a} / {$skill2q}</td>";
      echo "<td>{$skill3a} / {$skill3q}</td>";
      echo "<td>{$skill4a} / {$skill4q}</td>";
      echo "<td>{$skill5a} / {$skill5q}</td>";
      echo "</tr>";
      
echo "</table>";
echo "<br><br><br>";
//Section3:

echo "<h3> Section 3 : <br></h3>";
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Attempted</th>";
    echo"<th>Unattempted</th>";
    echo"<th>Score</th>";
	echo"<th>Skill1</th>";
	echo"<th>Skill2</th>";
	echo"<th>Skill3</th>";
    echo"<th>Skill4</th>";
    echo"<th>Skill5</th>";
  echo "</tr>";
  
    $unattempted=0;
    $attempted=0;
    $skill1q=0;
    $skill2q=0;
    $skill3q=0;
    $skill4q=0;
    $skill5q=0;
    $skill1a=0;
    $skill2a=0;
    $skill3a=0;
    $skill4a=0;
    $skill5a=0;
    $score=0;
    while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
       if($row['answer']=="")
         $unattempted++;
       else
         $attempted++;
       $score+=$row['score'];
       $temp=$row['id'];
       $query3 = "SELECT * FROM section3 WHERE id='$temp'";        
       $result=mysqli_query($con1,$query3);
       $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
       if($row1['skill1']!=0)
           $skill1q++;
       if($row1['skill1']!=0 && $row['score']==1)
           $skill1a++;
       
       if($row1['skill2']!=0)
           $skill2q++;
       if($row1['skill2']!=0 && $row['score']==1)
           $skill2a++;
               
        if($row1['skill3']!=0)
           $skill3q++;
       if($row1['skill3']!=0 && $row['score']==1)
           $skill3a++;
               
        if($row1['skill4']!=0)
           $skill4q++;
       if($row1['skill4']!=0 && $row['score']==1)
           $skill4a++;
               
        if($row1['skill5']!=0)
           $skill5q++;
       if($row1['skill5']!=0 && $row['score']==1)
           $skill5a++;           
    }
	  echo "<tr>";	
	  echo "<td>$attempted</td>";
	  echo "<td>$unattempted</td>";
	  echo "<td>$score</td>";
	  echo "<td>{$skill1a} / {$skill1q}</td>";
      echo "<td>{$skill2a} / {$skill2q}</td>";
      echo "<td>{$skill3a} / {$skill3q}</td>";
      echo "<td>{$skill4a} / {$skill4q}</td>";
      echo "<td>{$skill5a} / {$skill5q}</td>";
      echo "</tr>";
echo "</table>";

?>