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
/*
//skill completion check
if ($end == 1)
	$exit_state = ':) Completed';
else
	$exit_state = 'X  Not Completed';

//average baseine
$baseline = ($b1 + $b2 + $b3) / 3;
$baseline = round($baseline);

//calculate percent of goal
//(y - b) / x = m
//$dur = 8;
$pmulti = ($goalperf - $baseline) / $dur;
$pgoal = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
$pgoal =  array_splice($pgoal, 0, $dur);
foreach ($pgoal as &$point)
{
	$point = $point * $pmulti + $baseline;
	$point = round($point);
	//echo "$point ";
}
$stdperf = array($wk1, $wk2, $wk3, $wk4, $wk5, $wk6, $wk7, $wk8, $wk9, $wk10, $wk11, $wk12, $wk13);
$stdperf = array_splice($stdperf, 0, $dur);
$sum_pgoal = array_sum($pgoal);
$sum_stdperf = array_sum($stdperf);

//echo "<br />pmulti $pmulti<br />sum stdperf $sum_stdperf<br />sum pgoal $sum_pgoal";
if ($sum_pgoal != 0 && $sum_stdperf != 0) 
	$pgoalpercent =  $sum_stdperf / $sum_pgoal;
$pgoalpercent = $pgoalpercent * 100;
$pgoalpercent = round($pgoalpercent);
*/
$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();


//Logo
$pdf->Image('http://localhost/img/spmlogo.png',10,8,60);
    
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
$pdf->Cell(80,10,'End Date: '. $intervention['Intervention']['end_date'],0,1);

$pdf->Cell(80,10,'Performance Goal: '. $intervention['Intervention']['goal_score']);
$pdf->Cell(80,10,'Duration: '. $intervention['Skill']['duration'] . ' weeks',0,1);

$pdf->MultiCell(0,6,'Intervention: '. $intervention['Intervention']['goal_text'],0,1);

$pdf->Cell(80,10,"Intervention Strategy: Learning Center: small group, 45 minutes per day, 4x week",0,1);

$pdf->Cell(80,10,'Baseline: '. $intervention['Intervention']['baseline1'] . ' avg' ,0);

$pdf->Cell(80,10,"Scores  1st " . $intervention['Intervention']['baseline1']  .
	" |  2nd " . $intervention['Intervention']['baseline2'] . " |  3rd " . $intervention['Intervention']['baseline3'],0,1);
/*
//weekly scores 
//Header
$pdf->Cell(20,7,"Week",1);
$col=1;
while($col<=$dur)
  {
  $pdf->Cell(13,7,"wk$col",1);
  $col++;
  }	
$pdf->Ln();
//Data
$pdf->Cell(20,7,"Score",1);
foreach($stdperf as $col)
	$pdf->Cell(13,7,$col,1);
$pdf->Ln(10);

$pdf->MultiCell(0,6,'Notes: '. $notes,0,1);

//makes the graph
include 'do_skillgraph.php';

$im = "tmp_graph.png";

// save the graph
$graph->Stroke($im);
*/
$pdf->ln();
$pdf->Image('http://localhost/interventions/graph/4',10,175,'','','PNG');

$pdf->Output();

//unlink($im);

?>