<?php
echo "Hi!";
include('../session.php');
$sql="SELECT * FROM isco_2638_level3";
echo $sql;
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $reg=$row['reg'];
    $sql="SELECT * FROM details WHERE reg='$reg'";
    $result1=mysqli_query($con,$sql);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $username=$row1['username'];
    $sql="SELECT * FROM entries WHERE username='$username'";
    $result1=mysqli_query($con,$sql);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $name=$row1['name'];
    $sql="UPDATE isco_2638_level3 SET username='$username',name='$name' WHERE reg='$reg'";
    echo $sql;
    echo "<br />";
    $result1=mysqli_query($con,$sql);
}
?>
