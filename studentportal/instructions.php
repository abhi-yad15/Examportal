<?php include('session.php');?>
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
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
               <h1 style="font-size:40px;font-weight:bold; color:blue;">Instructions</h1><hr />
                  <p style="font-size:25px;color:red;">PLEASE READ ALL THE INSTRUCTIONS CAREFULLY.</p>
                  <ul>
                      <li>Duration of the exam is <b>1</b> hour.<br/> </li>
                      <li>Maximum Marks - 200<br/></li>
                      <li>The exam contains four sections <br/>
                          <ol>
                              <li>Processing Speed Test-<b>&nbsp;&nbsp;40 Marks</b></li>
                              <li>Memory Test-<b>&nbsp;&nbsp;24 Marks</b></li>
                              <li>Logic and Quantitative Skills-<b>&nbsp;&nbsp;16 Marks</b></li>
                              <li>General Math and Science-<b>&nbsp;&nbsp;120 Marks</b></li>
                          </ol>
                      </li>
                      <li>There is <b>NO NEGATIVE MARKING</b> in any section. <br/></li>
                  </ul>
              
               <h1 style="font-size:30px;font-weight:bold; color:blue;">Processing Speed Test -  5 minutes</h1><hr />
                  <ul>
                      <li>The following test is meant to assess your mental speed - how quickly you can process information and make decisions based upon that information.<br/> </li>
                      <li>The exercise consists of word/image pairs and simple mathematical equations or number sequences. If a pair matches, click the "Correct" button. If the pair does not match, click the "Incorrect" button.<br/></li>
                      <li>However, if the word "Opposite" appears at the top of the screen, you need to reverse your answer.<br/> </li>
                      <li>You will have <b>5</b> minutes to attempt <b>40</b> questions. <br/></li>
                      <li>Each question will carry <b>1</b> mark. <br/></li>
                  </ul>  
                 <h1 style="font-size:30px;font-weight:bold; color:blue;">General Maths and Science -  40 minutes</h1>
                  <ul>
                      <li>This section contains <b>30</b> questions <br/> </li>
                      <li>All questions are multiple-choice questions with single correct answer.<br/></li>
                      <li>However, if the word "Opposite" appears at the top of the screen, you need to reverse your answer.<br/> </li>
                      <li>Each question will carry <b>4</b> marks.<br/></li>
                  </ul>  
                   <h1 style="font-size:30px;font-weight:bold; color:blue;">Memory Test - 5 minutes</h1><hr />
                  <ul>
                      <li>The following test is meant to assess your ability to store and manipulate the information for a brief time. <br/> </li>
                      <li>There will be <b>2</b> questions each with <b>3</b> sub questions<br/> </li>
                      <li>Each question will consist an image that will be displayed only for <b>20 seconds</b> - The 3 sub questions will be based on the image shown.<br/></li>
                      <li>Each question will carry <b>4</b> marks.<br/></li>
                  </ul> 
                  <h1 style="font-size:30px;font-weight:bold; color:blue;">Logic and Quantitative Skills - 10 minutes</h1><hr />
                  <ul>
                      <li>The following test is meant to asses your logical reasoning.<br/> </li>
                      <li>This section contains <b>2</b> questions.<br/></li>
                      <li>All the answers are <b>integers ranging from 0-9.</b><br/> </li>
                      <li>Indicate your answer by typing the integer in the given box.<br/></li>
                      <li>Each question will carry <b>8</b> marks.<br/></li>
                  </ul> 
                 <a class="btn btn-primary" href="registration/exam.php">Click here to begin test</a>
                   </div>  
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