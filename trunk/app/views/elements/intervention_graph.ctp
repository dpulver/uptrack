<?php
// Student skill data
$ydata = array($baseline, $wk1, $wk2, $wk3, $wk4, $wk5, $wk6, $wk7, $wk8, $wk9, $wk10, $wk11, $wk12, $wk13);
$ydata = array_splice($ydata, 0, ($dur + 1));
foreach ($ydata as &$point) {
	if ($point == 0) 
			$point = "";
}

$ydata2 = array($baseline,"-","-","-","-","-","-","-","-","-","-","-","-");
$ydata2 = array_splice($ydata2, 0, $dur);
array_push($ydata2, $goalperf);

// Create the graph. These two calls are always required
$graph  = new Graph(550, 250,"auto");    
$graph->SetScale( "textlin", 0, 150);

// Specify X-labels
$databarx = array(B,1,2,3,4,5,6,7,8,9,10,11,12,13);
$graph->xaxis->SetTickLabels($databarx);


// Create the linear plot
$lineplot =new LinePlot($ydata);
$lineplot-> mark->SetType(MARK_UTRIANGLE );
$lineplot2 =new LinePlot($ydata2);

$lineplot ->SetColor("blue");

// Add the plot to the graph
$graph->Add($lineplot);
$graph->Add($lineplot2);

$graph->img->SetMargin(40,140,20,40);
$graph->title->Set("Progress Monitoring Graph");
$graph->xaxis->title->Set("Week");
$graph->yaxis->title->Set("Performance (Based on Measure)");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

$lineplot->SetColor("blue");
$lineplot->SetWeight(2);

$lineplot2->SetColor("red");
$lineplot2->SetWeight(2);

// Set the legends for the plots
$lineplot->SetLegend("Student\nProgress");
$lineplot2->SetLegend("Goal");

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_VERT);
$graph->legend->Pos(0.05,0.5,"right","center");


?>