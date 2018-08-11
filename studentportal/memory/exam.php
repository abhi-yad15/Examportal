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
 $sub=$level."_memory_ans";
 $sub1=$level."_memory_que";
 $sql="SELECT * FROM $sub1 WHERE id='1'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $image=$row['pics'];
 $image="QUE/".$image;
 $sql="SELECT * FROM $sub WHERE username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $reg=$row['reg'];
    $dur=$row['duration'];
    $shown=$row['shown'];
   // echo $shown;
    $duration = $dur-1;
    $sql="UPDATE $sub SET duration='$duration' WHERE username='$username'";
    mysqli_query($con,$sql);
    if($dur<=0)
     header("location: complete.php");
    $sql="UPDATE $sub set shown='1' WHERE username='$username'";
      mysqli_query($con,$sql);

 if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])){
     $qno = mysqli_real_escape_string($con,$_POST['qno']);
     $answer=mysqli_real_escape_string($con,$_POST['ans']);
     //$qno%=31;
     $temp="a".$qno;  
        $set1=$level."_memory_que";
        $sql="SELECT * FROM $set1 WHERE id='$qno'";
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
        if($temp1==$answer)
          $ans+=1;
        else
          $ans+=0;
        $ques++; 
        $score+=(4)*$ans;
        if($temp1==$answer)
            $ans=1;
        else
            $ans=0;
        $sql="UPDATE $sub set $temp='$answer', ques='$ques',score='$score', shown='1' WHERE username='$username'";
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
        //yha pr dekhna hai... 
      if($qno<=3){      
     echo "<script>
       show('sub_".$id1."','".$qno ."');
    </script> ";
     }}
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
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette">
  <link rel="stylesheet" href="sweetalert/./assets/example.css">
  <link rel="stylesheet" href="sweetalert/./assets/bootstrap4-buttons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="preload" href="https://unsplash.it/400/200/?random" as="image">
  <link rel="preload" href="https://bit.ly/1Nqn9HU" as="image">

  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- This is what you need -->
  <script src="sweetalert/./dist/sweetalert2.all.min.js"></script>
    <script> 
     $(document).ready(function(){
      Display111();
    });
   </script>
  <script type="text/javascript">
    function Display111(){
     var shown=<?php echo $shown;?>   
     var temp='<?php echo $image;?>';
     if(shown==0){        
      swal({
        title: 'Auto close alert!',
        text: '',
        imageUrl: temp,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
        animation: false,
        timer: 20000,
        onOpen: function () {
            swal.showLoading()
        }
      }).then(
        function () {},
        // handling the promise rejection
        function (dismiss) {
           if (dismiss === 'timer') {
             console.log('I was closed by the timer')
           }       
        })
       }
     }
 </script>
 <script type="text/javascript">
           function Redirect(){
            window.location.href = "registration/"
           }
        </script>       
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
              echo "<h1>Memory Index<h1>";?>
              <?php 
              $shown=$row['shown'];
            if($shown!=0){  
              while($i<=3 ){                  
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
              }
            }
         ?>
              <form method="post" action="complete.php" onsubmit="return confirm('You will not be able to change your answers later. If you want to finish click OK');" >
              <input type=submit class="button bna" style="width:100%" name="submit" value="Submit" ></form>
          </div>
          <div class="col-md-9"  id="ques"></div>
          </div></div>

      <!--<script type="text/javascript">
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
        if(localStorage.getItem("counter5")){
           value = parseInt(localStorage.getItem("counter5"));
           if(value<0||temp==150){
             value=150;
           }
        }else{
         value = 150;
        }
       var temp2=fancyTimeFormat(value);  
       document.getElementById('time').innerHTML = temp2;
       var counter = function (){
         value--;
         localStorage.setItem("counter5", value);
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