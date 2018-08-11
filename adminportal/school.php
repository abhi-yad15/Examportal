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

    <title>School Page:</title>

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
         text-align: center;
      }
         .inv {
             display: none;
         }  
         .inv1 {
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
            <li><a href="profile.php">HOME:</a></li>
            <li class="active"><a href="school.php">SCHOOL:</a></li>        
            <li><a href="notification.php">NOTIFICATION:</a></li>
            <li><a href="level.php">LEVEL:</a></li>		
          </ul>
        </nav>
      </div>
<div class="row">    
             
    <div class="col-md-3 ">
        <br /><br /><br />
	  <?php
          echo "<table border =\"1\" class=\"wrapText\">";
          echo "<tr>";
          echo "<td><b>Username Name</b></td>";
          echo "<td><b>School Name</b></td>";
          echo"<td><b>Strength</b></td>";
          echo "</tr>";
          //connecting to database:
	      $query = "SELECT * FROM school_entries"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              $temp=$row['name'];
              $temp3=$row['username'];
              $query = "SELECT * FROM details WHERE school='$temp3'";
              if(!mysqli_query($con,$query)){
	            die('Error: ' . mysqli_error($con));
              }
              $result1=mysqli_query($con,$query);
              $temp1=mysqli_num_rows($result1);
	          echo "<tr>";
	          echo "<td>$temp3</td>";
	          echo '<td> <a href="schooldetails.php?name=' . $temp3 . '">' . $temp . '</a></td>';	
	          echo "<td>$temp1</td>";
	          echo "</tr>";
	      }
    
          echo "</table>";
     ?>
      </div>
       <div class="col-md-3 col-md-offset-1">  
    <form action = "mail.php" method = "post">
        <h1>Mail</h1>    
    <h4><label>School:</label></h4><select name="school" style="width:200px;" required>
                      <option value="">Select...</option>
            <?php
	               $query = "SELECT * FROM school_entries WHERE payment='1' AND mail='0'"; 	 
                    if(!mysqli_query($con,$query)){
	                   die('Error: ' . mysqli_error($con));
                     }
                      $result=mysqli_query($con,$query);
                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $temp=$row['name'];
                           $username=$row['username'];
                          ?>
                           <option value='<?php echo $username;?>'><?php echo $temp;?></option>
                         <?php
	                   }
                       ?>
                   </select> <br>
        <input type = "submit" value = " Submit " style="width:200px;" class="btn btn-block btn-primary"/><br />
               </form>
    </div>
       <div class="col-md-4 col-md-offset-1">  
    <form action = "leaderboard.php" method = "post">
        <h1>Leaderboard</h1> 
        <h4><label>Test Type:</label></h4><select name="type1" id="target1" style="width:300px;" required>
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
                                var vis = document.querySelector('.vis1'),   
                                target1 = document.getElementById(this.value);
                                if (vis !== null) {
                                    vis.className = 'inv';
                                }
                                if (target1 !== null ) {
                                    target1.className = 'vis1';
                                }
                            });
                </script>
             <h4><label>All/Schoolwise:</label></h4><select name="all" id="target" style="width:300px;" required>
                      <option value="">Select...</option>
                      <option value="all" >All</option>
                      <option value="schoolwise" >SchoolWise</option>   
             </select>      
    
        <div class="inv1 " id="schoolwise">
    <h4><label>School:</label></h4><select name="school" style="width:200px;" required>
                      <option value="">Select...</option>
            <?php 
	               $query = "SELECT * FROM school_entries"; 	 
                    if(!mysqli_query($con,$query)){
	                   die('Error: ' . mysqli_error($con));
                     }
                    // echo $query;
                      $result=mysqli_query($con,$query);
                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                           $temp=$row['name'];
                           echo $temp;
                          ?>
                           <option value='<?php echo $temp;?>'><?php echo $temp;?></option>
                         <?php
	                   }
                       ?>
                   </select> <br>
        </div>
        <script type="text/javascript">
                        document
                            .getElementById('target')
                            .addEventListener('change', function () {
                                'use strict';
                                var vis = document.querySelector('.vis'),   
                                target = document.getElementById(this.value);
                                if (vis !== null) {
                                    vis.className = 'inv1';
                                }
                                if (target !== null ) {
                                    target.className = 'vis';
                                }
                            });
                </script>
        
    <h4><label>Level:</label></h4><select name="level" style="width:200px;" required>
                      <option value="">Select...</option>
                      <option value="level1" >Level1</option>
                      <option value="level2" >Level2</option>
                      <option value="level3" >Level3</option>
                   </select> <br><br>    
        <input type = "submit" value = " Submit " style="width:200px;" class="btn btn-block btn-primary"/><br />
               </form>
    </div>
    
      </div>
      </div>
      </body>
  </html> 
