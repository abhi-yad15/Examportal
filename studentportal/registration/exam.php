<?php
include('../session.php');
$sub="pro_ans";
$sql="SELECT * FROM $sub WHERE username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$pros=$row['duration'];
$sub=$level."_sub_ans";
$sql="SELECT * FROM $sub WHERE username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sub1=$row['duration'];
$sub=$level."_memory_ans";
$sql="SELECT * FROM $sub WHERE username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$mem=$row['duration'];
$mem1=$row['duration1'];
$sub=$level."_integer_ans";
$sql="SELECT * FROM $sub WHERE username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$int=$row['duration'];
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ISCO-ROUND 2</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
  
  <link rel='stylesheet prefetch' href='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc3/angular-material.css'>
<link rel='stylesheet prefetch' href='http://localhost:8080/docs.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div ng-controller="DemoCtrl" ng-cloak="" class="md-inline-form" ng-app="MyApp" layout="column" layout-sm="row" layout-align="center center" layout-align-sm="start start" layout-fill>
		<md-content id="SignupContent" class="md-whiteframe-10dp" flex-sm>
				<md-toolbar flex id="materialToolbar">
						<div class="md-toolbar-tools"> <span flex=""></span> <span class="md-headline" align="center">International Science and Creativity Olympiad</span></div>
                    
				</md-toolbar>
                       
				<div layout-padding="">
						<div></div>
                    <form action="../pros/pros.php">
                       <?php if($pros>0){?>   
						<md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Processing Speed Test- Attempt Now</md-button>
                        <?php } else{?>
                        <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Processing Speed Test - Already Attempted</md-button>
                        <?php }?>
                    </form>        
                        <br/>
                     <form action="../memory/memory.php">
                        <?php if($mem>0||$mem1!=0){?> 
                        <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Memory Speed Index- Attempt Now</md-button>
                        <?php } else{?>
                          <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Memory Speed Index - Already Attempted</md-button>
                         <?php }?>
                     </form>     
                        <br />
                     <form action="../integer/integer.php">   
                        <?php if($int>0){?> 
                        <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Logical Reasoning- Attempt Now</md-button>
                        <?php } else{?> 
                        <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Logical Reasoning - Already Attempted</md-button> 
                        <?php }?> 
                     </form>     
                        <br />
                     <form action="../sub/sub.php">
                        <?php if($sub1>0){?>  
                        <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">General Math and Science- Attempt Now</md-button>
                        <?php } else{?>
                         <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">General Math and Science - Already Attempted</md-button>
                         <?php }?> 
                     </form> 
                       
                        <br />
                     <form action="../logout.php" onsubmit="return confirm('Are you sure, you want to finish the exam');">
                         <md-button class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" name="submit">Finish Test</md-button>
                    </form>
				</div>
		</md-content>
</div>
  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-animate.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-route.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-aria.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-messages.min.js'></script>
<script src='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc3/angular-material.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/assets-cache.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
