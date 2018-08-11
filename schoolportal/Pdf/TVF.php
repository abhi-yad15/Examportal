<?php
include('../session.php');
require('fpdf.php');
class PDF extends FPDF
{
// Colored table
function FancyTable($header,$schoolname)
{ 
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(45,60,50, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    $conn =mysqli_connect("localhost","intellifyiitd16","intellify2016","intellify");
	 if(!$conn){
		 echo "Failed to connect to MYSQL: ". mysqli_connect_error();
	 }
    $sql="SELECT * FROM school_entries WHERE payment='5'";
   
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $temp=$row['username'];
        $sql="SELECT * FROM school_login WHERE username='$temp'";
        $result1=mysqli_query($conn,$sql);
        $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $this->Cell($w[0],6,$row['schooladdedby'],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row['email'],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row['username'],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$row1['password'],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
 
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Name', 'email', 'Username', 'Password');
$pdf->SetFont('Arial','',7);
$pdf->AddPage();
$pdf->FancyTable($header,$schoolname);
$pdf->Output();
?>