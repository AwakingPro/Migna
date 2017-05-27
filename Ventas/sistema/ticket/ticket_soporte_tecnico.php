<?php // content="text/plain; charset=utf-8"
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php');
require("../../../system/config.php");






$sql = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Problemas de Equipos con Visita'";
$resultado = mysql_query($sql);
$row = mysql_fetch_array($resultado);
$cs1=$row[0];

$sql2 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Problemas de Equipos sin Visita'";
$resultado2 = mysql_query($sql2);
$row2 = mysql_fetch_array($resultado2);
$cs2=$row2[0];

$sql3 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Problemas de red interna'";
$resultado3 = mysql_query($sql3);
$row3 = mysql_fetch_array($resultado3);
$cs3=$row3[0];

$sql4 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Telefonia'";
$resultado4 = mysql_query($sql4);
$row4 = mysql_fetch_array($resultado4);
$cs4=$row4[0];

$sql5 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Correo'";
$resultado5 = mysql_query($sql5);
$row5 = mysql_fetch_array($resultado5);
$cs5=$row5[0];

$sql6 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Coordinacion'";
$resultado6 = mysql_query($sql6);
$row6 = mysql_fetch_array($resultado6);
$cs6=$row[0];

$sql7 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Falla masiva'";
$resultado7 = mysql_query($sql7);
$row7 = mysql_fetch_array($resultado7);
$cs7=$row7[0];


$sql8 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Consultas tecnicas'";
$resultado8 = mysql_query($sql8);
$row8 = mysql_fetch_array($resultado8);
$cs8=$row8[0];

$sql8 = "SELECT COUNT(*)  FROM TICKET WHERE tipo='Otros'";
$resultado8 = mysql_query($sql8);
$row8 = mysql_fetch_array($resultado8);
$cs8=$row8[0];



















// Some data
$data = array($cs1,$cs2,$cs3,$cs4,$cs5,$cs6,$cs7,$cs8,$cs9);
 
// Create the Pie Graph.
$graph = new PieGraph(550,400);
$graph->SetShadow();
 
// Set A title for the plot
$graph->title->Set("TIPO PROBLEMAS TECNICOS");

// Create plots
$size=0.13;
$p1 = new PiePlot($data);
$p1->SetLegends(array("Problemas con Visita","Problemas sin Visita","Red interna","Telefonia","Correo","Coordinacion","Falla masiva","Consultas tecnicas","Otros"));
 
$p2 = new PiePlot($data);
 
$p3 = new PiePlot($data);


 
$p4 = new PiePlot($data);
$p5 = new PiePlot($data);
$p6 = new PiePlot($data);
$p7 = new PiePlot($data);
$p8 = new PiePlot($data);
$p9 = new PiePlot($data);

 
$graph->Add($p1);
$graph->Add($p2);
$graph->Add($p3);
$graph->Add($p4);
$graph->Add($p5);
$graph->Add($p6);
$graph->Add($p7);
$graph->Add($p8);
$graph->Add($p9);
 
$graph->Stroke();
 
?>