<?php 
App::import('Vendor', 'jpgraph/jpgraph');
App::import('Vendor', 'jpgraph/jpgraph_line');
App::import('Vendor', 'jpgraph/jpg-config.inc');

$ydata = array();
$ydata2 = array(5,7,9);
		$i = 0;
		foreach ($intervention['InterventionDetail'] as $interventionDetail):
			$ydata[] = $interventionDetail['score'];
		endforeach;




// Create the graph. These two calls are always required
$graph  = new Graph(550, 250,"auto");    
$graph->SetScale( "textlin", 0, 150);

// Specify X-labels
//$databarx = array(B,1,2,3,4,5,6,7,8,9,10,11,12,13);
//$graph->xaxis->SetTickLabels($databarx);


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


// Display the graph
$graph->Stroke();



?>