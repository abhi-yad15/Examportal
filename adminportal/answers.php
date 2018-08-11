<?php
     include('session.php');
     $level=$_GET['level'];
     $level1=$level."q";
?>
<html>
   
   <head>
      <title>Check Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
       <style>
         #table{
             display: none;
         }
           .article {
               margin-left: 170px;
               border-left: 1px solid gray;
               padding: 1em;
               overflow: hidden;
           }
       </style>
     <script type="text/javascript">
        function show(){
            document.getElementById("table").style.display="block";    
        }  
       </script>
   </head>
    <body>
        <a href="check.php" style="color:white;"><h1>Optional:</h1></a><br>
        <a href="#" onclick='show();'style="color:red;"><h1>Subjective:</h1></a><br>
        
        <div class="subjective" id="table">
          <?php
          $query = "SELECT * FROM entries WHERE level='$level'"; 	 
          if(!mysqli_query($con,$query)){
	         die('Error: ' . mysqli_error($con));
          }
          $result=mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $temp=$row['name'];
            $temp1=$row['username'];  
            echo '<td> <a href="show.php?username=' . $temp1 . '">' . $temp . '</a></td>';  
            echo "<br><br>";  
          }  
        ?>    
        </div>
    </body>
</html>