<?php // content="text/plain; charset=utf-8"
if (!isset($_SESSION)) {
  session_start();
}
$fecha_1=$_SESSION['anios'].'-01-01'.' '.'00:00:00';
$fecha_2=$_SESSION['anios'].'-12-31'.' '.'00:00:00';

// Some data

require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php');
// Some data


$sql3 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $positiva = $row[0];
	 global  $positiva;
	  }

$sql4 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Pendiente') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado4 = mysql_query($sql4);


$select4=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Pendiente') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select4)>0){
 $row2 = mysql_fetch_array($resultado4);
     $pendiente = $row2[0];
	 global  $pendiente;
	  }
	  
	
$sql5 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Negativa') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado5 = mysql_query($sql5);  

$select5=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Negativa') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select5)>0){
 $row3 = mysql_fetch_array($resultado5);
     $negativa = $row3[0];
	 global  $negativa;
	  }

$sql15 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Rechazada') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado15 = mysql_query($sql15);  

$select15=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Rechazada') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select15)>0){
 $row3 = mysql_fetch_array($resultado15);
     $rechazada = $row3[0];
	 global  $rechazada;
	  }


$data = array($positiva,$pendiente,$negativa,$rechazada);

// Create the Pie Graph. 
$graph = new PieGraph(400,300);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Positivas","Pendientes","Negativas","Rechazadas"));
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#E46F1F','#FBB034','#C9101A','#333'));
$graph->Stroke();

?>