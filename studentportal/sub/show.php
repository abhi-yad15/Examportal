<?php
    include('../session.php');
     $sub=$level."_sub_ans";
     $sql="SELECT * FROM $sub WHERE username='$username'";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $reg=$row['reg'];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $cursec=mysqli_real_escape_string($con,$_POST['sec']);
        $section=substr($cursec,0,strpos($cursec,"_"));
        $id=substr($cursec,strpos($cursec,"_")+1);
        $sno=mysqli_real_escape_string($con,$_POST['id']);
        echo "<h2 style='display:inline-block;'>Question ".$sno.":</h2>&nbsp;&nbsp";
        $set=($reg%5)+1;
        $set="sub_set".$set;
        $sql="SELECT * FROM $set WHERE id='$sno'";
        $result1=mysqli_query($con,$sql);
        $row2 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        $ques=$row2['ques'];
        $set1=$level."_sub_que";
        $result3=mysqli_query($con,"SELECT * FROM $set1 WHERE id='$ques'");
        $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);       
        $answer=$row[$id];
        $ques1=$row3['ques'];
        $pics=$row3['pics'];
        echo "<h3 style='display:inline-block;'>Single Answer Correct.</h3>";
        
        echo "<h3>".$ques1."</h3><br>";
        if($pics!=NULL){
            $temp=$level.'/'.$pics; 
              echo '<img src="'.$temp.'" alt="Cover" class="five">';
        }
        echo "<form class='form' method='post' action=''>";
        echo "<input type='hidden' name='section' value='".$section."' >";
        echo "<input type='hidden' name='id' value='".$id."' >";
        echo "<input type='hidden' name='qno' value='".$sno."' >";
        echo "<input type='hidden' name='ans' value='0' >";
            
            for($i=1;$i<=4;$i++){
                if($answer==$i){
                    echo "<input type='radio' name='ans' value='$i' checked>&nbsp;&nbsp;".$row3["option{$i}"]."<br><br>";}
                else{
                    echo "<input type='radio' name='ans' value='$i' >&nbsp;&nbsp".$row3["option{$i}"]."<br><br>";}
            }
        echo "<input type='submit' value='Save and Next' class='btn btn-primary' name='submit'></form>";
    }
?>