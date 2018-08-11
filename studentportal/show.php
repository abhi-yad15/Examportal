<?php
  include('session.php');
	 //$event=$_GET['name'];
     $event=$_REQUEST['event'];
     $event1=$level."_".$event;
	 $query = "SELECT * FROM $event1 ORDER BY score DESC ,time ASC"; 
     if(!mysqli_query($con,$query)){
	   die('Error: ' . mysqli_error($con));
     }
     $result=mysqli_query($con,$query);
 ?>
      <table class="table-fill">
              <tr class="tableizer-firstrow" style="text-color:blue;"><th>Name</th><th>Rank</th><th style="width:100%;">School</th></tr>
              
                <?php
                  $rank=0;
                  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                      $rank++;
                      $username1=$row['username'];
                      $sql="SELECT * FROM entries WHERE username='$username1'";
                      $result1=mysqli_query($con,$sql);
                      $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                      $name=$row1['name'];
                      $school=$row1['schoolname'];
                      ?>
                    <tr class="tableizer-firstrow">
                    <td class="tableizer-firstrow"><?php echo $name; ?></td>
                    <td class="tableizer-firstrow"><?php echo $rank; ?></td>
                    <td class="tableizer-firstrow"><?php echo $school; ?></td>
                    </tr>    
                  <?php
                  }  
                ?>                    
          </table>