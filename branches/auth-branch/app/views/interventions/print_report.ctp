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

$pdf->Cell(0);    
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,12,Configure::read('School.name'), 0, 1, 'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,Configure::read('School.year'), 0, 2, 'R');

//Arial 12
$pdf->SetFont('Arial','',16);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,"",0,1,'C',1);

//Student info
$pdf->SetFont('Arial','',12);
$pdf->Cell(80,8,'Name: '. $intervention['Student']['full_name']);
$pdf->Cell(80,8,'Student ID: '. $intervention['Student']['id_number'],0,1);
$pdf->Cell(80,8,'Teacher: '. $intervention['Student']['teacher']);
$pdf->Cell(80,8,'Grade: '. $intervention['Student']['grade'],0,1);

//Line break
$pdf->Ln(4);

$pdf->SetFont('Arial','',16);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,$intervention['Skill']['name'],0,1,'C',1);
//Line break
$pdf->Ln(4);

$pdf->SetFont('Arial','',12);
$pdf->Cell(80,10,'Intervention Tier: ');
$pdf->Cell(80,10,'Instructor: ' . $intervention['Instructor']['full_name'],0,1);

$pdf->Cell(80,10,'Start Date: '. $intervention['Intervention']['start_date']);
if ($intervention['Intervention']['completed'])
	$pdf->Cell(80,10,'End Date: '. $intervention['Intervention']['end_date'],0,1);
else $pdf->Cell(80,10,'End Date: ',0,1);

$pdf->Cell(80,10,'Performance Goal: '. $intervention['Intervention']['goal_score']);
$pdf->Cell(80,10,'Duration: '. $intervention['Skill']['duration'] . ' weeks',0,1);

$pdf->MultiCell(0,6,'Targeted Skill: '. $intervention['Intervention']['goal_text'],0,1);

$pdf->Cell(80,10,"Intervention Strategy: Learning Center: small group, 45 minutes per day, 4x week",0,1);

$pdf->Cell(80,10,'Baseline: '. $intervention['Intervention']['baseline'],0);

$pdf->Cell(80,10,'',0,1);

//weekly scores 
//Header
$pdf->Cell(25,7,"Score Seq",1);
$col=1;
while($col<=$intervention['Skill']['duration'])
  {
  $pdf->Cell(13,7,"wk$col",1);
  $col++;
  }	
$pdf->Ln();

//Data
$pdf->Cell(25,7,"Score",1);
foreach ($intervention['InterventionDetail'] as $interventionDetail):
	$pdf->Cell(13,7,$interventionDetail['score'],1);
endforeach;
$pdf->Ln();

//Dates
$pdf->Cell(25,7,"Dates",1);
foreach ($intervention['InterventionDetail'] as $interventionDetail):
	if ($interventionDetail['date'] != NULL){
	$date = new DateTime($interventionDetail['date']);
	$pdf->Cell(13,7,$date->format("m/d"),1);
	}
endforeach;
$pdf->Ln(10);

$pdf->MultiCell(0,6,'Notes: '. $intervention['Intervention']['notes'],0,1);


$pdf->ln();
$pdf->Image('http://localhost/interventions/graph/' . $intervention['Intervention']['id'],10,175,'','','PNG');

$pdf->Output();

?>