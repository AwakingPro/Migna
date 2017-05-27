<?php // content="text/plain; charset=utf-8"
if (!isset($_SESSION)) {
  session_start();
}
$fecha_1=$_SESSION['anios'].'-'.$_SESSION['mes'].'-01'.' '.'00:00:00';
$fecha_2=$_SESSION['anios'].'-'.$_SESSION['mes'].'-31'.' '.'00:00:00';
// Some data

require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_pie.php');
// Some data

//VERIFICO QUE EXISTA






//

$sql3 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Light' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Light' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $LG = $row[0];
	 global  $LG;
	  }

$sql4 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Residencial' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado4 = mysql_query($sql4);


$select4=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Residencial' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select4)>0){
 $row2 = mysql_fetch_array($resultado4);
     $RS = $row2[0];
	 global  $RS;
	  }
	  
	
$sql5 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Pyme' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado5 = mysql_query($sql5);  

$select5=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Pyme' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select5)>0){
 $row3 = mysql_fetch_array($resultado5);
     $PY = $row3[0];
	 global  $PY;
	  }

$sql15 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Empresas' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado15 = mysql_query($sql15);  

$select15=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='Plan Empresas' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select15)>0){
 $row3 = mysql_fetch_array($resultado15);
     $GE = $row3[0];
	 global  $GE;
	  }

$sql15 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='ADSL' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'";
$resultado15 = mysql_query($sql15);  

$select15=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE plan='ADSL' AND fecha_inst  BETWEEN '$fecha_1' AND '$fecha_2'");
if (mysql_num_rows($select15)>0){
 $row3 = mysql_fetch_array($resultado15);
     $ADSL = $row3[0];
	 global  $ADSL;
	  }
$data = array($LG,$RS,$PY,$GE,$ADSL);

// Create the Pie Graph. 
$graph = new PieGraph(400,300);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("LG","RS","PY","GE","ADSL"));
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#E46F1F','#FBB034','#56585A','#C9101A','#999999'));
$graph->Stroke();
  
?>