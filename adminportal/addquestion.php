<?php
  include('session.php');
?>
<html>
   
   <head>
      <title>Add Question Page</title>
      <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="form.css" type="text/css">
       <style type="text/css">
           .inv {
              display: none;
            }
           </style>
   </head>
   
   <body >
	<a href="http:profile.php" style="color:pink;"><h4>Back to home page</h4></a>
      <div class="body-content">
         <div class="module">
           <h1>Question Description:</h1>
              <div class="alert alert-error"></div>
               <form action = "addquestion1.php" method = "post">
                  <label>Test Type:</label><select name="type1" id="target1" required>
                      <option value="">Select...</option>
                      <option value="sampletest" >SampleTest</option>
                      <option value="round2" >Round2</option>   
                   </select> <br><br>
                   <div class="inv" id="sampletest">   
                   <label>SampleTestName.:</label><select name="sampletestn" required>
                      <?php 
                         $sql="SELECT * FROM sampletest";
                         $result=mysqli_query($con,$sql);
                         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $sampletestn=$row['name'];
                             ?>
                            <option value="<?php echo $sampletestn; ?>"><?php echo $sampletestn; ?></option>
                            <?php
                         }
                       ?>
                    </select> <br><br>
                   </div>
                  <label>Question :</label><input type = "text" name = "question" autofocus required/><br /><br />
                   <label>Score :</label><input type = "text" name = "score" autofocus required/><br /><br />
                   <label>Type:</label><select name="type" id="target" required>
                      <option value="">Select...</option>
                      <option value="singlecorrect" >Single Correct</option>
                      <option value="multiple" >Multiple Correct</option>
                      <option value="subjective" >Subjective</option>   
                   </select> <br><br>
                <div id="multiple" class="inv">  
				  <label>Option1 :</label><input type = "text" name = "option1" autofocus reqiured/><br /><br />
                  <label>Option2 :</label><input type = "text" name = "option2" autofocus reqiured/><br /><br />
                  <label>Option3 :</label><input type = "text" name = "option3" autofocus reqiured/><br /><br />
                  <label>Option4 :</label><input type = "text" name = "option4" autofocus reqiured/><br /><br />
                  <label>Answer:</label><select name="answer" required>
                      <option value="1000">A</option>
                      <option value="0100">B</option>
                      <option value="0010">C</option>
                      <option value="0001">D</option>
                      <option value="1100">A,B</option>
                      <option value="1010">A,C</option>
                      <option value="1001">A,D</option>
                      <option value="0110">B,C</option>
                      <option value="0101">B,D</option>
                      <option value="0011">C,D</option>
                      <option value="1110">A,B,C</option>
                      <option value="1101">A,B,D</option>
                      <option value="1011">A,C,D</option>
                      <option value="0111">B,C,D</option>
                      <option value="1111">A,B,C,D</option>
                   </select> <br><br>
                   </div>
                  <div id="singlecorrect" class="inv">  
				  <label>Option1 :</label><input type = "text" name = "option1" autofocus reqiured/><br /><br />
                  <label>Option2 :</label><input type = "text" name = "option2" autofocus reqiured/><br /><br />
                  <label>Option3 :</label><input type = "text" name = "option3" autofocus reqiured/><br /><br />
                  <label>Option4 :</label><input type = "text" name = "option4" autofocus reqiured/><br /><br />
                  <label>Answer:</label><select name="answer" required>
                      <option value="1000">A</option>
                      <option value="0100">B</option>
                      <option value="0010">C</option>
                      <option value="0001">D</option>
                     </select> <br><br>
                   </div>
                   <div id="subjective" class="inv">   
                     <label>Answer :</label><input type = "text" name = "answer1" autofocus reqiured/><br /><br />
                   </div>
                <!-- Java Script-->   
                   <script type="text/javascript">
                        document
                            .getElementById('target')
                            .addEventListener('change', function () {
                                'use strict';
                                var vis = document.querySelector('.vis'),   
                                target = document.getElementById(this.value);
                                if (vis !== null) {
                                    vis.className = 'inv';
                                }
                                if (target !== null ) {
                                    target.className = 'vis';
                                }
                            });
                </script>
                   <script type="text/javascript">
                        document
                            .getElementById('target1')
                            .addEventListener('change', function () {
                                'use strict';
                                var vis = document.querySelector('.vis'),   
                                target = document.getElementById(this.value);
                                if (vis !== null) {
                                    vis.className = 'inv';
                                }
                                if (target !== null ) {
                                    target.className = 'vis';
                                }
                            });
                </script>
                   
                    <label>Level:</label><select name="level" required>
                      <option value="level1">Level1</option>
                      <option value="level2">Level2</option>
                      <option value="level3">Level3</option>   
                   </select> <br><br>
                <div class="inv" id="round2">   
                   <label>Section:</label><select name="section" required>
                      <option value="section1">Section1</option>
                      <option value="section2">Section2</option>
                      <option value="section3">Section3</option>
                    </select> <br><br>
                   </div>
                   <label>Skill1:</label><select name="skill1" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>   
                   </select> <br><br>
                   
                   <label>Skill2:</label><select name="skill2" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>   
                   </select> <br><br>
                   <label>Skill3:</label><select name="skill3" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>   
                   </select> <br><br>
                   <label>Skill4:</label><select name="skill4" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>   
                   </select> <br><br>
                   <label>Skill5:</label><select name="skill5" required>
                      <option value="0">No</option>
                      <option value="1">Yes</option>   
                   </select> <br><br>
                   
				  <input type = "submit" value = " Submit " class="btn btn-block btn-primary"/><br />
               </form>
					
           
				
         </div>
			
      </div>

   </body>


       
</html>
