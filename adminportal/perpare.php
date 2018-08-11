<?php
     include('session.php');
     $type=$_POST['type'];
    if($type=="round2"){
     $day=$_POST['day'];
     $n1=$_POST['section1'];
     $n2=$_POST['section2'];
     $n3=$_POST['section3'];
     $time=$_POST['time'];    
     $query="SELECT * FROM entries WHERE level='level1' AND day='$day'";
     $result=mysqli_query($con,$query);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $username=$row['username'];
        $k=0; 
        //section1
            //skill1
            oneskill("skill1",$con,"section1","level1",$username,$k,$n1);
            //skill1
            oneskill("skill2",$con,"section1","level1",$username,$k,$n1);
            //skill1
            oneskill("skill3",$con,"section1","level1",$username,$k,$n1);
            //skill1
            oneskill("skill4",$con,"section1","level1",$username,$k,$n1);
            //skill1
            oneskill("skill5",$con,"section1","level1",$username,$k,$n1);
        //section2
            //skill1 & skill2
            twoskill("skill1","skill2",$con,"section2","level1",$username,$k,$n2);
            //skill1 & skill3
            twoskill("skill1","skill3",$con,"section2","level1",$username,$k,$n2);
            //skill1 & skill4
            twoskill("skill1","skill4",$con,"section2","level1",$username,$k,$n2);
            //skill1 & skill5
            twoskill("skill1","skill5",$con,"section2","level1",$username,$k,$n2);
            //skill2 & skill3
            twoskill("skill2","skill3",$con,"section2","level1",$username,$k,$n2);
            //skill2 & skill4
            twoskill("skill2","skill4",$con,"section2","level1",$username,$k,$n2);
            //skill2 & skill5
            twoskill("skill2","skill5",$con,"section2","level1",$username,$k,$n2);
            //skill3 & skill4
            twoskill("skill3","skill4",$con,"section2","level1",$username,$k,$n2);
            //skill3 & skill5
            twoskill("skill3","skill5",$con,"section2","level1",$username,$k,$n2);
            //skill4 & skill5
            twoskill("skill4","skill5",$con,"section2","level1",$username,$k,$n2);
        //section3
            //skill1 & skill2 &skill3
            threeskill("skill1","skill2","skill3",$con,"section3","level1",$username,$k,$n3);
            //skill1 & skill2 &skill4
            threeskill("skill1","skill2","skill4",$con,"section3","level1",$username,$k,$n3);
            //skill1 & skill2 &skill5
            threeskill("skill1","skill2","skill5",$con,"section3","level1",$username,$k,$n3);
            //skill1 & skill3 &skill4
            threeskill("skill1","skill3","skill4",$con,"section3","level1",$username,$k,$n3);
            //skill1 & skill3 &skill5
            threeskill("skill1","skill3","skill5",$con,"section3","level1",$username,$k,$n3);
            //skill1 & skill4 &skill5
            threeskill("skill4","skill5","skill3",$con,"section3","level1",$username,$k,$n3);
            //skill2 & skill3 &skill4
            threeskill("skill2","skill3","skill4",$con,"section3","level1",$username,$k,$n3);
            //skill2 & skill3 &skill5
            threeskill("skill2","skill3","skill5",$con,"section3","level1",$username,$k,$n3);
            //skill2 & skill4 &skill5
            threeskill("skill2","skill4","skill5",$con,"section3","level1",$username,$k,$n3);
            //skill3 & skill4 &skill5
            threeskill("skill3","skill4","skill5",$con,"section3","level1",$username,$k,$n3);
            
           
    }
    $query="SELECT * FROM entries WHERE level='level2' AND day='$part'";
     $result=mysqli_query($con,$query);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $username=$row['username'];
        $k=0; 
        //section1
            //skill1
            oneskill("skill1",$con,"section1","level2",$username,$k,$n1);
            //skill1
            oneskill("skill2",$con,"section1","level2",$username,$k,$n1);
            //skill1
            oneskill("skill3",$con,"section1","level2",$username,$k,$n1);
            //skill1
            oneskill("skill4",$con,"section1","level2",$username,$k,$n1);
            //skill1
            oneskill("skill5",$con,"section1","level2",$username,$k,$n1);
        //section2
            //skill1 & skill2
            twoskill("skill1","skill2",$con,"section2","level2",$username,$k,$n2);
            //skill1 & skill3
            twoskill("skill1","skill3",$con,"section2","level2",$username,$k,$n2);
            //skill1 & skill4
            twoskill("skill1","skill4",$con,"section2","level2",$username,$k,$n2);
            //skill1 & skill5
            twoskill("skill1","skill5",$con,"section2","level2",$username,$k,$n2);
            //skill2 & skill3
            twoskill("skill2","skill3",$con,"section2","level2",$username,$k,$n2);
            //skill2 & skill4
            twoskill("skill2","skill4",$con,"section2","level2",$username,$k,$n2);
            //skill2 & skill5
            twoskill("skill2","skill5",$con,"section2","level2",$username,$k,$n2);
            //skill3 & skill4
            twoskill("skill3","skill4",$con,"section2","level2",$username,$k,$n2);
            //skill3 & skill5
            twoskill("skill3","skill5",$con,"section2","level2",$username,$k,$n2);
            //skill4 & skill5
            twoskill("skill4","skill5",$con,"section2","level2",$username,$k,$n2);
        //section3
            //skill1 & skill2 &skill3
            threeskill("skill1","skill2","skill3",$con,"section3","level2",$username,$k,$n3);
            //skill1 & skill2 &skill4
            threeskill("skill1","skill2","skill4",$con,"section3","level2",$username,$k,$n3);
            //skill1 & skill2 &skill5
            threeskill("skill1","skill2","skill5",$con,"section3","level2",$username,$k,$n3);
            //skill1 & skill3 &skill4
            threeskill("skill1","skill3","skill4",$con,"section3","level2",$username,$k,$n3);
            //skill1 & skill3 &skill5
            threeskill("skill1","skill3","skill5",$con,"section3","level2",$username,$k,$n3);
            //skill1 & skill4 &skill5
            threeskill("skill4","skill5","skill3",$con,"section3","level2",$username,$k,$n3);
            //skill2 & skill3 &skill4
            threeskill("skill2","skill3","skill4",$con,"section3","level2",$username,$k,$n3);
            //skill2 & skill3 &skill5
            threeskill("skill2","skill3","skill5",$con,"section3","level2",$username,$k,$n3);
            //skill2 & skill4 &skill5
            threeskill("skill2","skill4","skill5",$con,"section3","level2",$username,$k,$n3);
            //skill3 & skill4 &skill5
            threeskill("skill3","skill4","skill5",$con,"section3","level2",$username,$k,$n3);
            
           
    }
