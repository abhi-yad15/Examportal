<?php
  include('session.php');
	 $query = "SELECT * FROM entries WHERE username = '$username'"; 
     //echo $query;
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query);
     $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
     $sql="SELECT *FROM student_notification ORDER BY id DESC";
     $result=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Information Page</title>
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
      <!--<div id="banner">
        <h2>Abhishek Yadav <span>J.N.V.<span>Maharajganj</span></span></h2>
      </div>-->
      <div class="inside">
        <h2>About <span>You</span></h2>
          <div class="img-box"><img src="images/2page-img4.jpg">
              </div>
          <div>
              <span class="txt1"><?php echo $row1['name']; ?></span><br />
              <h5 style="color:blue; display:inline;">Email: </h5><h5 style="display:inline;"><?php echo $row1['email']; ?></h5><br />
              <h5 style="color:blue; display:inline;">Level: </h5><h5 style="display:inline;"><?php echo substr ($row1['level'],5,6); ?></h5><br />
              <h5 style="color:blue; display:inline;">School: </h5><h5 style="display:inline;"><?php echo $row1['schoolname']; ?></h5>
          </div>
      </div>
    </section>
  </div>
</div>
<footer>
  <div class="footerlink">
    <p class="lf">Copyright &copy; 2017 <a href="#">Intellify</a> - All Rights Reserved</p>
    <div style="clear:both;"></div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>
