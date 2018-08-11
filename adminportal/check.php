<?php
     include("session.php");
     $level=$_POST['level'];
     $type=$_POST['type1'];
     $level1=$level."q";
     $sampletestn="";
     if($type=="sampletest"){
         $sampletestn=$_POST['sampletestn'];
         $level1=$level1."_".$sampletestn;
     }
     $query="SELECT * FROM details WHERE level='$level'";
     $result=mysqli_query($con,$query);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $username=$row['username'];
        if($type=="round2"){
        $query="SELECT * FROM $username";
        $result1=mysqli_query($con,$query);
        while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
          $id=$row1['id'];
          $section=$row1['section'];
          $section1=$level1+"_"+$section;    
          $query="SELECT * FROM $section1 WHERE id='$id'";
          $result2=mysqli_query($con1,$query);
          $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
          if($row2['answer']==$row1['answer']){
              $score=$row2['score'];
              $sql = "UPDATE `".$username."` SET score='$score' WHERE id='$id'";
              mysqli_query($con,$sql);
          }
         }
        }
        else{
          $username=$sampletestn."_".$username;
          $query="SELECT * FROM $username";
          $result1=mysqli_query($con,$query);
          while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
            $id=$row1['id'];
            $section1=$level1;    
            $query="SELECT * FROM $section1 WHERE id='$id'";
            $result2=mysqli_query($con1,$query);
            $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
            if($row2['answer']==$row1['answer']){
              $score=$row2['score'];    
              $sql = "UPDATE `".$username."` SET score='$score' WHERE id='$id'";
              mysqli_query($con,$sql);
          }
         }    
        } 
      }
      header("Location: level.php");   
?>