$query="SELECT * FROM entries WHERE level='level3' AND day='$part'";
     $result=mysqli_query($con,$query);
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $username=$row['username'];
        $k=0; 
        //section1
            //skill1
            oneskill("skill1",$con,"section1","level3",$username,$k,$n1);
            //skill1
            oneskill("skill2",$con,"section1","level3",$username,$k,$n1);
            //skill1
            oneskill("skill3",$con,"section1","level3",$username,$k,$n1);
            //skill1
            oneskill("skill4",$con,"section1","level3",$username,$k,$n1);
            //skill1
            oneskill("skill5",$con,"section1","level3",$username,$k,$n1);
        //section2
            //skill1 & skill2
            twoskill("skill1","skill2",$con,"section2","level3",$username,$k,$n2);
            //skill1 & skill3
            twoskill("skill1","skill3",$con,"section2","level3",$username,$k,$n2);
            //skill1 & skill4
            twoskill("skill1","skill4",$con,"section2","level3",$username,$k,$n2);
            //skill1 & skill5
            twoskill("skill1","skill5",$con,"section2","level3",$username,$k,$n2);
            //skill2 & skill3
            twoskill("skill2","skill3",$con,"section2","level3",$username,$k,$n2);
            //skill2 & skill4
            twoskill("skill2","skill4",$con,"section2","level3",$username,$k,$n2);
            //skill2 & skill5
            twoskill("skill2","skill5",$con,"section2","level3",$username,$k,$n2);
            //skill3 & skill4
            twoskill("skill3","skill4",$con,"section2","level3",$username,$k,$n2);
            //skill3 & skill5
            twoskill("skill3","skill5",$con,"section2","level3",$username,$k,$n2);
            //skill4 & skill5
            twoskill("skill4","skill5",$con,"section2","level3",$username,$k,$n2);
        //section3
            //skill1 & skill2 &skill3
            threeskill("skill1","skill2","skill3",$con,"section3","level3",$username,$k,$n3);
            //skill1 & skill2 &skill4
            threeskill("skill1","skill2","skill4",$con,"section3","level3",$username,$k,$n3);
            //skill1 & skill2 &skill5
            threeskill("skill1","skill2","skill5",$con,"section3","level3",$username,$k,$n3);
            //skill1 & skill3 &skill4
            threeskill("skill1","skill3","skill4",$con,"section3","level3",$username,$k,$n3);
            //skill1 & skill3 &skill5
            threeskill("skill1","skill3","skill5",$con,"section3","level3",$username,$k,$n3);
            //skill1 & skill4 &skill5
            threeskill("skill4","skill5","skill3",$con,"section3","level3",$username,$k,$n3);
            //skill2 & skill3 &skill4
            threeskill("skill2","skill3","skill4",$con,"section3","level3",$username,$k,$n3);
            //skill2 & skill3 &skill5
            threeskill("skill2","skill3","skill5",$con,"section3","level3",$username,$k,$n3);
            //skill2 & skill4 &skill5
            threeskill("skill2","skill4","skill5",$con,"section3","level3",$username,$k,$n3);
            //skill3 & skill4 &skill5
            threeskill("skill3","skill4","skill5",$con,"section3","level3",$username,$k,$n3);
      }
      header(Location:"profile.php");
    }
    else{
        $sampletestn=$_POST['sampletestn'];
        $number=$_POST['number'];
        $time=$_POST['time'];
        $level=$_POST['level'];
        $query="SELECT * FROM entries WHERE level='$level'";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $username=$row['username'];
            $sampletestn1=$sampletestn."_".$level;
            $sql="SELECT * FROM $sampletestn1";
            $result1=mysqli_query($con,$sql);
            $count=mysqli_num_rows($result1);
            $i=1;
            while($i<=$count){
                $sql="INSERT INTO $username (id,sno) VALUES ('$i','$i')";
		           if(!mysqli_query($con,$sql)){
                       die('Error: ' . mysqli_error($con));
		           } 
                $i++;
            }
        }
         $sql="UPDATE sampletest SET time='$time' WHERE name='$sampletestn'";
         mysqli_query($con,$sql);
    }
