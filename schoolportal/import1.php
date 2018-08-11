<?php
 include('session.php');
$result1=mysqli_query($conn,"SELECT * FROM school_entries WHERE username='$login_session'");
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
 if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];        
         if($_FILES["file"]["size"] > 0)
         {
             $ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
             if($ext!=="csv"){
                 echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV(.csv) File.\");
                            window.location = \"import1.php\"
                          </script>";
                 die();
             }
              $file = fopen($filename, "r");
             $count = 0; 
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                $count++; 
                if($count>1){   
               $con= $conn;
                $name=$getData[0];
                $level=$getData[1];
                $email=$getData[2];
                $contact=$getData[3];
                $username=substr($name,0,strpos($name," ")). $login_session. rand(0,9999);
                $password=$username . rand(0,99);
               $sql = "INSERT into login (username,password) 
                   values ('".$username."','".$password."')";
                   $result = mysqli_query($con, $sql);
                $result2=mysqli_query($con, "INSERT into details (username,level,school) 
                   values ('".$username."','".$level."','".$login_session."')");
                $result3=mysqli_query($con, "INSERT into entries (username,level,name,email,schoolname,contact) 
                   values ('".$username."','".$level."','".$name."','".$email."','".$row1['name']."','".$contact."')");
             //   $username=$getData[2];
              if($result&&$result2&&$result3){    
	           $query = "SELECT * FROM students WHERE type='$level'";
                $result=mysqli_query($con,$query);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $temp=$row['count'];
                $temp++;
                $sql = "UPDATE students SET count='$temp' WHERE type='$level'";
                if(!mysqli_query($con,$sql)){
                    die('Error: ' . mysqli_error($con));
                }
      
              //  $structure = "submissions/{$subtype}/{$username}/";
            //    if (!mkdir($structure, 0, true)) {
              //      echo "Folder could not created.";
            //    }
              
                if(!isset($result)||!isset($result2)||!isset($result3))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File.\");
                            window.location = \"welcome.php\"
                          </script>";        
                }
                else {
                      echo "<script type=\"text/javascript\">
                        alert(\"CSV File has been successfully Imported.\");
                        window.location = \"welcome.php\"
                    </script>";
                }
             }
            }}
             fclose($file);  
           /*  $con=$conn;
             $uploadfile="studentsadded/"."$login_session.xlsx";
             move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
             
             set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = $uploadfile; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$name = trim($allDataInSheet[$i]["A"]);
$level = trim($allDataInSheet[$i]["B"]);
$email=trim($allDataInSheet[$i]["C"]);
$username=substr($name,0,strpos($name," ")). $login_session. rand(0,99);
                $password=$username . rand(0,99);
               $sql = "INSERT into login (username,password) 
                   values ('".$username."','".$password."')";
                   $result = mysqli_query($con, $sql);
                $result2=mysqli_query($con, "INSERT into details (username,level,school) 
                   values ('".$username."','".$level."','".$login_session."')");
                $result3=mysqli_query($con, "INSERT into entries (username,level,name,email,schoolname) 
                   values ('".$username."','".$level."','".$name."','".$email."','".$row1['name']."')");
             //   $username=$getData[2];
              if($result&&$result2&&$result3){    
	           $query = "SELECT * FROM students WHERE type='$level'";
                $result=mysqli_query($con,$query);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $temp=$row['count'];
                $temp++;
                $sql = "UPDATE students SET count='$temp' WHERE type='$level'";
                if(!mysqli_query($con,$sql)){
                    die('Error: ' . mysqli_error($con));
                }
      
              //  $structure = "submissions/{$subtype}/{$username}/";
            //    if (!mkdir($structure, 0, true)) {
              //      echo "Folder could not created.";
            //    }
              
                if(!isset($result)||!isset($result2)||!isset($result3))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload Excel File.\");
                            window.location = \"welcome.php\"
                          </script>";        
                }
                else {
                      echo "<script type=\"text/javascript\">
                        alert(\"Excel File has been successfully Imported.\");
                        window.location = \"welcome.php\"
                    </script>";
                }
             }
} */
         }
    }     
 ?>  
<html lang="en">
 
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <title>Import</title>
</head>
 
<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
                
 
                <form class="form-horizontal" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>Add Students</legend>
                    <p>Download <a href="assets/addstudents.xlsx">this Excel file</a> and fill in the required details in it. After that upload it below after converting it into CSV Format.
                        Please note that all fields must be filled without using any Commas(,). Check the excel file properly before converting and uploading.</p>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large" accept=".csv">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Import">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>
 
            </div>
             <div>
            <form class="form-horizontal" action="" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                             <!--   <input type="submit" name="Export" class="btn btn-success" value="export to csv"/>-->
                            </div>
                   </div>                    
            </form>           
 </div>
            <?php
              // get_all_records();
            ?>
            
            <a href="welcome.php" >Back to Home page</a>
        </div>
    </div>
</body>
 
</html>