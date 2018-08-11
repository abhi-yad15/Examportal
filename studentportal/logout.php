<?php
   session_start();
   
   if(session_destroy()) {
      mysqli_close($con);
      header("Location: ../../index.html");
   }
?>