<?php
     include('session.php');
	 $school=$_GET['name'];
	 $query = "SELECT * FROM school_entries WHERE username='$school'"; 
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result=mysqli_query($con,$query);
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $username=$row['username'];
	 $query = "SELECT * FROM school_login WHERE username='$username'"; 
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result=mysqli_query($con,$query);
     $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
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
    .wrapText1{
      //table-layout:fixed;
      width: 100%;
      word-wrap: break-word;
      text-align: center;    
    }     
	
     </style>
     </head>
	 <a href="profile.php" style="color:pink;"><h4>Back to home page</h4></a><br><br>
      <div class="wrapText">
          <br /><br /><br />
	  <?php
          echo "<table border =\"1\" class=\"wrapText1\">";
          echo "<tr>";
          echo "<th>School Name</th>";
          echo"<th>Email1</th>";
          echo"<th>Email2</th>";
          echo"<th>Contact1</th>";
          echo"<th>Contact2</th>";
          echo"<th>Address</th>";
          echo"<th>Username</th>";
          echo"<th>Password</th>";
          echo"<th>Designation</th>";
          echo"<th>Addedby</th>";
          echo"<th>Source</th>";
          echo"<th>InternId</th>";
          echo"<th>Payment</th>";
          echo "</tr>";
          echo "<tr>";
          $schoolname=$row['username'];
          $temp=$row['name'];
          echo "<td>$temp</td>";
          $temp=$row['addersemail'];
          echo"<td>$temp</td>";
          $temp=$row['email'];
          echo"<td>$temp</td>";
          $temp=$row['phone1'];
          echo"<td>$temp</td>";
          $temp=$row['phone2'];
          echo"<td>$temp</td>";
          $temp=$row['address'];
          echo"<td>$temp</td>";
          $temp=$row['username'];
          echo"<td>$temp</td>";
          $temp=$row1['password'];
          echo"<td>$temp</td>";
          $temp=$row['who'];
          echo"<td>$temp</td>";
          $temp=$row['schooladdedby'];
          echo"<td>$temp</td>";
          $temp=$row['how'];
          echo"<td>$temp</td>";
          $temp=$row['refer'];
          echo"<td>$temp</td>";
          $temp=$row['payment'];
          if($temp==0)
              $temp="NO";
          else
              $temp="YES";
          ?>
          <td> <a href="javascript:AlertIt('<?php echo $schoolname;?>')"><?php echo $temp;?></a></td>
          <?php
          //echo"<td>$temp</td>";
          echo "</tr>";
          	     
          
          echo "</table>";
     ?>
          <script type="text/javascript">
           function AlertIt(temp1) {
		   var val = temp1;
           //document.write(val);			
           var answer = confirm ("Payment will be comfirmed.Do you want to proceed?")
		   
           if (answer){
              window.location="payment.php?name="+val;
		   }
          }
         </script>
     </div>
     <h1>Level:0</h1>
<?php
     $query1 = "SELECT * FROM details WHERE school='$school' AND level='level0'"; 
     if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query1);
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Name</th>";
    echo"<th>Email</th>";
	echo"<th>Contact</th>";
  echo "</tr>";
     while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){  
          $user=$row['username'];
         $query1 = "SELECT * FROM entries WHERE username='$user' AND level='level0'"; 
         if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
        }  
        $result2=mysqli_query($con,$query1);
        $row1 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
	  echo "<tr>";	
	  $temp1=$row1['name'];
	  echo "<td>$temp1</td>";
	  $temp=$row1['email'];
	  echo "<td>$temp</td>";
	  $temp=$row1['contact'];
	  echo "<td>$temp</td>";
      echo "</tr>";
	 }
    
echo "</table>";
    
?>
     <br /> <br /> <br />
<h1>Level:1</h1>
<?php
     $query1 = "SELECT * FROM details WHERE school='$school' AND level='level1'"; 
     if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query1);
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Name</th>";
    echo"<th>Email</th>";
	echo"<th>Contact</th>";
  echo "</tr>";
     while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){  
          $user=$row['username'];
         $query1 = "SELECT * FROM entries WHERE username='$user' AND level='level1'"; 
         if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
        }  
        $result2=mysqli_query($con,$query1);
        $row1 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
	  echo "<tr>";	
	  $temp1=$row1['name'];
	  echo "<td>$temp1</td>";
	  $temp=$row1['email'];
	  echo "<td>$temp</td>";
	  $temp=$row1['contact'];
	  echo "<td>$temp</td>";
      echo "</tr>";
	 }
    
echo "</table>";
    
?>
     <br /> <br /> <br />
<h1>Level:2</h1>
<?php
     $query1 = "SELECT * FROM details WHERE school='$school' AND level='level2'"; 
     if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query1);
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Name</th>";
    echo"<th>Email</th>";
	echo"<th>Contact</th>";
  echo "</tr>";
     while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){ 
           $user=$row['username'];
         $query1 = "SELECT * FROM entries WHERE username='$user' AND level='level2'"; 
         if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
        }  
        $result2=mysqli_query($con,$query1);
        $row1 = mysqli_fetch_array($result2,MYSQLI_ASSOC);   
	  echo "<tr>";	
	  $temp1=$row1['name'];
	  echo "<td>$temp1</td>";
	  $temp=$row1['email'];
	  echo "<td>$temp</td>";
	  $temp=$row1['contact'];
	  echo "<td>$temp</td>";
      echo "</tr>";
	 }
    
echo "</table>";
    
?>
     <br /><br /><br />
<h1>Level:3</h1>
<?php
     $query1 = "SELECT * FROM details WHERE school='$school' AND level='level3'"; 
     if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query1);
 echo "<table border =\"1\" class=\"wrapText\">";
  echo "<tr>";
   echo "<th>Name</th>";
    echo"<th>Email</th>";
	echo"<th>Contact</th>";
  echo "</tr>";
     while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){  
           $user=$row['username'];
         $query1 = "SELECT * FROM entries WHERE username='$user' AND level='level3'"; 
         if(!mysqli_query($con,$query1)){
	   die('Error: ' . mysqli_error($con));
        }  
        $result2=mysqli_query($con,$query1);
        $row1 = mysqli_fetch_array($result2,MYSQLI_ASSOC);  
	  echo "<tr>";	
	  $temp1=$row1['name'];
	  echo "<td>$temp1</td>";
	  $temp=$row1['email'];
	  echo "<td>$temp</td>";
	  $temp=$row1['contact'];
	  echo "<td>$temp</td>";
      echo "</tr>";
	 }
    
echo "</table>";
    
?>
</html>