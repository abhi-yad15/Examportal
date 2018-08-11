<?php
//date_default_timezone_set('Asia/Kolkata');
  include('session.php');
  if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])) {
	  $sub=$_POST['sub'];
      $date=$_POST['date'];
      $notification=$_POST['notification'];
      $notification = mb_ereg_replace("'","\'", $notification);
      $type=$_POST['type'];
      $query="";
      if($type=="school1"){  
        $query ="INSERT INTO school_notification(date,sub,description) values('$date','$sub','$notification')";
      }
      else{
          $level=$_POST['level'];
          $query ="INSERT INTO student_notification(date,sub,description,level) values('$date','$sub','$notification','$level')";
      }
  if(!mysqli_query($con,$query)){
	die('Error: ' . mysqli_error($con));
  }
  else{
     echo "Notification Sent Sucessfully.";   
   }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit1'])) {
	  $id=$_POST['id'];
      $sub=$_POST['sub'];
      $date=$_POST['date'];
      $query=$_POST['query'];
      $type=$_POST['type'];
      $answer=$_POST['answer'];
      $answer = mb_ereg_replace("'","\'", $answer);
      $query="";
      if($type=="schoolunsolved"){      
        $query ="SELECT * FROM school_query WHERE id='$id'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $solved=$row['solve'];
        if($solved==0){
         $sql = "UPDATE school_query SET answer='$answer', solve='1' WHERE id='$id'";
         $result=mysqli_query($con,$sql);      
        }  
      }
      else{
        $sql ="SELECT * FROM student_query WHERE id='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $solved=$row['solve'];
        if($solved==0){
         $sql = "UPDATE student_query SET answer='$answer' , solve='1' WHERE id='$id'";
         $result=mysqli_query($con,$sql);
        }
      }
       echo "Query Answered";
  }

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Notification Page:</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="form.css" type="text/css">
     <style>
	   img {
         opacity: 0.5;
         filter: alpha(opacity=50); /* For IE8 and earlier */
       }
	  body,html{
		   background:url("Image/black.jpg");
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
         width: 50%;
         word-wrap: break-word;
         padding-left: 120px;
      }	 
           .inv {
              display: none;
            }  
         
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
        
           .button-clicked {
                background-color: red;
            }
       </style>
     <script type="text/javascript">
        function DisplayQ(id,date,addedby,sub,query,answer){
            document.getElementById("id").value = id;
            document.getElementById("date").value = date;
            document.getElementById("addedby").value = addedby;
            document.getElementById("sub").value = sub;
            document.getElementById("query").value = query;
            document.getElementById("answer").value = answer;
        }  
          </script>
  </head>
  <body>
