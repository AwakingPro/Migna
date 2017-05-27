<?php // content="text/plain; charset=utf-8"
require("../../../system/config.php");

require_once ('../../../jpgraph/src//jpgraph.php');
require_once ('../../../jpgraph/src//jpgraph_pie.php');
require_once ('../../../jpgraph/src//jpgraph_pie3d.php');


$sql3 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado ='Positiva'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado ='Positiva'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $positiva = $row[0];
	 global  $positiva;
	  }

$sql4 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado ='Pendiente'";
$resultado4 = mysql_query($sql4);


$select4=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado ='Pendiente'");
if (mysql_num_rows($select4)>0){
 $row2 = mysql_fetch_array($resultado4);
     $pendiente = $row2[0];
	 global  $pendiente;
	  }
	  
	
$sql5 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado ='Negativa'";
$resultado5 = mysql_query($sql5);  

$select5=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado ='Negativa'");
if (mysql_num_rows($select5)>0){
 $row3 = mysql_fetch_array($resultado5);
     $negativa = $row3[0];
	 global  $negativa;
	  }
// Some data
$data = array($positiva,$pendiente,$negativa);

// A new pie graph
$graph = new PieGraph(250,200,"auto");
$graph->SetShadow();

// Title setup
$graph->title->Set("Adjusting the label pos");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Setup the pie plot
$p1 = new PiePlot($data);

// Adjust size and position of plot
$p1->SetSize(0.4);
$p1->SetCenter(0.5,0.52);
$p1->SetLegends(array("Positivas","Pendientes","Negativas"));
// Setup slice labels and move them into the plot
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetLabelPos(0.6);

// Finally add the plot
$graph->Add($p1);

// ... and stroke it
$graph->Stroke();

?>