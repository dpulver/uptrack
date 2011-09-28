<?php
App::import('Vendor', 'fpdf17/fpdf');

class PDF extends FPDF
{
function Footer()
{
    //Go to 1.5 cm from bottom
    $this->SetY(-18);
    //Select Arial italic 8
    $this->SetFont('Arial','I',8);
    //Date printed
	$this->Cell(0,10,'Printed on ' . date('m / d / Y'));
	

}
}

$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();


//Logo
$pdf->Image('http://localhost/img/spmlogo.png',10,8,23);
    
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80);
$pdf->Cell(80,20,'my school Learning Center', 0, 1);

//Arial 12
$pdf->SetFont('Arial','',16);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,"",0,1,'C',1);

//Student info
$pdf->SetFont('Arial','',12);
$pdf->Cell(80,8,'Name: '. $intervention['Student']['full_name']);
$pdf->Cell(80,8,'Student ID: '. $intervention['Student']['student_id'],0,1);

$pdf->Cell(80,8,'Teacher: '. $intervention['Student']['teacher']);
$pdf->Cell(80,8,'Grade: '. $intervention['Student']['grade'],0,1);

//Line break
$pdf->Ln(4);

//Arial 12
$pdf->SetFont('Arial','',16);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,$intervention['Skill']['name'],0,1,'C',1);
//Line break
$pdf->Ln(4);

$pdf->SetFont('Arial','',16);
$pdf->Cell(80,10,'$complete?');
$pdf->Cell(80,10,'$goal percent' . '% Complete',0,1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(80,10,'Start Date: '. $intervention['Intervention']['start_date']);
if ($intervention['Intervention']['completed'])
	$pdf->Cell(80,10,'End Date: '. $intervention['Intervention']['end_date'],0,1);
else $pdf->Cell(80,10,'End Date: ',0,1);

$pdf->Cell(80,10,'Performance Goal: '. $intervention['Intervention']['goal_score']);
$pdf->Cell(80,10,'Duration: '. $intervention['Skill']['duration'] . ' weeks',0,1);

$pdf->MultiCell(0,6,'Intervention: '. $intervention['Intervention']['goal_text'],0,1);

$pdf->Cell(80,10,"Intervention Strategy: Learning Center: small group, 45 minutes per day, 4x week",0,1);

$pdf->Cell(80,10,'Baseline: '. $intervention['Intervention']['baseline1'] . ' avg' ,0);

$pdf->Cell(80,10,"Scores  1st " . $intervention['Intervention']['baseline1']  .
	" |  2nd " . $intervention['Intervention']['baseline2'] . " |  3rd " . $intervention['Intervention']['baseline3'],0,1);

//weekly scores 
//Header
$pdf->Cell(20,7,"Week",1);
$col=1;
while($col<=$intervention['Skill']['duration'])
  {
  $pdf->Cell(13,7,"wk$col",1);
  $col++;
  }	
$pdf->Ln();

//Data
$pdf->Cell(20,7,"Score",1);
foreach ($intervention['InterventionDetail'] as $interventionDetail):
	$pdf->Cell(13,7,$interventionDetail['score'],1);
endforeach;
$pdf->Ln(10);

$pdf->MultiCell(0,6,'Notes: '. $intervention['Intervention']['notes'],0,1);


$pdf->ln();
$pdf->Image('http://localhost/interventions/graph/' . $intervention['Intervention']['id'],10,175,'','','PNG');

$pdf->Output();

?>