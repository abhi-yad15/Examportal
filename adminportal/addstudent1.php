<?php
    include('session.php');
//get values passes from addstudent.php
if($_SERVER["REQUEST_METHOD"] == "POST") {
     $name=$_POST['name'];
     $username=$_POST['username'];
	 $password=$_POST['password'];
	 $level=$_POST['level'];
	 $region=$_POST['region'];
    $dur=$_POST['duration'];
	 //to prevent mysql injection
	 $username=stripcslashes($username);
	 $password=stripcslashes($password);
     //connecting to add the information:
	 $username=mysqli_real_escape_string($con,$username);
	 $password=mysqli_real_escape_string($con,$password);
    //adding to details:
    $duration= 60* (int)$dur;
     $sql="INSERT INTO details (username,level,duration) VALUES ('$username', '$level','$duration')";
		if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else{
			echo "Student Added to details:<br><br>";
		}
    
        //adding to login:
        $sql="INSERT INTO login (username,password) VALUES ('$username','$password')";
		if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else{
			echo "Username Added to login:<br><br>";
		}
    
        //adding to entries:
        $sql="INSERT INTO entries (username,level,name) VALUES ('$username','$level','$name')";
		if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else{
			echo "Username Added to Entries:<br><br>";
		}
       $sql2="CREATE TABLE `".$username."` (id INT(11),sno INT(11),section varchar(20),answer text(1000),score INT(5) DEFAULT '0')";
       
       if(!mysqli_query($con,$sql2)){
			die('Error: ' . mysqli_error($con));
		}
		else{
			echo "Table $username Created:<br><br>";
		}
       // $sql ="ALTER TABLE {$username} MODIFY sno INT NOT NULL AUTO_INCREMENT";
        //if(!mysqli_query($con,$sql)){
			//die('Error: ' . mysqli_error($con));
		//}
        //increasing number in student:
	     $query = "SELECT * FROM students WHERE type='$level'";
	     $result=mysqli_query($con,$query);
	     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	     $temp=$row['count'];
	     $temp++;
         $sql = "UPDATE students SET count='$temp' WHERE type='$level'";
	     if(!mysqli_query($con,$sql)){
	       die('Error: ' . mysqli_error($con));
	     }
        
//print_r( UniqueRandomNumbersWithinRange(1,100,10) );
    //section1
        $numbers=UniqueRandomNumbersWithinRange(1,100,10) ;
        $i=0;
        $j=0;
        while($i<10){
         $j++;    
         $sql="INSERT INTO $username (id,sno,section) VALUES ('$numbers[$i]','$j','section1')";
		 if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		 }   
            $i++;
        }
       //section2
        $numbers=UniqueRandomNumbersWithinRange(1,100,10) ;
        $i=0;
        while($i<10){
         $j++;    
         $sql="INSERT INTO $username (id,sno,section) VALUES ('$numbers[$i]','$j','section2')";
		 if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		 }   
            $i++;
        }    
        //section3
        $numbers=UniqueRandomNumbersWithinRange(1,100,10) ;
        $i=0;
        while($i<10){
         $j++;    
         $sql="INSERT INTO $username (id,sno,section) VALUES ('$numbers[$i]','$j','section3')";
		 if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		 }   
            $i++;
        }
        echo ' <a href="profile.php">Back to HomePage</a>';
        echo "<br><br><br>";	  
	   //echo ' <a href="print.php"?name=' . $subtype . '>Back to Previous Page</a>';     	 
     
 }
?>
<html>
   
   <head>
      <title>Add Student Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
      
   </head>
    
</html>
<?php
  function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
?>