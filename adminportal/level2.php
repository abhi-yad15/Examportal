<?php
  include('session.php');
  $level="level2";
  $level2=$level."a";
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

    <title>Marks Page:</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="http://localhost/Admin/form.css" type="text/css">
      <script src="sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="sweetalert.css">
     <style>
	   img {
         opacity: 0.5;
         filter: alpha(opacity=50); /* For IE8 and earlier */
       }
	  body,html{
		   background:url("images1.jpg");
           heigth :100%;
		   background-position: center;
           background-repeat: no-repeat;
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
         width: 70%;
         text-align: center;  
         word-wrap: break-word;
         padding-left: 30px;
      }	
      table {
        border-collapse: collapse;
        width: 100%;
      }     
	  </style>
      <script type="text/javascript">
         
          function displayDiv(name,unattempted,attempted,score,skill1a,skill2a,skill3a,skill4a,skill5a,skill1q,skill2q,skill3q,skill4q,skill5q,section){
            //document.write(section);   
             var skill1=skill1a+"/"+skill1q;
             var skill2=skill2a+"/"+skill2q;
             var skill3=skill3a+"/"+skill3q;
             var skill4=skill4a+"/"+skill4q;
             var skill5=skill5a+"/"+skill5q;   
             //document.write(skill1);   
             //var  scetion1=section.fontsize(5);
             document.getElementById("section").innerHTML=section;
             //document.getElementById("section").style.fontSize = "xx-large";  
             document.getElementById("unattempted").innerHTML=unattempted;
             document.getElementById("attempted").innerHTML=attempted;
             document.getElementById("score").innerHTML=score;
             document.getElementById("skill1").innerHTML=skill1;
             document.getElementById("skill2").innerHTML=skill2;
             document.getElementById("skill3").innerHTML=skill3;
             document.getElementById("skill4").innerHTML=skill4;
             document.getElementById("skill5").innerHTML=skill5;   
            var content=document.getElementById("check").innerText;
            var url=name+".jpg";  
              swal({
                title: name,
                text: content,
                type: "info",
                imageUrl: url   ,               
                confirmButtonText: "Ok"
                });
             //swal(content);
          
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
            <li><a href="level1.php">Level1:</a></li>
            <li class="active"><a href="level2.php">Level2:</a></li>
            <li><a href="level3.php">Level3:</a></li>
            
          </ul>
        </nav>
      </div>
	  </div>
      <br /><br /><br /><br /><br />
    <div class="container-fluid">
      <div class="row">
      <div class="wrapText col-md-6 col-md-offset-3" style="padding left:70px;">
	  <?php
          echo "<table border =\"1\" class=\"wrapText\" text-align='center'>";
          echo "<tr>";
          echo "<b><h5><td>Name</td></h5></b>";
          echo"<b><h5><td>Score</td></h5></b>";
          echo"<b><h5><td>Section1</td></h5></b>";
          echo"<b><h5><td>Section2</td></h5></b>";
          echo"<b><h5><td>Section3</td></h5></b>";   
          echo "</tr>";
          //connecting to database:
	      $query = "SELECT * FROM details WHERE level='level2'"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result7=mysqli_query($con,$query);
           $unattempted=0;
            $attempted=0;
            $skill1q=0;
            $skill2q=0;
            $skill3q=0;
            $skill4q=0;
            $skill5q=0;
            $skill1a=0;
            $skill2a=0;
            $skill3a=0;
            $skill4a=0;
            $skill5a=0;
            $score=0;
          while($row5 = mysqli_fetch_array($result7,MYSQLI_ASSOC)){
              $name=$row5['username'];
              $temp1=$row5['score'];
	          echo "<tr>";
              $level="level2";
              echo "<td>$name</td>";
	          //echo '<td> <a href="marks.php?name=' . $temp . '& level='.$level. '">' . $temp . '</a></td>';	
	          echo "<td>$temp1</td>";
              //section1:
	          $query1 = "SELECT * FROM $name WHERE section='section1'"; 
                if(!mysqli_query($con,$query1)){
	               die('Error: ' . mysqli_error($con));
                }
                $result1=mysqli_query($con,$query1);
                //section2:
                $query2 = "SELECT * FROM $name WHERE section='section2'"; 
                if(!mysqli_query($con,$query2)){
	               die('Error: ' . mysqli_error($con));
                }
                $result2=mysqli_query($con,$query2);
                //section3:
                $query3 = "SELECT * FROM $name WHERE section='section2'"; 
                if(!mysqli_query($con,$query3)){
	               die('Error: ' . mysqli_error($con));
                }
                $result3=mysqli_query($con,$query3);
     
                //calculating skills of the person:
                $level2=$level."q";
              //section1
              while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                  if($row['answer']=="")
                    $unattempted++;
                  else
                    $attempted++;
                  $score+=$row['score'];
                  $temp=$row['id'];
                  $section1=$level2."_section1";
                  $query3 = "SELECT * FROM $section1 WHERE id='$temp'";        
                  
                  $result=mysqli_query($con,$query3);
                  
                  $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  if($row1['skill1']!=0)
                    $skill1q++;
                  if($row1['skill1']!=0 && $row['score']==1)
                    $skill1a++;
       
                  if($row1['skill2']!=0)
                    $skill2q++;
                  if($row1['skill2']!=0 && $row['score']==1)
                    $skill2a++;
               
                  if($row1['skill3']!=0)
                    $skill3q++;
                  if($row1['skill3']!=0 && $row['score']==1)
                    $skill3a++;
               
                  if($row1['skill4']!=0)
                    $skill4q++;
                  if($row1['skill4']!=0 && $row['score']==1)
                    $skill4a++;
               
                  if($row1['skill5']!=0)
                    $skill5q++;
                  if($row1['skill5']!=0 && $row['score']==1)
                    $skill5a++;           
                }//echo $skill5q; 
              ?>
              
              <td><input type='button' id='report-submit' value='Section1' onClick="displayDiv('<?php echo $name ?>', '<?php echo $unattempted ?>','<?php echo $attempted ?>','<?php echo $score ?>','<?php echo $skill1a ?>','<?php echo $skill2a ?>','<?php echo $skill3a ?>','<?php echo $skill4a ?>','<?php echo $skill5a ?>','<?php echo $skill1q ?>','<?php echo $skill2q ?>','<?php echo $skill3q ?>','<?php echo $skill4q ?>','<?php echo $skill5q ?>','<?php echo "section1" ?>');"> </td>
              <?php 
               //section2
               $unattempted=0;
               $attempted=0;
               $skill1q=0;
               $skill2q=0;
               $skill3q=0;
               $skill4q=0;
               $skill5q=0;
               $skill1a=0;
               $skill2a=0;
               $skill3a=0;
               $skill4a=0;
               $skill5a=0;
               $score=0;
               while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                 if($row['answer']=="")
                   $unattempted++;
                 else
                   $attempted++;
                 $score+=$row['score'];
                 $temp=$row['id'];
                 $section2=$level2."_section2";   
                 $query3 = "SELECT * FROM $section2 WHERE id='$temp'";
                 //echo $query3;
                 $result=mysqli_query($con,$query3);
                 $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if($row1['skill1']!=0)
                  $skill1q++;
                if($row1['skill1']!=0 && $row['score']==1)
                  $skill1a++;
       
                if($row1['skill2']!=0)
                  $skill2q++;
                if($row1['skill2']!=0 && $row['score']==1)
                  $skill2a++;
               
                if($row1['skill3']!=0)
                  $skill3q++;
                if($row1['skill3']!=0 && $row['score']==1)
                  $skill3a++;
               
                if($row1['skill4']!=0)
                  $skill4q++;
                if($row1['skill4']!=0 && $row['score']==1)
                  $skill4a++;
               
                if($row1['skill5']!=0)
                  $skill5q++;
                if($row1['skill5']!=0 && $row['score']==1)
                  $skill5a++;           
             }      
              
              ?>
              <td><input type='button' id='report-submit' value='Section2' onClick="displayDiv('<?php echo $name ?>', '<?php echo $unattempted ?>','<?php echo $attempted ?>','<?php echo $score ?>','<?php echo $skill1a ?>','<?php echo $skill2a ?>','<?php echo $skill3a ?>','<?php echo $skill4a ?>','<?php echo $skill5a ?>','<?php echo $skill1q ?>','<?php echo $skill2q ?>','<?php echo $skill3q ?>','<?php echo $skill4q ?>','<?php echo $skill5q ?>','<?php echo "section2" ?>');"> </td>           
              <?php 
               //section3
               $unattempted=0;
               $attempted=0;
               $skill1q=0;
               $skill2q=0;
               $skill3q=0;
               $skill4q=0;
               $skill5q=0;
               $skill1a=0;
               $skill2a=0;
               $skill3a=0;
               $skill4a=0;
               $skill5a=0;
               $score=0;
               while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
                if($row['answer']=="")
                    $unattempted++;
                else
                    $attempted++;
                $score+=$row['score'];
                $temp=$row['id'];
                $section3=$level2."_section3";       
                $query3 = "SELECT * FROM $section3 WHERE id='$temp'";        
                $result=mysqli_query($con,$query3);
                $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if($row1['skill1']!=0)
                    $skill1q++;
                if($row1['skill1']!=0 && $row['score']==1)
                    $skill1a++;
       
                if($row1['skill2']!=0)
                    $skill2q++;
                if($row1['skill2']!=0 && $row['score']==1)
                    $skill2a++;
               
                if($row1['skill3']!=0)
                    $skill3q++;
                if($row1['skill3']!=0 && $row['score']==1)
                    $skill3a++;
               
                if($row1['skill4']!=0)
                    $skill4q++;
                if($row1['skill4']!=0 && $row['score']==1)
                    $skill4a++;
               
                if($row1['skill5']!=0)
                    $skill5q++;
                if($row1['skill5']!=0 && $row['score']==1)
                    $skill5a++;           
             }
            ?>    <td><input type='button' id='report-submit' value='Section3' onClick="displayDiv('<?php echo $name ?>', '<?php echo $unattempted ?>','<?php echo $attempted ?>','<?php echo $score ?>','<?php echo $skill1a ?>','<?php echo $skill2a ?>','<?php echo $skill3a ?>','<?php echo $skill4a ?>','<?php echo $skill5a ?>','<?php echo $skill1q ?>','<?php echo $skill2q ?>','<?php echo $skill3q ?>','<?php echo $skill4q ?>','<?php echo $skill5q ?>','<?php echo "section3" ?>');"></td>
              <?php 
	          echo "</tr>";
	      }
           //<a onclick="jsfunction()" href="#">
          echo "</table>";
     ?>
     </div>
    </div>
    <!--    <div class="col-md-8">
        <div class="row">
      <div class="col-md-4 col-md-offset-4" >-->
        <div id="check" style="visibility:hidden;">
          <h1 id="section">-</h1>
          <table  border=1px>
            <!--<tr>
                <th>Name:</th>
                <th>Attempted:</th>
                <th>Unattempted:</th>
                <th>Score:</th>
                <th>Skill1</th>
                <th>Skill2</th>
                <th>Skill3</th>
                <th>Skill4</th>
                <th>Skill5</th>
              </tr>-->
              <tr>
                  <!--<th>Name: <p id="name">-</p></th>-->
                  <th>Attempted: <p id="attempted">-</p></th>
                  <th>Unattempted: <p id="unattempted">-</p></th>
                  <th>Score: <p id="score">-</p></th>
                  <th>Skill1: <p id="skill1">-</p></th>
                  <th>Skill2: <p id="skill2">-</p></th>
                  <th>Skill3: <p id="skill3">-</p></th>
                  <th>Skill4: <p id="skill4">-</p></th>
                  <th>Skill5: <p id="skill5">-</p></th>
              </tr>
          </table>
      </div>  
      <!--</div>
      </div>    
      </div>-->
      </div>
      </body>
  </html> 
