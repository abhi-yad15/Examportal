<?php
    include('session.php');
//get values passes from addstudent.php
if($_SERVER["REQUEST_METHOD"] == "POST") {
     $test=$_POST['type1'];
     $question=$_POST['question'];
     $score=$_POST['score'];
     $level=$_POST['level'];
     $type=$_POST['type'];
     $skill1=$_POST['skill1'];
     $skill2=$_POST['skill2'];
     $skill3=$_POST['skill3'];
     $skill4=$_POST['skill4'];
     $skill5=$_POST['skill5'];
    if($test=="round2"){ 
     $section=$_POST['section'];    
     $level1=$level."q";
    //adding to details:
    $sql=""; 
    $section1=$level1."_".$section;
    if($type=="optional"||$type=="multiple"){ 
     $option1=$_POST['option1'];
     $option2=$_POST['option2'];
     $option3=$_POST['option3'];
     $option4=$_POST['option4'];
	 $answer=$_POST['answer'];
     if($type=="optional")
        $type="1";
     else
         $type="2";
     $sql="INSERT INTO {$section1} 
     (question,score,option1,option2,option3,option4,answer,type,skill1,skill2,skill3,skill4,skill5) VALUES ('$question',$score ,'$option1','$option2','$option3','$option4','$answer','$type','$skill1','$skill2','$skill3','$skill4','$skill5')";
    }
     else{
         $type="3";
         $answer=$_POST['answer1'];
         $sql="INSERT INTO {$section1} (question,score,answer,type,skill1,skill2,skill3,skill4,skill5) VALUES ('$question','$score','$answer','$type','$skill1','$skill2','$skill3','$skill4','$skill5')";
        
     }
		if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else{
			echo "Question Added to $level:<br><br>";
		}
    }
      else{   
        //adding to details:
        $sampletestn=$_POST['sampletestn'];  
        $sampletestn=$level."q_".$sampletestn;  
        $sql=""; 
        if($type=="optional"){ 
          $option1=$_POST['option1'];
          $option2=$_POST['option2'];
          $option3=$_POST['option3'];
          $option4=$_POST['option4'];
	      $answer=$_POST['answer'];    
          $sql="INSERT INTO {$sampletestn} (question,score,option1,option2,option3,option4,answer,type,skill1,skill2,skill3,skill4,skill5) VALUES ('$question',$score ,'$option1','$option2','$option3','$option4','$answer','$type','$skill1','$skill2','$skill3','$skill4','$skill5')";
    }
     else{
         $answer=$_POST['answer1'];
         $sql="INSERT INTO {$sampletestn} (question,score,answer,type,skill1,skill2,skill3,skill4,skill5) VALUES ('$question','$score','$answer','$type','$skill1','$skill2','$skill3','$skill4','$skill5')";
        
     }
		if(!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else{
			echo "Question Added to $level:<br><br>";
        }       
  }
        header('Location:addquestion.php')
        echo ' <a href="profile.php">Back to HomePage</a>';
        echo "<br><br><br>";	  
	   //echo ' <a href="print.php"?name=' . $subtype . '>Back to Previous Page</a>';     	 
     
 }
?>
<html>
   
   <head>
      <title>Add Question Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
      
   </head>
    
</html>