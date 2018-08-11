<?php
include('../session.php');
date_default_timezone_set('Asia/Kolkata');
$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION['end_time'];
$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);
$differenceinseconds=$timesecond-$timefirst;
$new=gmdate("H:i:s",$differenceinseconds);
$set=$level."_memory_ans";
$result2=mysqli_query($con,"UPDATE $set SET duration='$differenceinseconds' WHERE username='$username'");
if($differenceinseconds<= 0)
    echo "TimeUp!!";
else
    echo "Time left: ".$new;
?>