<?php
  include('session.php');
     $round="round1_".$level;
	 $query = "SELECT * FROM $round "; 
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query);
     $sql="SELECT *FROM student_notification ORDER BY id DESC";
     $result=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Articles</title>
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
          <!--
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
        <h2>Study Materials</h2>
        <ul class="articles">
            <?php 
             while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){ 
             $title=$row['title'];
             $link=$row['link'];
             $link="../../../".$link;
             $intro=$row['intro'];     
                 ?>
            <li><img src="images/icon6.png">
            <h4><a href="<?php echo $link;?>"><?php echo $title;?></a></h4>
            <?php echo $intro;?>    
            </li>
             <?php
            }
            $sql="SELECT * FROM entries WHERE username='$username'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $round2=$row['round2'];
            $round3=$row['round3'];
            if($round2==1){
                $round="round2_".$level;
	            $query = "SELECT * FROM $round "; 
                if(!mysqli_query($con,$query)){
                 die('Error: ' . mysqli_error($con));
                }
                $result1=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){ 
                    $title=$row['title'];
                    $link=$row['link'];
                    $link="../../../".$link; 
                    $intro=$row['intro'];     
                 ?>
                    <li><img src="images/icon6.png">
                    <h4><a href="<?php echo $link;?>"><?php echo $title;?></a></h4>
                    <?php echo $intro;?>    
                    </li>
                 <?php
                }                
            }
            if($round3==1){
                $round="round3_".$level;
	            $query = "SELECT * FROM $round "; 
                if(!mysqli_query($con,$query)){
                 die('Error: ' . mysqli_error($con));
                }
                $result1=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){ 
                    $title=$row['title'];
                    $link=$row['link'];
                    $link="../../../".$link;
                    $intro=$row['intro'];     
                 ?>
                    <li><img src="images/icon6.png">
                    <h4><a href="<?php echo $link;?>"><?php echo $title;?></a></h4>
                    <?php echo $intro;?>    
                    </li>
                 <?php
                }                
            }
            ?>
            <li><img src="images/icon6.png">
            <h4><a href="StudyMaterials/Assertion Reasoning.pdf"><br /><br />Assertion Reasoning</a></h4>
            <li><img src="images/icon6.png">
            <h4><a href="StudyMaterials/Environmental-Work-Related.pdf"><br /><br />Environmental-Work-Related</a></h4>
            <li><img src="images/icon6.png">
            <h4><a href="StudyMaterials/Knowledge.pdf"><br /><br />Knowledge</a></h4>
            <li><img src="images/icon6.png">
            <h4><a href="StudyMaterials/Quantitative Reasoning-new.pdf"><br /><br />Quantitative Reasoning</a></h4>
            <li><img src="images/icon6.png">
            <h4><a href="StudyMaterials/Scientific Comprehension.pdf"><br /><br />Scientific Comprehension</a></h4>
            <li><img src="images/icon6.png">
            <h4><a href="StudyMaterials/Verbal Comprehension.pdf"><br /><br />Verbal Comprehension</a></h4>
        </ul>
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
