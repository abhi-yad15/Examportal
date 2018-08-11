<?php
include('../session.php');
date_default_timezone_set('Asia/Kolkata');
$i=1;
$j=7;
while($i<=10){
    $k=$j+41;
    $sql = "INSERT INTO sub_set5 (ques) VALUES ('$k')"; 
    echo $sql;
    echo "<br />";
    $result1 = mysqli_query($con,$sql);
    $i++;
    $j+=11;
    $j%=20;
}
?>