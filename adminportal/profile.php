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

    <title>Profile Page:</title>

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
         width: 100%;
         word-wrap: break-word;
         padding-left: 120px;
         text-align:center;
      }	      
      .inv{
           display: none;
      }
	  </style>
  </head>
  <body>
<div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="profile.php">HOME:</a></li>
            <li><a href="school.php">SCHOOL:</a></li>        
            <li><a href="notification.php">NOTIFICATION:</a></li>
            <li><a href="level.php">LEVEL:</a></li>		
          </ul>
        </nav>
      </div>
	 <!--<h3><a href="addstudent.php">Add Student:</a></h3><br/>-->
    <div class="row">
    <div class="col-md-3">    
     <h3><a href="addquestion.php">Add Question:</a></h3><br/>
     <form action = "addsampletest.php" method = "post">
    <h4><label>Add Sample Test:</label></h4><input type="text" name="name" style="width:200px;"0 placeholder="SampleTest.." required/>
    <h4><label>Level:</label></h4><select name="level" style="width:200px;" required>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>
                    </select> <br>     
    <input type = "submit" value = " Submit " style="width:200px;" class="btn btn-block btn-primary"/><br />     
    <br /><br /><br />
    </form>
    <form action = "prepare.php" method = "post">
    <h4><label>Prepare QuestionPaper:</label></h4><select name="type" id="target" style="width:200px;" required>
                      <option value="">Select...</option>
                      <option value="sampletest">Sample Test</option>
                      <option value="round2">Round 2</option>
                    </select> <br>
              <div id="sampletest" class="inv">   
                <h4><label>Sample Test Name:</label></h4>
                  <select name="sampletestn" style="width:200px;" required>
                    <?php
                     $sql="SELECT * FROM sampletest";
                     $result=mysqli_query($con,$sql);
                     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                       $name=$row['name'];
                      ?>
                        <option value="<?php echo $name;?>"><?php echo $name;?></option>
                      <?php
                     }       
                    ?>
                     </select> ><br>
                 <h4><label>No. of Questions:</label></h4><input type="text" name="number" style="width:200px;" required/>
                  <h4><label>Duration in minutes:</label></h4><input type="text" name="time" style="width:200px;" required/>
                  <h4><label>Level:</label></h4><select name="level" style="width:200px;" required>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>
                    </select> <br>
                  </div>
                <div id="round2" class="inv">   
                <h4><label>Round2:</label></h4><select name="day" style="width:200px;" required>
                  <option value="1">Day1</option>
                  <option value="2">Day2</option>
                     </select> <br>
                    <h3>No. of Questions:</h3>
                    <h4><label>Section 1:</label></h4><input type="text" name="section1" style="width:200px;" required/>
                    <h4><label>Section 2:</label></h4><input type="text" name="section2" style="width:200px;" required/>
                    <h4><label>Section 3:</label></h4><input type="text" name="section3" style="width:200px;" required/>
                    <h4><label>Duration in minutes:</label></h4><input type="text" name="time" style="width:200px;" required/>
                  </div>
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
        <input type = "submit" value = " Submit " style="width:200px;" class="btn btn-block btn-primary"/><br />
               </form>
        </div>
	 <a href="logout.php"><h4 style="position: absolute; top: 0; right: 0; width: 100px; text-align:right;">SignOut:</h4> </a><br>
	   <a href="changepassword.php"><h4 style="position: absolute; top: 70; right: 50; width: 100px; text-align:right;">ChangePassword:</h4> </a><br>
    <div class="col-md-3 col-md-offset-1">
	  <?php
          echo "<table border =\"1\" class=\"wrapText\">";
          echo "<tr>";
          echo "<td><b>Level</b></td>";
          echo"<td><b>Strength</b></td>";
          echo "</tr>";
          //connecting to database:
	      $query = "SELECT * FROM students"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              $temp=$row['type'];
              $temp1=$row['count'];
	          echo "<tr>";
	          echo '<td> <a href="print.php?name=' . $temp . '">' . $temp . '</a></td>';	
	          echo "<td>$temp1</td>";
	          echo "</tr>";
	      }
    
          echo "</table>";
     ?>
          
      <br />
    </div>
    </div>
      </div>
      </body>
  </html> 
