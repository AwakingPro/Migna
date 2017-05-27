<?php // content="text/plain; charset=utf-8"
require("../../../system/config.php");

require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php');
// Some data

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




$data = array($positiva,$pendiente,$negativa);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Positivas","Pendientes","Negativas"));
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#56A6BD','#2E8B57','#FF0000'));
$graph->Stroke();

?>