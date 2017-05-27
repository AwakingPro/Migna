<?php // content="text/plain; charset=utf-8"
require("../../../system/config.php");

require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php');
// Some data

$sql3 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='Instalado'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='Instalado'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $Instalado = $row[0];
	 global  $Instalado;
	  }

$sql4 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='Rechazado'";
$resultado4 = mysql_query($sql4);


$select4=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='Rechazado'");
if (mysql_num_rows($select4)>0){
 $row2 = mysql_fetch_array($resultado4);
     $Rechazado = $row2[0];
	 global  $Rechazado;
	  }
	  
	
$sql5 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='En Espera'";
$resultado5 = mysql_query($sql5);  

$select5=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='En Espera'");
if (mysql_num_rows($select5)>0){
 $row3 = mysql_fetch_array($resultado5);
     $En_Espera = $row3[0];
	 global  $En_Espera;
	  }
$sql6 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='Negativa'";
$resultado6 = mysql_query($sql6);


$select6=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='Negativa'");
if (mysql_num_rows($select6)>0){
 $row2 = mysql_fetch_array($resultado6);
     $Sin_Cobertura = $row2[0];
	 global  $Sin_Cobertura;
	  }
	  
	
$sql7 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='No Contactado'";
$resultado7 = mysql_query($sql7);  

$select7=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad ='No Contactado'");
if (mysql_num_rows($select7)>0){
 $row3 = mysql_fetch_array($resultado7);
     $No_Contactado = $row3[0];
	 global  $No_Contactado;
	  }




$data = array($Instalado,$Rechazado,$En_Espera,$Sin_Cobertura,$No_Contactado);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Instalado","Rechazado","Espera","Negativa","No Contactado"));
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#56A6BD','#C00','#66FF66','#FF0000','#FF0'));
$graph->Stroke();

?>