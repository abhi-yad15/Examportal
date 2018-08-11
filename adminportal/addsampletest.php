<?php
 include('session.php');
 $name=$_POST['name'];
 $level=$_POST['level'];
 $sql="INSERT INTO sampletest (name,level) VALUES ('$name','$level')";
 if(!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
 }
 $name1=$level."q_".$name;
 $sql="CREATE TABLE `".$name1."` (id INT(11) NOT NULL AUTO_INCREMENT,type varchar(100),question text,option1 varchar(1000) DEFAULT '0' ,option2 varchar(1000) DEFAULT '0',option3 varchar(1000) DEFAULT '0' NOT NULL,option4 varchar(1000) DEFAULT '0' NOT NULL, answer text,skill1 INT(11) DEFAULT '0',skill2 INT(11) DEFAULT '0',skill3 INT(11) DEFAULT '0',skill4 INT(11) DEFAULT '0',skill5 INT(11) DEFAULT '0',score INT(11),primary key(id))";
 
 if(!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
 }
 $sql="SELECT * FROM entries WHERE level='$level'";
 $result=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
   $username=$row['username'];
   $name1=$name."_".$username;     
   $sql="CREATE TABLE `".$name1."` (id INT(11),sno INT(11),answer text,score INT(11) DEFAULT '0')"; 
   if(!mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
   }   
 }
  $name1=$name1."_score";
  $sql7="ALTER TABLE details ADD $name1 INT(11) DEFAULT '0'";
  if(!mysqli_query($con,$sql7)){
     die('Error: ' . mysqli_error($con));
  }
 header('Location: profile.php');
?>