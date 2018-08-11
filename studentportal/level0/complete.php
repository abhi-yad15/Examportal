<?php 
include('../session.php');
unset($_SESSION['end_time']);
    $set=$level."_sub_ans";
    $result2= mysqli_query($con,"UPDATE $set SET duration=0 WHERE username='$username'");
    if(!$result2){
        echo "Could not submit";
    }
    else
        header("location: ../logout.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Student Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="assets/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/css/form.css" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="welcome.php">Welcome <?php echo $username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <!--  <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
              <li ><a href="details.php">Details</a></li>
            <li><a href="markdetails.php">Detailed Marks</a></li>
            <li><a href="notifications.php">Notifications</a></li>
              <li><a href="task.php">Tasks</a></li>
              <li><a href="queries.php">Queries</a></li>
          </ul> -->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../registration/exam.html">back to exam page</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
      <div class="container">
          <br><br><br><br><br><br><br><br><br>
          <div class="row" style="text-align:center">
              <h1 >Response submitted</h1>
              <h1> Thank You.. </h1>
          </div>
      </div>

   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
   
</html>