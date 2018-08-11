<?php
   include('../session.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $reg = mysqli_real_escape_string($con,$_POST['reg']);
      $class = mysqli_real_escape_string($con,$_POST['class']);   
      $level1='0';   
      if($class=='5'||$class=='6')
        $level1='level0';
      if($class=='7'||$class=='8')
        $level1='level1';
      if($class=='9'||$class=='10')
        $level1='level2';
      if($class=='11'||$class=='12')
        $level1='level3';
        
       $sub="pro_ans";
       $sql="SELECT * FROM $sub WHERE reg='$reg' AND username='$username'";
       echo $sql;
       $result=mysqli_query($con,$sql);
       $count=mysqli_num_rows($result);
       if($count>0){
           $sql="UPDATE pro_ans SET duration='300', score='0',ques='1' WHERE username='$username' AND reg='$reg'";
           mysqli_query($con,$sql);
           $sub=$level."_sub_ans";
           $sql="UPDATE $sub SET duration='2400',ques='1' WHERE username='$username' AND reg='$reg'";
           mysqli_query($con,$sql);
           $sub=$level."_integer_ans";
           $sql="UPDATE $sub SET duration='600',score='0',a1='-1',a2='-1',ques='1' WHERE username='$username' AND reg='$reg'";
           mysqli_query($con,$sql);
           $sub=$level."_memory_ans";
           $sql="UPDATE $sub SET duration='150',duration1='150',shown='0',shown1='0',ques='1' WHERE username='$username' AND reg='$reg'";
           //echo  $sql;
           mysqli_query($con,$sql);
           header("location: ../instructions.php");
          }
       else{   
         if($level1=='level0'){
            $sql="SELECT * FROM level0_sub_ans WHERE reg='$reg' AND username='$username'";
            echo $sql;
            $result=mysqli_query($con,$sql);
            $count=mysqli_num_rows($result);
           if($count>0){ 
              $sql="UPDATE level0_sub_ans SET duration='3600',ques='1' WHERE username='$username' AND reg='$reg'";
           //echo  $sql;
              mysqli_query($con,$sql);
              header("location: ../level0/sub.php");
           }
          else{ 
           $sub=$level."_sub_ans";
           $sql = "INSERT INTO $sub (username,reg,level) VALUES ('$username', '$reg', '$level1')";
           $result2 = mysqli_query($con,$sql);
           if (!($result2)){
          
             echo("Error description: " . mysqli_error($con));
           }
           else
             header("location: ../level0/sub.php");  
           }  
         }
    else{   
      $sql = "INSERT INTO pro_ans (username,reg,level) VALUES ('$username', '$reg', '$level1')";  
      $result1 = mysqli_query($con,$sql);
      $sub=$level."_sub_ans";
      $sql = "INSERT INTO $sub (username,reg,level) VALUES ('$username', '$reg', '$level1')";
      $result2 = mysqli_query($con,$sql);
      $sub=$level."_memory_ans";   
      $sql = "INSERT INTO $sub (username,reg,level) VALUES ('$username', '$reg', '$level1')";
      $result3 = mysqli_query($con,$sql);
      $sub=$level."_integer_ans";
      $sql = "INSERT INTO $sub (username,reg,level) VALUES ('$username', '$reg', '$level1')";
      $result4 = mysqli_query($con,$sql);   
       // echo $sql;    
       if (!($result1 && $result2 && $result3 && $result4)){
          echo "You have already registered.";
          echo("Error description: " . mysqli_error($con));
       }
       else
         header("location: ../instructions.php");
      }
    }
   }
?>
