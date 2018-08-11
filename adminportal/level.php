<?php
  include('session.php');
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

    <title>Level Page:</title>

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
	  </style>
      <script type="text/javascript">
        function show(table){
            document.getElementById(table).style.display="block";    
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
            <li><a href="notification.php">NOTIFICATION:</a></li>
            <li class="active"><a href="level.php">LEVEL:</a></li>		
          </ul>
        </nav>
      </div>
   <div class="row">
       <br /><br /><br />
   <div class="col-md-3">     
    <h1>View Result</h1>
    <form action = "view.php" method = "post">
        <h4><label>Test Type:</label></h4><select name="type1" id="target1"style="width:300px;" required>
                      <option value="">Select...</option>
                      <option value="sampletest" >SampleTest</option>
                      <option value="round2" >Round2</option>   
        </select>
        <br /><br />
        <div id="sampletest" class="inv">
        <h4><label>SampleTestName.:</label></h4><select name="sampletestn" style="width:300px;" required>
                      <?php 
                         $sql="SELECT * FROM sampletest";
                         $result=mysqli_query($con,$sql);
                         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $sampletestn=$row['name'];
                             ?>
                            <option value="<?php echo $sampletestn; ?>"><?php echo $sampletestn; ?></option>
                            <?php
                         }
                       ?>
                    </select> <br><br>
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
                   
        <h4><label>Level:</label></h4><select name="level" style="width:300px;" required>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>   
                   </select> <br><br>
          <input type = "submit" value = " Submit " class="btn btn-block btn-primary" style="width:300px;"/><br />
       </form>
    </div>
    <div class="col-md-4 col-md-offset-1"> 
    <h1>Check Task "Objective":</h1>
    <form action = "addquestion1.php" method = "post" >
        <h4><label>Test Type:</label></h4><select name="type1" id="target1"style="width:300px;" required>
                      <option value="">Select...</option>
                      <option value="sampletest" >SampleTest</option>
                      <option value="round2" >Round2</option>   
        </select>
        <br /><br />
        <div id="sampletest" class="inv">
        <h4><label>SampleTestName.:</label></h4><select name="sampletestn" style="width:300px;" required>
                      <?php 
                         $sql="SELECT * FROM sampletest";
                         $result=mysqli_query($con,$sql);
                         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $sampletestn=$row['name'];
                             ?>
                            <option value="<?php echo $sampletestn; ?>"><?php echo $sampletestn; ?></option>
                            <?php
                         }
                       ?>
                    </select> <br><br>
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
                   
        <h4><label>Level:</label></h4><select name="level" style="width:300px;" required>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>   
                   </select> <br><br>
        <input type = "submit" value = " Submit " class="btn btn-block btn-primary" style="width:300px;"/><br />
      </form>
    </div>
   <!--<div class="me" style="position: absolute; top: 100; left: 200; width: 100px; ">  
        <h1><a href="level1.php">Level1:</a></h1>    
        <h1><a href="level2.php">Level2:</a></h1>
        <h1><a href="level3.php">Level3:</a></h1>
       <br /><br /><br /><br /><br /> 
       <h3>Check Task:</h3>      
      <?php
        /*
            $temp="level1";
            echo '<h4><a href="answers.php?level=' . $temp . '">Level1:</a><br></h4>';
            $temp="level2";
            echo '<h4><a href="answers.php?level=' . $temp . '">Level2:</a><br></h4>';
            $temp="level3";
            echo '<h4><a href="answers.php?level=' . $temp . '">Level3:</a><br></h4>';
     */?>
      
    </div>
     -->
              
        <div class="col-md-3 col-md-offset-1">
          <a href="#" onclick='show("table1");'style="color:red;"><h1>Subjective:Level1</h1></a><br>   
        <div class="subjective" id="table1" style="display:none;">   
        <?php
          $level="level1";    
          $query = "SELECT * FROM entries WHERE level='$level'"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $temp=$row['name'];
            $temp1=$row['username'];  
            echo '<td> <a href="show.php?username=' . $temp1 . '">' . $temp . '</a></td>';  
            echo "<br><br>";  
          }  
        ?>    
        </div>
           <a href="#" onclick='show("table2");'style="color:red;"><h1>Subjective:Level2</h1></a><br>
        <div class="subjective" id="table2" style="display:none;">   
        <?php
          $level="level2";    
          $query = "SELECT * FROM entries WHERE level='$level'"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $temp=$row['name'];
            $temp1=$row['username'];  
            echo '<td> <a href="show.php?username=' . $temp1 . '">' . $temp . '</a></td>';  
            echo "<br><br>";  
          }  
        ?>    
        </div>
         <a href="#" onclick='show("table3");'style="color:red;"><h1>Subjective:Level3</h1></a><br>    
        <div class="subjective" id="table3" style="display:none;">   
        <?php
          $level="level3";    
          $query = "SELECT * FROM entries WHERE level='$level'"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $temp=$row['name'];
            $temp1=$row['username'];  
            echo '<td> <a href="show.php?username=' . $temp1 . '">' . $temp . '</a></td>';  
            echo "<br><br>";  
          }  
        ?>    
        </div>    
      </div>
      </div>
    </div>
      </body>
  </html> 
