<?php
 $error="";
 session_start();
 $_SESSION['type']="admin1";
 ?>

<html>
   
   <head>
      <title>Change Password</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
      
   </head>
   
   <body >
	
      <div class="body-content">
         <div class="module">
           <h1>Change Your Password:</h1>
              <div class="alert alert-error"></div>
               <form action = "changeaction.php?type=admin1" method = "post">
			       
			        
				  
                  <label>Old Password  :</label><input type = "password" name = "oldpassword" required/><br /><br />
				  <label>New Password  :</label><input type = "password" name = "newpassword" required/><br /><br />
				  <label>Confirm New Password  :</label><input type = "password" name = "cnewpassword" required/><br /><br />
                  <input type = "submit" value = " Submit " class="btn btn-block btn-primary"/><br />
               </form>
					
         </div>
			
      </div>

   </body>
</html>