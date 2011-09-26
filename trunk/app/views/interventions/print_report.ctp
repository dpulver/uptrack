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
//$pdf->Image('http://192.168.21.143/img/spmlogo.png',10,8,60);
    
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80);
$pdf->Cell(80,20,'Anton Elementary Learning Center', 0, 1);

//Arial 12
$pdf->SetFont('Arial','',16);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,"",0,1,'C',1);

$fname = 'bob';
$lname = 'student';
$studentid = '123456';
$teacher = 'teacher';
$grade = '6';



//Student info
$pdf->SetFont('Arial','',12);
$pdf->Cell(80,8,'Name: '. $fname . ' ' . $lname);
$pdf->Cell(80,8,'Student ID: '. $studentid,0,1);

$pdf->Cell(80,8,'Teacher: '. $teacher);
$pdf->Cell(80,8,'Grade: '. $grade,0,1);

//Line break
$pdf->Ln(4);
/*
//Arial 12
$pdf->SetFont('Arial','',16);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,"$skill",0,1,'C',1);
//Line break
$pdf->Ln(4);

$pdf->SetFont('Arial','',16);
$pdf->Cell(80,10,$exit_state);
$pdf->Cell(80,10,$pgoalpercent . '% Complete',0,1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(80,10,'Start Date: '. $sdate);
$pdf->Cell(80,10,'End Date: '. $edate,0,1);

$pdf->Cell(80,10,'Performance Goal: '. $goalperf);
$pdf->Cell(80,10,'Duration: '. $dur . ' weeks',0,1);

$pdf->MultiCell(0,6,'Intervention: '. $goaltxt,0,1);

$pdf->Cell(80,10,"Intervention Strategy: Learning Center: small group, 45 minutes per day, 4x week",0,1);

$pdf->Cell(80,10,'Baseline: '. $baseline . ' avg' ,0);

$pdf->Cell(80,10,"Scores  1st $b1  |  2nd $b2  |  3rd $b3  ",0,1);

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
$im = '"http://' . $_SERVER['SERVER_ADDR'] .'/interventions/graph/' . $intervention['Intervention']['id'] . '.png"';
$pdf->ln();
$pdf->Image($im,10,175,'','','png');

$pdf->Output();

//unlink($im);

?>