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


$sql3 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  estado_factibilidad='Instalado' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  estado_factibilidad='Instalado' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $instalados = $row[0];
	 global  $instalados;
	  }

$sql4 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND estado_factibilidad='Rechazado' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado4 = mysql_query($sql4);


$select4=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND estado_factibilidad='Rechazado' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select4)>0){
 $row2 = mysql_fetch_array($resultado4);
     $rechazados = $row2[0];
	 global  $rechazados;
	  }
	  
	
$sql5 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND estado_factibilidad='En Espera' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado5 = mysql_query($sql5);  

$select5=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND estado_factibilidad='En Espera' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select5)>0){
 $row3 = mysql_fetch_array($resultado5);
     $espera = $row3[0];
	 global  $espera;
	  }

$sql15 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND estado_factibilidad='No Contactado' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado15 = mysql_query($sql15);  

$select15=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND estado_factibilidad='No Contactado' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select15)>0){
 $row3 = mysql_fetch_array($resultado15);
     $no = $row3[0];
	 global  $no;
	  }


$data = array($instalados,$rechazados,$espera,$no);

// Create the Pie Graph. 
$graph = new PieGraph(400,300);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Instalados","Rechazados","En Espera","No Contactado"));
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#E46F1F','#333','#C9101A','#FBB034'));
$graph->Stroke();

?>