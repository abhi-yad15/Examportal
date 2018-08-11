<script type="text/javascript">
function funba(qno){
    var xhttp= new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(qno).className = "button ba";
                }
            };
                xhttp.open("GET", "new1.php", true);
                xhttp.send();
}
</script>
<script type="text/javascript">
function funbna(qno){
    var xhttp= new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(qno).className = "button bna";
                }
            };
                xhttp.open("GET", "new1.php", true);
                xhttp.send();
}
</script>
<script type="text/javascript">
          function show(currentsection,id){
            var xhttp= new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ques").innerHTML = this.responseText;
                }
            };
                xhttp.open("POST", "show.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                str="sec="+currentsection+"&id="+id  ;
                xhttp.send(str);
          }
      </script>

<?php 
 include('../session.php');
 $sub=$level."_sub_ans";
 $sql="SELECT * FROM $sub WHERE username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $reg=$row['reg'];
    $dur=$row['duration'];
    $duration = $dur-1;
    $sql="UPDATE $sub SET duration='$duration' WHERE username='$username'";
    mysqli_query($con,$sql);
    if($dur<=0)
     header("location: complete.php");    
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     $qno = mysqli_real_escape_string($con,$_POST['qno']);
     $answer=mysqli_real_escape_string($con,$_POST['ans']);
     //$qno%=31;
     $temp="a".$qno;
     $set=($reg%5)+1;
        $set="sub_set0";  
        $sql="SELECT * FROM $set WHERE id='$qno'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $temp1=$row['ques'];
        $set1=$level."_sub_que";
        $sql="SELECT * FROM $set1 WHERE id='$temp1'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $temp1=$row['ans'];
        $ans=0;
        $sql="SELECT * FROM $sub WHERE username='$username'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $ques=$row['ques'];
        $score=$row['score'];
        $already=$row[$temp];
        if($temp1=="A")
           $temp1='1';
        if($temp1=="B")
           $temp1='2';
        if($temp1=="C")
           $temp1='3';
        if($temp1=="D")
           $temp1='4';
        if($already==$temp1)
            $ans--;
        if($already==1)
            $ans--;
        if($temp1==$answer)
          $ans+=1;
        else
          $ans+=0;
        $ques++; 
        $score+=4*$ans;
        //echo $ans;
        $sql="UPDATE $sub set $temp='$answer', ques='$ques',score='$score' WHERE username='$username'";
        $result4=mysqli_query($con,$sql); 
        $qno++;
        $id1="a".$qno; 
     if($result4){
         if($answer=="0000" || $answer=="")
         {
             echo "<script>funbna(".$qno.")</script>";
         }
         else
         {
             echo "<script>funba(".$qno.")</script>";
         }
         echo "<script >
         fun();
         
         </script>";      
         if($qno<=40){
         echo "<script>
           show('sub_".$id1."','".$qno ."');
             </script> ";
         }
     }
     else{
         echo $error;
     }
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
        <!--  <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
              <li ><a href="details.php">Details</a></li>
            <li><a href="markdetails.php">Detailed Marks</a></li>
            <li><a href="notifications.php">Notifications</a></li>
              <li><a href="task.php">Tasks</a></li>
              <li><a href="queries.php">Queries</a></li>
          </ul> 
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
          </div>
    </nav>
	
      <div class="container">
          <div class="row" id="time" style="font-size:25px;font-weight:bold; color:red;">Time left:</div>
        <div class="row">
          <div class="col-md-3" id="penal">
          <?php
              $currentsection="sub";
                $i=1;
            $sql="SELECT * FROM $sub WHERE username='$username'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
              echo "<h1>Subjective Type<h1>";
                while($i<=40 ){                  
                  $id="a".$i;
                    if($row[$id]==null || $row[$id]=="0000" || $row[$id]==""){
                    //yha pr kuch krna hai    
              ?>
              
                <button value="<?php echo $currentsection."_".$id; ?>" id="<?php echo $i;?>" type="button" class='button bna' onclick="show(this.value,this.id)"><?php echo $i; ?></button>
              <?php
                    }
                    else{?>
                <button value="<?php echo $currentsection."_".$id; ?>" id="<?php echo $i;?>" type="button" class='button ba' onclick="show(this.value,this.id)"><?php echo $i; ?></button>
              <?php
                    }
              if($i%5==0)
                  echo "<br>";
                $i++;    
              }?>
              <form method="post" action="complete.php" onsubmit="return confirm('You will not be able to change your answers later. If you want to finish click OK');" >
              <input type=submit class="btn btn-primary" name="submit" value="Submit" ></form>
          </div>
          <div class="col-md-9"  id="ques"></div>
          </div></div>

     <!-- <script type="text/javascript">
      setInterval(function()
                  {
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
      </script> -->
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
        if(localStorage.getItem("counter2")){
           value = parseInt(localStorage.getItem("counter2"));
           if(value<0||temp==3600){
             value=3600;
           }
        }else{
         value = 3600;
        }
       var temp1=fancyTimeFormat(value);  
       document.getElementById('time').innerHTML = temp1;
       var counter = function (){
         value--;
         localStorage.setItem("counter2", value);
        var temp2=fancyTimeFormat(value);  
        document.getElementById('time').innerHTML = temp2;
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