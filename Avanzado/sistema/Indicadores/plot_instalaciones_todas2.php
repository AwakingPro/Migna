<?php // content="text/plain; charset=utf-8"

require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_line.php');


$sql_anios2=mysql_query("SELECT anios FROM IND_anios");
 while($row = mysql_fetch_array($sql_anios2)){ 
 $datay1= $row[0];


                 }	


 
 


// Setup the graph
$graph = new Graph(890,400);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Instalaciones V/S Retiros');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");

 $graph->xaxis->SetTickLabels(array('2007','2008','2009','2010'));
              

$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#C9101A");
$p1->SetLegend('Instalaciones');



$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


