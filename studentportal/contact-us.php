<?php
  include('session.php');
  date_default_timezone_set('Asia/Kolkata');
	 $query = "SELECT * FROM entries WHERE username = '$username'"; 
     //echo $query;
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result1=mysqli_query($con,$query);
     $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
     $sql="SELECT *FROM student_notification ORDER BY id DESC";
     $result=mysqli_query($con,$sql);
     $success="";
	if(($_SERVER["REQUEST_METHOD"] == "POST")){
		$sub = mysqli_real_escape_string($con,$_POST['sub']);
        $date = mysqli_real_escape_string($con,$_POST['date']);
        $query = mysqli_real_escape_string($con,$_POST['query']);
		$sql= "INSERT INTO student_query(date,sub,description,username) values('$date','$sub','$query','$username')";
		$retval1= mysqli_query($con,$sql);
		if(!$retval1)
		{
			$error="Could not enter data please try again";
		}
		else
		{
            $success="Your query has been sent.";   
     	}
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us Page</title>
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
    </style>
</head>
<body id="page1">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
        <h1><a href="#">Abhishek Yadav</a></h1>
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
        <h2>Our <span>Contacts</span></h2>
        <div class="address">
          <address>
          <strong>Country:</strong>INDIA<br>
          <strong>Telephone:</strong>+91 8860287220<br>
          <strong>Email:</strong>info@intellify.in
          </address>
        </div>
          <script type="text/javascript">
           function Display1(temp1,count) {
		   var val = temp1;
              // document.write(document.getElementById(val).className);
           var i=0;       
           for(i=1;i<=count;i++){
             var temp="q"+i;
                document.getElementById(temp).className="inv";  
           }
            //document.write(document.getElementById(val).className);   
           document.getElementById(val).className="button-clicked";       
		   }
          
         </script>
          <h2>Your Queries:</h2>
               <?php
                 $sql="SELECT *FROM student_query WHERE username='$username'";
                 $result=mysqli_query($con,$sql);
                 $count=mysqli_num_rows($result);  
                 $id=1;
                 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    $value=$row['sub'];
                    $q="q".$id; 
                    $description=$row['description'];
                    $answer=$row['answer']; 
                    $id++;  
                ?>
                <div class="margin" style="text-align:left">
                <li> <input type='submit' id='q112' class="btn" value='<?php echo $value;?>' onClick="Display1('<?php echo $q; ?>','<?php echo $count; ?>')">
                <?php    
                echo "<li id=" . $q . " class='inv'>";
                ?>     
                <b>:</b>Q:<?php echo $description;?>?.<br />
                <b>:</b>Ans:<?php echo $answer;?>.<br />    
                </li>
                </div>      
                    <?php
                 }
               ?>
          <br />
        <h2>Contact <span>Form</span></h2>
        <form id="contacts-form" action="" method="post">
          <fieldset>
            <div class="field">
              <input type="hidden" value="<?php echo $username?>" name="username"/>
              <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date"/>    
            </div>
            <div class="field">
              <label>Subject:</label>
              <input type="text" value="" name="sub" required/>
            </div>
            <div class="field extra">
              <label>Query:</label>
              <textarea cols="1" rows="1" name="query" required></textarea>
            </div>
            <input type = "submit" value = " Submit " /><br />  
            <!--<div class="alignright"><a href="#">Send Your Message!</a></div>-->
          </fieldset>
        </form>
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
