<?php
     include('session.php');
     $username=$_GET['username'];
     $sql="SELECT *FROM details WHERE username='$username'";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
     $level=$row['level'];
     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $id=$_POST['id'];
        $score=$_POST['score'];
        $sql = "UPDATE {$username} SET score='$score' WHERE id='$id'";
        $result=mysqli_query($con,$sql); 
     }
     $score1=0;
     $score=0;
?>
<html>
   <head>
      <title>Check Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
       <link rel="stylesheet" href="form.css" type="text/css">
       
       <style>
         #table{
             display: none;
         }
           .article {
               margin-left: 500px;
               border-left: 1px solid gray;
               padding: 1em;
               overflow: hidden;
           }
           .left {
               margin-right: 370px;
               border-left: 1px solid gray;
               padding: 1em;
               overflow: hidden;
           }
           .btn {
               background-color: palegreen;
               border-radius: 0px; 
               color: red;
               display: inline-block;
           }

           .btn:hover { color: white; }
           .btn:visited { background-color: blue; }
           #create_btn {
                
               width: 80px;
               height: 40px;
           }
           .button-clicked {
                background-color: red;
            }
       </style>
     <script type="text/javascript">
        function DisplayQ(question,answer,score,id){
            document.getElementById("question").value = question;
            document.getElementById("answer").value = answer;
            document.getElementById("score").value = score;
            document.getElementById("id").value = id;
            document.getElementById("hiddencontainer").value = score;
            var c=document.getElementById("hiddencontainer").value;
            //document.getElementById("create_btn1").innerHTML=document.getElementById("create_btn").className;
            //document.getElementById("create_btn").className="button-clicked";
            //document.write(c);
            $(document).ready(function(){
              $.post('show.php',score);
            });
        }  
       </script>
   </head>
    <body>
        <input type="hidden" id="hiddencontainer" name="hiddencontainer" />
       <div class="row">    
        <!-- Section1-->
       <div class="col-md-6"> 
           <a href="profile.php" style="color:pink;"><h4>Back to home page</h4></a><br><br>
            <a href="level.php" style="color:pink;"><h4>Back to Previous Page</h4></a><br>
        <h3>Section1</h3>
         <?php
            $sql="SELECT *FROM $username WHERE section='section1'";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
               $section1=$level."q_section1";
               $id=$row['id'];    
               $sql="SELECT *FROM $section1 WHERE id='$id'";// AND type='subjective'";
               $result1=mysqli_query($con,$sql);  
               $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
               $question=$row1['question'];
               $answer=$row['answer'];
               $score=$row1['score'];    
               ?>
               <input type='submit' id='create_btn' class="btn" value='<?php echo htmlspecialchars($id);?>' onClick="DisplayQ('<?php echo $question ?>','<?php echo $answer ?>','<?php echo $score ?>','<?php echo $id ?>');">   
             <?php
               // $score1=$_POST['score'];
                //echo $score1;
           } 
          
         ?>
       <h3>Section2</h3>
         <?php
            $sql="SELECT *FROM $username WHERE section='section2'";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
               $section1=$level."q_section2";
               $id=$row['id'];    
               $sql="SELECT *FROM $section1 WHERE id='$id'";// AND type='subjective'";
               $result1=mysqli_query($con,$sql);  
               $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
               $question=$row1['question'];
               $answer=$row['answer'];
               $score=$row1['score'];    
               ?>
               <input type='button' id='create_btn' class="btn" value='<?php echo htmlspecialchars($id);?>' onClick="DisplayQ('<?php echo $question ?>','<?php echo $answer ?>','<?php echo $score ?>','<?php echo $id ?>');">    
               
             <?php 
           } 
          
         
         ?>
       <h3>Section3</h3>
         <?php
            $sql="SELECT *FROM $username WHERE section='section3'";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
               $section1=$level."q_section3";
               $id=$row['id'];    
               $sql="SELECT *FROM $section1 WHERE id='$id'";// AND type='subjective'";
               $result1=mysqli_query($con,$sql);  
               $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
               $question=$row1['question'];
               $answer=$row['answer'];
               $score=$row1['score'];    
               ?>
               <input type='button' id='create_btn' class="btn" value='<?php echo htmlspecialchars($id);?>' onClick="DisplayQ('<?php echo $question ?>','<?php echo $answer ?>','<?php echo $score ?>','<?php echo $id ?>');">    
               
             <?php 
           } 
          
         
         ?>
           
        </div>
           <div class="col-md-6">
               <br><br>
            <h3>Answers: </h3>
            <form action = "" method = "post">
            <label>Id :</label><input type = "text" id="id" name = "id" autofocus reqiured/><br /><br />       
            <label>Question :</label><input type = "text" id="question" name = "question" autofocus required/><br /><br />
            <label>Answer :</label><input type = "text" id="answer" name = "answer" autofocus reqiured/><br /><br />
            <label>Max Score :</label><input type = "text" id="score" name = "score1" autofocus reqiured/><br /><br />   
            <label>Score :</label><input type = "text" id="score1" name = "score" autofocus reqiured/><br /><br />
            <input type = "submit" name ="submit" value = " Update " class="btn btn-block btn-primary"/><br />
               </form>    
        </div>
        
        </div>   
    </body>
</html>