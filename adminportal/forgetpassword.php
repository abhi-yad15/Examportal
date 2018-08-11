<?php
define("PROJECT_HOME","http://localhost/phpsamples/");

define("PORT", ""); // port number
define("MAIL_USERNAME", ""); // smtp usernmae
define("MAIL_PASSWORD", ""); // smtp password
define("MAIL_HOST", ""); // smtp host
define("MAILER", "smtp");

define("SENDER_NAME", "Admin");
define("SERDER_EMAIL", "admin@admin.com");
?>
<?php
    $servername = "localhost";
    $serverusername = "root"; 
    $serverpassword = "";
    $db="examstudent";
   $error="";
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	  $myusername=$_POST['username'];
		$count =1;
  // Create connection
  $con = new mysqli($servername, $serverusername, $serverpassword,$db);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
    
    //getting password   
    $query = "SELECT * FROM admin1 ";
    //$password = md5($password);	
 
	 
  if(!mysqli_query($con,$query)){
	die('Error: ' . mysqli_error($con));
  }
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $check1=$row['username'];
  $check2=$row['password'];
  //emailing password
    if(!class_exists('PHPMailer')) {
        require('phpmailer/class.phpmailer.php');
	    require('phpmailer/class.smtp.php');
    }

       require_once("mail_configuration.php");

       $mail = new PHPMailer();

       $emailBody = "<div>" . $user["member_name"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "php-forgot-password-recover-code/reset_password.php?name=" . $user["member_name"] . "'>" . PROJECT_HOME . "php-forgot-password-recover-code/reset_password.php?name=" . $user["member_name"] . "</a><br><br></p>Regards,<br> Admin.</div>";

       $mail->IsSMTP();
       $mail->SMTPDebug = 0;
       $mail->SMTPAuth = TRUE;
       $mail->SMTPSecure = "tls";
       $mail->Port     = PORT;  
       $mail->Username = MAIL_USERNAME;
       $mail->Password = MAIL_PASSWORD;
       $mail->Host     = MAIL_HOST;
       $mail->Mailer   = MAILER;

       $mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
       $mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
       $mail->ReturnPath=SERDER_EMAIL;	
       $mail->AddAddress($user["member_email"]);
       $mail->Subject = "Forgot Password Recovery";		
       $mail->MsgHTML($emailBody);
       $mail->IsHTML(true);

       if(!$mail->Send()) {
	       $error_message = 'Problem in Sending Password Recovery Email';
       } else {
	       $success_message = 'Please check your email to reset password!';
       }

?>       
 
}
?>
<html>
   
   <head>
      <title>ForgetPassword Page</title>
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
                  <input type = "submit" value = " Submit " class="btn btn-block btn-primary"/><br />
               </form>
				 <a href="login.php" style="color:red;"><h4>Back to login Page:</h4></a><br> 	
           
				
         </div>
			
      </div>

   </body>
</html>