?>
<html>
   
   <head>
      <title>Check Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
      
   </head>
    
</html>
<?php
  function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
   function oneskill($skill,$con,$section,$level,$username,$k,$n){
     $section1=$level."q_".$section;
     $query="SELECT * FROM $section1 WHERE $skill='1'";
            $result1=mysqli_query($con,$query);
            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
            $count=$row1['count'];
            $numbers=UniqueRandomNumbersWithinRange(1,$count,$n/5) ;
            $i=1;
            $j=0;
            while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){    
               if($i==$numbers[$j]){
                   $k++;    
                   $sql="INSERT INTO $username (id,sno,section) VALUES ('$numbers[$j]','$k','$section')";
		           if(!mysqli_query($con,$sql)){
                       die('Error: ' . mysqli_error($con));
		           }   
                 $j++;
                }
                $i++;
           }      
   }
    function twoskill($skill1,$skill2,$con,$section,$level,$username,$k,$n){
     $section1=$level."q_".$section;
     $query="SELECT * FROM $section1 WHERE $skill1='1' AND $skill2='1'";
            $result1=mysqli_query($con,$query);
            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
            $count=$row1['count'];
            $numbers=UniqueRandomNumbersWithinRange(1,$count,$n/10) ;
            $i=1;
            $j=0;
            while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){    
               if($i==$numbers[$j]){
                   $k++;    
                   $sql="INSERT INTO $username (id,sno,section) VALUES ('$numbers[$j]','$k','$section')";
		           if(!mysqli_query($con,$sql)){
                       die('Error: ' . mysqli_error($con));
		           }   
                 $j++;
                }
                $i++;
           }      
    }
    function threeskill($skill1,$skill2,$skill3,$con,$section,$level,$username,$k,$n){
     $section1=$level."q_".$section;
     $query="SELECT * FROM $section1 WHERE $skill1='1' AND $skill2='1' AND $skill3='1'";
            $result1=mysqli_query($con,$query);
            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
            $count=$row1['count'];
            $numbers=UniqueRandomNumbersWithinRange(1,$count,$n/10) ;
            $i=1;
            $j=0;
            while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){    
               if($i==$numbers[$j]){
                   $k++;    
                   $sql="INSERT INTO $username (id,sno,section) VALUES ('$numbers[$j]','$k','$section')";
		           if(!mysqli_query($con,$sql)){
                       die('Error: ' . mysqli_error($con));
		           }   
                 $j++;
                }
                $i++;
           }      
    }
        
?>