<div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li><a href="profile.php">HOME:</a></li>
            <li><a href="school.php">SCHOOL:</a></li>        
            <li class="active"><a href="notification.php">NOTIFICATION:</a></li>
            <li><a href="level.php">LEVEL:</a></li>		
          </ul>
        </nav>
      </div>
    
  <div class="row">
   <div class="col-md-5"> 
       <h1>Query</h1>   
    <form action = "" method = "post">
    <h4><label>Select:</label></h4><select name="type" id="target" style="width:200px;" required>
                      <option value="">Select...</option>
                      <option value="schoolsolved">School:Solved</option>
                      <option value="schoolunsolved">School:Unsolved</option>
                      <option value="studentsolved">Student:Solved</option>
                      <option value="studentunsolved">Student:Unsolved</option>
                     </select> <br>
                 <div id="studentsolved" class="inv">
                     
                  <?php 
                    $sql="SELECT * FROM student_query WHERE solve='1'";  
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $id=$row['id'];
                           $temp=$row['sub'];
                           $date=$row['date'];
                           $addedby=$row['username'];
                           $query=$row['description'];
                           $answer=$row['answer'];
                           $answer=json_encode($answer);
                            $query=json_encode($query);
                            $answer = mb_ereg_replace("'","\'", $answer);
                           $query = mb_ereg_replace("'","\'", $query);
                          ?>
                            <input type='button' id='create_btn' class="btn" value='<?php echo htmlspecialchars($temp);?>' onClick="DisplayQ('<?php echo htmlspecialchars($id); ?>','<?php echo $date; ?>','<?php echo $addedby; ?>','<?php echo htmlspecialchars($temp); ?>','<?php echo htmlspecialchars($query); ?>','<?php echo htmlspecialchars($answer); ?>');"> 
                         <?php
	                   }
                       ?>
                     
                   <br>
                  
                </div>   
                 <div id="studentunsolved" class="inv">
                     
                  <?php 
                    $sql="SELECT * FROM student_query WHERE solve='0'";  
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $id=$row['id'];
                           $temp=$row['sub'];
                           $date=$row['date'];
                           $addedby=$row['username'];
                           $query=$row['description'];
                           $answer=$row['answer'];    
                           $answer=json_encode($answer);
                            $query=json_encode($query);         
                           $answer = mb_ereg_replace("'","\'", $answer);
                           $query = mb_ereg_replace("'","\'", $query);
                          ?>
                            <input type='button' id='create_btn' class="btn" value='<?php echo htmlspecialchars($temp);?>' onClick="DisplayQ('<?php echo $id; ?>','<?php echo $date; ?>','<?php echo $addedby;?>','<?php echo htmlspecialchars($temp); ?>','<?php echo htmlspecialchars($query); ?>','<?php echo htmlspecialchars($answer); ?>');"> 
                         <?php
	                   }
                       ?>
                   <br>
                  
                </div>
                <div id="schoolsolved" class="inv">
                     
                  <?php 
                    $sql="SELECT * FROM school_query WHERE solve='1'";  
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $id=$row['id'];
                           $temp=$row['sub'];
                           $date=$row['date'];
                           $addedby=$row['username'];
                           $query=$row['description'];
                           $answer=$row['answer'];
                            $answer=json_encode($answer);
                            $query=json_encode($query);                         
                            $answer = mb_ereg_replace("'","\'", $answer);
                            $query = mb_ereg_replace("'","\'", $query);
                          ?>
                            <input type='button' id='create_btn' class="btn" value='<?php echo htmlspecialchars($temp);?>' onClick="DisplayQ('<?php echo $id; ?>','<?php echo $date; ?>','<?php echo $addedby; ?>','<?php echo htmlspecialchars($temp); ?>','<?php echo htmlspecialchars($query); ?>','<?php echo htmlspecialchars($answer); ?>');"> 
                         <?php
	                   }
                       ?>
                   <br>
                  
                </div> 
                   <div id="schoolunsolved" class="inv">
                     
                  <?php 
                    $sql="SELECT * FROM school_query WHERE solve='0'";  
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $id=$row['id'];
                           $temp=$row['sub'];
                           $date=$row['date'];
                           $addedby=$row['username'];
                           $query=$row['description'];
                           $answer=$row['answer'];
                           $answer=json_encode($answer);
                            $query=json_encode($query);
                           $answer = mb_ereg_replace("'","\'", $answer);
                           $query = mb_ereg_replace("'","\'", $query);
                          ?>
                            <input type='button' id='create_btn' class="btn" value='<?php echo htmlspecialchars($temp);?>' onClick="DisplayQ('<?php echo $id; ?>','<?php echo $date; ?>','<?php echo $addedby; ?>','<?php echo htmlspecialchars($temp); ?>','<?php echo htmlspecialchars($query); ?>','<?php echo htmlspecialchars($answer); ?>');"> 
                         <?php
	                   }
                       ?>
                   <br>
                  
                </div>
                  <label><h4>Date:</h4></label><input type="text" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" /><br>
                  <label><h3>Addedby :</h3></label><input type = "text" id="addedby" name = "addedby"  /><br/><br />
				  <label><h3>Subject :</h3></label><input type = "text" id="sub" name = "sub"  /><br/><br />
				  <label><h3>Query :</h3></label> <textarea  type = "text" id="query" name = "query" cols="30" rows="5" style="height:100px;"></textarea><br>
				  <label><h3>Answer :</h3></label> <textarea  type = "text" id="answer"name = "answer" cols="30" rows="10" style="height:200px;"></textarea><br>
                  <input type="hidden" name="id" id="id" >
                 <input type = "submit" value = " Submit " name="submit1" style="width:200px;" class="btn btn-block btn-primary"/><br />
                  
              <script type="text/javascript">
                        document
                            .getElementById('target')
                            .addEventListener('change', function () {
                                'use strict';
                                var vis = document.querySelector('.vis'),   
                                target = document.getElementById(this.value);
                                if (vis !== null) {
                                    vis.className = 'inv';
                                }
                                if (target !== null ) {
                                    target.className = 'vis';
                                }
                            });
                </script>
               </form>
    </div>
    <div class="col-md-5 col-md-offset-2" > 
       <h1>Notification</h1>   
    <form action = "" method = "post">
    <h4><label>Select:</label></h4><select name="type" id="target1" style="width:200px;" required>
                      <option value="">Select...</option>
                      <option value="school1">School</option>
                      <option value="student1">Student</option>
                     </select> <br>
                 <div id="student1" class="inv">   
                     <h4><label>Level:</label></h4><select name="level" style="width:200px;" required>
                      <option value="level0">Level0</option>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>
                     </select> <br>
                  </div>
              <script type="text/javascript">
                        document
                            .getElementById('target1')
                            .addEventListener('change', function () {
                                'use strict';
                                var vis = document.querySelector('.vis'),   
                                target = document.getElementById(this.value);
                                if (vis !== null) {
                                    vis.className = 'inv';
                                }
                                if (target !== null ) {
                                    target.className = 'vis';
                                }
                            });
                </script>
        <label><h4>Date:</h4></label><input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" /><br>
				  <label><h3>Subject :</h3></label><input type = "text" name = "sub"  /><br/><br />
				  <label><h3>Notification :</h3></label> <textarea  type = "text" name = "notification" cols="30" rows="10" style="height:200px;"></textarea><br>
        <input type = "submit" value = " Submit " name="submit" style="width:200px;" class="btn btn-block btn-primary"/><br />
               </form>
    </div>
   
    <!--
       <div class="me" style="position: absolute; top: 400; right: 200; width: 100px; ">  
    <form action = "mail.php" method = "post">
        <h1>Mail</h1>    
    <h4><label>School:</label></h4><select name="school" style="width:200px;" required>
                      <option value="">Select...</option>
            <?php
                 /*
                  $con =mysqli_connect($servername,$serverusername,$serverpassword,"examstudent");
	               if(mysqli_connect_errno()){
		              echo "Failed to connect to MYSQL: ". mysqli_connect_error();
	               }
	               $query = "SELECT * FROM school"; 	 
                    if(!mysqli_query($con,$query)){
	                   die('Error: ' . mysqli_error($con));
                     }
                      $result=mysqli_query($con,$query);
                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $temp=$row['name'];
                           echo $temp;
                          ?>
                           <option value='<?php echo $temp;?>'><?php echo $temp;?></option>
                         <?php
	                   }
                    */
                       ?>
                   </select> <br>
        <input type = "submit" value = " Submit " style="width:200px;" class="btn btn-block btn-primary"/><br />
               </form>
    </div>
      </div>
      -->
      </div>
      </div>
      </body>
  </html> 
