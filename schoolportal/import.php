<?php
include('session.php');
$error="";
$success="";
$result1=mysqli_query($conn,"SELECT * FROM school_entries WHERE username='$login_session'");
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
$result3=mysqli_query($conn,"SELECT * FROM school_notification ORDER BY date DESC");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $level = mysqli_real_escape_string($conn,$_POST['level']);
    $phone2 = mysqli_real_escape_string($conn,$_POST['phone2']);
    $username=substr($name,0,strpos($name," ")). $login_session. rand(0,9999);
                $password=$username . rand(0,99);
               $sql = "INSERT into login (username,password) 
                   values ('".$username."','".$password."')";
                   $result4 = mysqli_query($conn, $sql);
                $result5=mysqli_query($conn, "INSERT into details (username,level,school) 
                   values ('".$username."','".$level."','".$login_session."')");
                $result6=mysqli_query($conn, "INSERT into entries (username,level,name,email,schoolname,contact) 
                   values ('".$username."','".$level."','".$name."','".$email."','".$row1['name']."','".$phone2."')");
             //   $username=$getData[2];
              if($result4&&$result5&&$result6){    
	           $query = "SELECT * FROM students WHERE type='$level'";
                $result=mysqli_query($conn,$query);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $temp=$row['count'];
                $temp++;
                $sql = "UPDATE students SET count='$temp' WHERE type='$level'";
                if(!mysqli_query($conn,$sql)){
                    die('Error: ' . mysqli_error($conn));
                }
      
              //  $structure = "submissions/{$subtype}/{$username}/";
            //    if (!mkdir($structure, 0, true)) {
              //      echo "Folder could not created.";
            //    }
              
                if(!isset($result4)||!isset($result5)||!isset($result6))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Error Adding Student. Please try again.\");
                            window.location = \"import.php\"
                          </script>";        
                }
                else {
                      echo "<script type=\"text/javascript\">
                        alert(\"Student has been successfully added.\");
                        window.location = \"import.php\"
                    </script>";
                }
             }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>School Portal</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="School portal for the Schools registered under Intellify ISCO 2017.">
<meta name="author" content="">
<link rel="icon" href="../../img/favicon.ico">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link href="assets/css/form.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--[if lt IE 7]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen">
<script type="text/javascript" src="js/ie_png.js"></script>
<script type="text/javascript">ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');</script>
<![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
<script>
    function Display(){
        if(document.getElementById("download").className=="inv")    
          document.getElementById("download").className="check";
        else
          document.getElementById("download").className="inv";   
    }
    function Display2(){
        if(document.getElementById("infos").className=="inv")    
          document.getElementById("infos").className="check";
        else
          document.getElementById("infos").className="inv";   
    }
    </script>
    <style>
        .inv{
            display: none;
        }
    </style>
</head>
<body id="page1">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
        <h1><a href="#"><?php echo $row1['name']; ?></a></h1>
        <nav>
        <ul>
          <li class="current"><a href="welcome.php" class="m1">Home Page</a></li>
            <li class="last"><a href="logout.php" class="m2">Sign Out</a></li>
         </ul>
         </nav>
    
    <!--<nav>
        <ul>
          <li class="current"><a href="index.html" class="m1">Home Page</a></li>
          <li><a href="about-us.html" class="m2">About Us</a></li>
          <li><a href="articles.html" class="m3">Our Articles</a></li>
          <li><a href="contact-us.html" class="m4">Contact Us</a></li>
          <li class="last"><a href="sitemap.html" class="m5">Sitemap</a></li>
        </ul>
        </nav>-->
        
     <!-- <form action="#" id="search-form">
        <fieldset>
          <div class="rowElem">
            <input type="text">
            <a href="#">Search</a></div>
        </fieldset>
      </form>-->
    </div>
  </header>
  <div class="container">
    <aside>
      <h3>Categories</h3>
      <ul class="categories">
        <!--<li><span><a href="#">Programs</a></span></li>-->
        <li><span><a onclick="Display2()">Info</a></span>
          <ul class="inv" id="infos">
                <li><span><a href="info.php">Basic School Info</a></span></li>
                <li><span><a href="details.php">Teacher's Details</a></span></li>
            </ul>
          </li>
        <li><span><a href="import.php">Add Students</a></span></li>
        <li><span><a onclick="Display()">Downloads</a></span>
            <ul class="inv" id="download">
                <li><span><a href="images/INTERNATIONAL_SCIENCE_AND_CREATIVITY_OLYMPIAD.pdf">Poster</a></span></li>
                <li><span><a href="images/document.pdf">Student Regisration Form</a></span></li>
                <li><span><a href="sampleques.pdf">Sample Paper</a></span></li>
            </ul>  
        </li>
        <li><span><a href="notifications.php">Notifications</a></span></li>
        <li><span><a href="studentsadded.php">Students added</a></span></li>
          <li><span><a href="queries.php">Your Queries</a></span></li>
        <li class="last"><span><a href="contact-us.php">Contact Us</a></span></li>
      </ul>
      <!--<form action="#" id="newsletter-form">
        <fieldset>
          <div class="rowElem">
            <h2>Newsletter</h2>
            <input type="email" value="Enter Your Email Here" onFocus="if(this.value=='Enter Your Email Here'){this.value=''}" onBlur="if(this.value==''){this.value='Enter Your Email Here'}" >
            <div class="clear"><a href="#" class="fleft">Unsubscribe</a><a href="#" class="fright">Submit</a></div>
          </div>
        </fieldset>
      </form>-->
      <h2>Fresh <span>News</span></h2>
      <ul class="news">
          <?php 
          $count1=0;
          while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
              $count1++;
              if($count1>3)
                  break;
          ?>
        <li><strong><?php echo $row3['date']; ?></strong>
          <h4><a href="#"><?php echo $row3['sub']; ?></a></h4>
          <?php echo $row3['description']; ?></li>
          <?php } ?>
      <!--  <li><strong>11th/26th, 2017</strong>
          <h4><a href="#">Round 1,exam </a></h4>
          Exam date of Round1 exam.</li>
        <li><strong>9th/15th September, 2017</strong>
          <h4><a href="#">Round 2,exam</a></h4>
          Exam date of Round2 exam. </li>-->
      </ul>
    </aside>
    <section id="content">
        <div class="inside">
            You can add Students either by fillingdetails in an Excel file Given on the Import page or by adding them one by one(recommended as it is more accurate).<br><br>
            <span><a style="text-decoration:none;" href="import1.php" class="btn btn-primary">Import File</a><br>&nbsp;</span>
            <h2>Student's Details</h2>
            <span>Please enter the following details of the student <strong>carefully</strong> to register him/her for the Olympiad.</span><br/><br/>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <form id="form1" class="form" method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are You sure you have entered Correct Details. To edit click cancel')">
            <label for="name" >Students's Name:</label>
            <input id="name" class="form-control" type="text" name="name"  required>
            <label for="email" >Student's Email:</label>
            <input id="email" class="form-control" type="email" name="email"  required>
            <label for="contact" >Level:</label>
            <select id="level" name="level" required>
            <option value="level0">Level 0</option>
            <option value="level1">Level 1</option>
            <option value="level2">Level 2</option>
            <option value="level3">Level 3</option></select>
            <label for="contact" >Contact number:</label>
            <input id="contact" class="form-control" type="text" name="phone2" required>
            <input type="submit"  id="submit" name="submit" value="Add Student" class="btn btn-primary">
           </form></div>
    </section>
  </div>
</div>
<footer>
  <div class="footerlink">
    <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
    <p class="rf">Design by <a href="http://www.templatemonster.com/">TemplateMonster</a></p>
    <div style="clear:both;"></div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>
