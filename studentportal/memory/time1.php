<?php
include('../session.php');
date_default_timezone_set('Asia/Kolkata');
$set=$level."_memory_ans";
$result2= mysqli_query($con,"SELECT * FROM $set WHERE username='$username'");
if(!$result2){
    echo "error in connection";
}
else{
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $duration=$row2['duration1'];
    $_SESSION['duration']=$duration;
    $_SESSION['start_time']=date("Y-m-d H:i:s");
    $end_time=date('Y-m-d H:i:s',strtotime("+".$_SESSION['duration'].'seconds',strtotime($_SESSION['start_time'])));
    $_SESSION['end_time']=$end_time;
?>
<script type="text/javascript">
   window.location="exam1.php";
</script>
<?php
}
?>
