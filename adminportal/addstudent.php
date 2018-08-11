<?php
 include('session.php');

?>
<html>
   
   <head>
      <title>Add Student Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="form.css" type="text/css">
      
   </head>
   
   <body >
	<a href="http:profile.php" style="color:pink;"><h4>Back to home page</h4></a>
      <div class="body-content">
         <div class="module">
           <h1>Student Description:</h1>
              <div class="alert alert-error"></div>
               <form action = "addstudent1.php" method = "post">
                  <label>Name :</label><input type = "text" name = "name" autofocus required/><br /><br />
				  <label>Username :</label><input type = "text" name = "username" autofocus reqiured/><br /><br />
				  <label>Password :</label><input type = "text" name = "password" autofocus required/><br /><br />
				   <label>Level:</label><select name="level" required>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>   
                   </select> <br><br>
				  <label>Region:</label><input type = "text" name = "region"  required/><br/><br />
                   <label>Duration in minutes:</label><input type="text" name = "duration"  required/><br/><br />
				 <!-- <label>Region :</label> <textarea  type = "text" name = "task"cols="20" rows="5" style="height:200px;"></textarea><br>-->
				  <input type = "submit" value = " Submit " class="btn btn-block btn-primary"/><br />
               </form>
					
           
				
         </div>
			
      </div>

   </body>


       
</html>
