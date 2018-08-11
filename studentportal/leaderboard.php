<?php
  include('session.php');
	 //$event=$_GET['name'];
     //$event="event1";
     //$result=mysqli_query($con,$query);
     $sql="SELECT *FROM student_notification ORDER BY id DESC";
     $result=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Leaderboard</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
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
    </script>
    <script>
      function showHint(str) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content1").innerHTML = this.responseText;
        }
       };
            xhttp.open("GET", "show.php?event="+str, true);
            xhttp.send();   
      }
    </script>
    <style>
        .inv{
            display: none;
        }
        .btn {
               background-color: gray;
               border-radius: 0px; 
               color: white;
               display: inline-block;
               font-size: 20px;
               width: 100%;
               text-align: left;
           }

           .btn:hover { color: blue; }
           .btn:visited { background-color: blue; }
           #create_btn {
                
               width: 80px;
               height: 40px;
           }
           .button-clicked {
                background-color: white;
            }
        .table-fill{
             border: 1px solid black;
        }
        .tableizer-firstrow{
            border: 1px solid black;
             width:50%;
        }
        table,th,td{
            border: 1px solid black;
            text-align: center;
            width:50%;
        }
    </style>
</head>
<body id="page1">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
        <h1><a href="#"></a></h1>
        <nav>
        <ul>
          <li class="current"><a href="home.php" class="m1">Home Page</a></li>
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
        <li><span><a href="info.php">Student Info</a></span></li>
        <li><span><a onclick="Display()">Downloads</a></span>
            <ul class="inv" id="download">
                <li><span><a href="sampleques.pdf">Sample Paper</a></span></li>
            </ul>  
        </li>
        <li><span><a href="notification.php">Notificaions</a></span></li>
        <li><span><a href="article.php">Study Materials</a></span></li>
        <li><span><a href="leaderboard.php">Leaderboard</a></span></li>
        <li><span><a href="examportal.php">Exam Portal</a></span></li>
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
      <marquee width=150 height=250 direction=up>       
        <?php
          $count=0;
           while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                 if($count==3)
                     break;
                  $date=substr($row['date'],0,10);
                  $sub=$row['sub'];
                  $description=$row['description'];
                  ?>
               <li><strong><?php echo $date;?></strong>
               <h4><a href="#"><?php echo $sub; ?></a></h4>
               <?php echo $description; ?>.</li>
               <?php
               $count++;
              }   
        ?>   
        </marquee>
        </ul>
    </aside>
    <section id="content">
      <div class="inside">
          <h2>Leaderboard:</h2><br />
          <?php
            $exam=$level."_exam";
            $sql="SELECT * FROM $exam";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
              $event=$row['event'];
              ?>
          <a onclick="showHint('<?php echo $event;?>')"><h3><?php echo $event;?></h3></a>
              <?php
            }
          ?>
            <table class="table-fill" id="content1">                      
            </table>
      </div>
    </section>
  </div>
</div>
<footer>
  <div class="footerlink">
    <p class="lf">Copyright &copy; 2017 <a href="intellify.in">Intellify</a> - All Rights Reserved</p>
    <div style="clear:both;"></div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>
