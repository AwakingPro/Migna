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


$sql3 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Domicilio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Domicilio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $CD = $row[0];
	 global  $CD;
	  }

$sql4 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE(estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Proveedor'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado4 = mysql_query($sql4);


$select4=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Proveedor'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select4)>0){
 $row2 = mysql_fetch_array($resultado4);
     $CP = $row2[0];
	 global  $CP;
	  }
	  
	
$sql5 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Mal Servicio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado5 = mysql_query($sql5);  

$select5=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Mal Servicio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select5)>0){
 $row3 = mysql_fetch_array($resultado5);
     $MS = $row3[0];
	 global  $MS;
	  }

$sql15 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Economico'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado15 = mysql_query($sql15);  

$select15=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Economico'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select15)>0){
 $row3 = mysql_fetch_array($resultado15);
     $EC = $row3[0];
	 global  $EC;
	  }

$sql15 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE(estado='Retiro Solicitado' or estado='Retirado') AND motivo='Morosidad'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado15 = mysql_query($sql15);  

$select15=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Morosidad'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select15)>0){
 $row3 = mysql_fetch_array($resultado15);
     $MR = $row3[0];
	 global  $MR;
	  }
	  
	  
$sql16 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE(estado='Retiro Solicitado' or estado='Retirado') AND motivo='Otros'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado16 = mysql_query($sql16);  

$select16=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Otros'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select16)>0){
 $row4 = mysql_fetch_array($resultado16);
     $OT= $row4[0];
	 global  $OT;
	  }	  
$data = array($CD,$CP,$MS,$EC,$MR,$OT);

// Create the Pie Graph. 
$graph = new PieGraph(400,300);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Cambio Dom.","Cambio Prov.","Mal Servicio","Economico","Morosidad","Otros"));
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#E46F1F','#FBB034','#56585A','#C9101A','#999999','#9C6'));
$graph->Stroke();

?>