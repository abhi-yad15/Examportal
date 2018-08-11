<?php
    $servername = "localhost";
    $serverusername = "intellifyiitd16"; 
    $serverpassword = "intellify2016";
    $db="intellify";
   $error="";
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $myusername=$_POST['username'];
      $password=$_POST['password'];
		$count =1;
  // Create connection
  $con = new mysqli($servername, $serverusername, $serverpassword,$db);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
    
    //getting password   
    $query = "SELECT * FROM isco_admin1 ";
    //$password = md5($password);	
 
	 
  if(!mysqli_query($con,$query)){
	die('Error: ' . mysqli_error($con));
  }
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $check1=$row['username'];
  $check2=$row['password'];
  //verifying password
  if($myusername==$check1 && $password==$check2){
    $count=1;
  }
	else{
	   $count =0;
        echo "Your Username/Password is invalid:";
	}
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: profile.php");
      }
       else {
         $echo = "Your UserName or Password is invalid";
		 
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
      
   </head>
   
   <body >
	
      <div class="body-content">
         <div class="module">
           <h1>Login</h1>
              <div class="alert alert-error"><?php echo $error; ?></div>
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" autofocus required/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" required /><br/><br />
                  <input type = "submit" value = " Submit " class="btn btn-block btn-primary"/><br />
               </form>
				 
				
         </div>
			
      </div>

   </body>
</html>