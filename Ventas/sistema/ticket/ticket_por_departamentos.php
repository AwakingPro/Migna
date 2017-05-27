<?php // content="text/plain; charset=utf-8"
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php');
require("../../../system/config.php");



$sql = "SELECT COUNT(*)  FROM TICKET WHERE depto='Gerencia'";
$resultado = mysql_query($sql);
$row = mysql_fetch_array($resultado);
$cs1=$row[0];

$sql2 = "SELECT COUNT(*)  FROM TICKET WHERE depto='Cobranza'";
$resultado2 = mysql_query($sql2);
$row2 = mysql_fetch_array($resultado2);
$cs2=$row2[0];

$sql3 = "SELECT COUNT(*)  FROM TICKET WHERE depto='Soporte Tecnico'";
$resultado3 = mysql_query($sql3);
$row3 = mysql_fetch_array($resultado3);
$cs3=$row3[0];

$sql4 = "SELECT COUNT(*)  FROM TICKET WHERE depto='Soporte Terreno'";
$resultado4 = mysql_query($sql4);
$row4 = mysql_fetch_array($resultado4);
$cs4=$row4[0];

$sql5 = "SELECT COUNT(*)  FROM TICKET WHERE depto='Comercial'";
$resultado5 = mysql_query($sql5);
$row5 = mysql_fetch_array($resultado5);
$cs5=$row5[0];
// Some data
$data = array($cs1,$cs2,$cs3,$cs4,$cs5);
 
// Create the Pie Graph.
$graph = new PieGraph(550,400);
$graph->SetShadow();
 
// Set A title for the plot
$graph->title->Set("TICKET POR DEPARTAMENTO");

// Create plots
$size=0.13;
$p1 = new PiePlot($data);
$p1->SetLegends(array("Gerencia","Soporte Terreno","Soporte Tecnico","Cobranza","Comercial"));
 
$p2 = new PiePlot($data);
 
$p3 = new PiePlot($data);


 
$p4 = new PiePlot($data);
$p5 = new PiePlot($data);

 
$graph->Add($p1);
$graph->Add($p2);
$graph->Add($p3);
$graph->Add($p4);
$graph->Add($p5);
 
$graph->Stroke();
 
?>