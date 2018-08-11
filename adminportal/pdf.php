<?php
  include('session.php');
  $username=$_GET['name'];
  $query="SELECT * FROM entries WHERE username='$username'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $name=$row['name'];
  $query="SELECT * FROM details WHERE username='$username'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $score=$row['score'];
  $level=$row['level'];
  $skill1=$_GET['skill1a']."/".$_GET['skill1q'];
  $skill2=$_GET['skill2a']."/".$_GET['skill2q'];
  $skill3=$_GET['skill3a']."/".$_GET['skill3q'];
  $skill4=$_GET['skill4a']."/".$_GET['skill4q'];
  $skill5=$_GET['skill5a']." /".$_GET['skill5q'];
  $query="SELECT * FROM details WHERE level='$level' ORDER BY score DESC";
  $result=mysqli_query($con,$query);
  $rank=1;
  $i=1;
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
     $temp=$row['username'];
     if($temp==$username){
         $rank=$i;
     }
      $i++;
  }
  $percentile=(1-($rank-1)/$i)*100;
 ?>
<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('Abhishek.jpg',15,10,30);
    //$this->Image('capture.png',20,80,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
     $w = $this->GetStringWidth("Result")+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,"Result",1,1,'C',true);
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln();
$pdf->Cell(0,10,'Name:'.$name,0,1);
$pdf->Cell(0,10,'Level:'.$level,0,1);
$pdf->Cell(0,10,'Rank:'.$rank,0,1);
$pdf->Cell(0,10,'Total:'.$i,0,1);
$pdf->Cell(0,10,'Score:'.$score,0,1);
$pdf->Cell(0,10,'Percentile:'.$percentile,0,1);
$pdf->Cell(0,10,'Skillwise Performance:',0,1);
$pdf->Cell(0,10,'Skill1:'.$skill1,0,1);
$pdf->Cell(0,10,'Skill2:'.$skill2,0,1);
$pdf->Cell(0,10,'Skill3:'.$skill3,0,1);
$pdf->Cell(0,10,'Skill4:'.$skill4,0,1);
$pdf->Cell(0,10,'Skill5:'.$skill5,0,1);
$pdf->Output();

?>