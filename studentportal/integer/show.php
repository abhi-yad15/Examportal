<?php
    include('../session.php');
     $sub=$level."_integer_ans";
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
        $ques=$sno;
        $set=$level."_integer_que";
        $result3=mysqli_query($con,"SELECT * FROM $set WHERE id='$ques'");
        $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);       
        $answer=$row[$id];
        $ques1=$row3['ques'];
        $pics=$row3['pics'];
        echo "<h3 style='display:inline-block;'>Single Answer Correct.</h3><br/>";
        
        echo "".$ques1."";
        if($pics!=NULL){
            $temp='QUE/'.$pics; 
              echo '<img src="'.$temp.'" alt="Cover" class="five">';
        }
        echo "<form class='form' method='post' action=''>";
        echo "<input type='hidden' name='section' value='".$section."' >";
        echo "<input type='hidden' name='id' value='".$id."' >";
        echo "<input type='hidden' name='qno' value='".$sno."' >";
        echo "<input type='hidden' name='ans' value='0' >";
            ?>
           <label>Answer:</label><select name="ans" style="width:200px;" required>
                      <option value="">Select...</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      
                     </select> <br>
          <?php
        echo "<input type='submit' value='Save' class='btn btn-primary' name='submit'></form>";
    }
?>