<?php 
 include('../session.php');
 $sql="SELECT * FROM pro_ans WHERE username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $reg=$row['reg'];
    $dur=$row['duration'];
    $duration = $dur-1;
    $sql="UPDATE pro_ans SET duration='$duration' WHERE username='$username'";
    mysqli_query($con,$sql);
    if($dur<=0)
     header("location: complete.php");    
 if(($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))){
	$ans = mysqli_real_escape_string($con,$_POST['submit']);
        $sql="SELECT * FROM pro_ans WHERE username='$username'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $ques=$row['ques'];
        $score=$row['score'];
        $temp="a".$ques;
        $set=($reg%5)+1;
        $set="pro_set".$set;  
        $sql="SELECT * FROM $set WHERE id='$ques'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $temp1=$row['ans'];
        if($temp1==$ans)
          $ans=1;
        else
          $ans=0;    
        $ques++;
        $score+=$ans;
        $sql="UPDATE pro_ans set $temp='$ans', ques='$ques',score='$score' WHERE username='$username'";
        mysqli_query($con,$sql);
        if($ques>40)
          header("location: complete.php");    
    }
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
    <style>
         img.five{
              height: 185px;
              width: 300px;
              display: inline;
          }
    </style>
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
          <a class="navbar-brand">Welcome <?php echo $username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
      </div>
          </div>
    </nav>
	
      <div class="container">
          <div class="row" id="time" style="font-size:25px;font-weight:bold; color:red;">Time left:</div>
      </div>
    <div class="container">  
      <form method="post" action="complete.php" onsubmit="return confirm('You will not be able to change your answers later. If you want to finish click OK');" >
      <input type=submit class="btn btn-primary" name="submit1" value="Submit" ></form>
      </div>
      <div class="container">
      <div class="row">
           <div class="col-md-8 col-md-offset-3">
               <h1 style="font-size:50px;font-weight:bold; color:blue;">Processing Speed Test</h1></div>
          <div class="col-md-8 col-md-offset-4">
            <?php  
             $sql="SELECT * FROM pro_ans WHERE username='$username'";
             $result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
             $ques=$row['ques'];
             $set=($reg%5)+1;
             $set="pro_set".$set;  
             $sql="SELECT * FROM $set WHERE id='$ques'";
             $result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
             $ques=$row['ques'];  
             $temp='QUE/PSI_'.$ques.'.PNG';  
             //echo $temp;
              echo '<img src="'.$temp.'" alt="Cover" class="five">';  
             ?>  
          </div>
            <div class="col-md-8 col-md-offset-4">
            <form action="" method="post">    
              <button type="submit" name="submit" style="width:21%;" value="1" class="btn">Correct </button>    
              <button type="submit" name="submit" value="0" style="width:21%;" class="btn">Incorrect </button>
            </form>
              </div>
            </div>
          
      </div>
     <!-- 
      <script type="text/javascript">
        setInterval(function(){
          var xmlhttp= new XMLHttpRequest();
          xmlhttp.open("GET","response.php",false);
          xmlhttp.send(null);
          str=xmlhttp.responseText;
          time=str.split(" ");
          if(time[0] == "TimeUp!!")
              window.location.replace("complete.php");
          else
              document.getElementById("time").innerHTML=str; 
      },1000)
      </script>-->
      <script>
        function fancyTimeFormat(time){   
         // Hours, minutes and seconds
          var hrs = ~~(time / 3600);
          var mins = ~~((time % 3600) / 60);
          var secs = time % 60;

          // Output like "1:01" or "4:03:59" or "123:03:59"
          var ret = "";

         if (hrs > 0) {
            ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
         }
            ret += "" + mins + ":" + (secs < 10 ? "0" : "");
            ret += "" + secs;
            ret="Time-Left: "+ret;
            return ret;
        }
        </script>
      <script type="text/javascript">
        var value=0;  
        var temp=<?php echo $dur;?> 
        if(localStorage.getItem("counter")){
           value = parseInt(localStorage.getItem("counter"));
           if(value<0||temp==300){
             value=300;
           }
        }else{
         value = 300;
        }
       var temp2=fancyTimeFormat(value);  
       document.getElementById('time').innerHTML = temp2;
       var counter = function (){
         value--;
         localStorage.setItem("counter", value);
        var temp1=fancyTimeFormat(value);  
        document.getElementById('time').innerHTML = temp1;
        if(value<=0){
            window.location.replace("complete.php");
        }
        
       };
       var interval = setInterval(function (){counter();}, 1000);
      </script> 
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
      
</body>
   
</html>