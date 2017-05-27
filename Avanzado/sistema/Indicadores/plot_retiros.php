<?php // content="text/plain; charset=utf-8"
if (!isset($_SESSION)) {
  session_start();
}
$enero_1=$_SESSION['anios'].'-01-01'.' '.'00:00:00';
$enero_2=$_SESSION['anios'].'-01-31'.' '.'00:00:00';
$febrero_1=$_SESSION['anios'].'-02-01'.' '.'00:00:00';
$febrero_2=$_SESSION['anios'].'-02-31'.' '.'00:00:00';
$marzo_1=$_SESSION['anios'].'-03-01'.' '.'00:00:00';
$marzo_2=$_SESSION['anios'].'-03-31'.' '.'00:00:00';
$abril_1=$_SESSION['anios'].'-04-01'.' '.'00:00:00';
$abril_2=$_SESSION['anios'].'-04-31'.' '.'00:00:00';
$mayo_1=$_SESSION['anios'].'-05-01'.' '.'00:00:00';
$mayo_2=$_SESSION['anios'].'-05-31'.' '.'00:00:00';
$junio_1=$_SESSION['anios'].'-06-01'.' '.'00:00:00';
$junio_2=$_SESSION['anios'].'-06-31'.' '.'00:00:00';
$julio_1=$_SESSION['anios'].'-07-01'.' '.'00:00:00';
$julio_2=$_SESSION['anios'].'-07-31'.' '.'00:00:00';
$agosto_1=$_SESSION['anios'].'-08-01'.' '.'00:00:00';
$agosto_2=$_SESSION['anios'].'-08-31'.' '.'00:00:00';
$septiembre_1=$_SESSION['anios'].'-09-01'.' '.'00:00:00';
$septiembre_2=$_SESSION['anios'].'-09-31'.' '.'00:00:00';
$octubre_1=$_SESSION['anios'].'-10-01'.' '.'00:00:00';
$octubre_2=$_SESSION['anios'].'-10-31'.' '.'00:00:00';
$noviembre_1=$_SESSION['anios'].'-11-01'.' '.'00:00:00';
$noviembre_2=$_SESSION['anios'].'-11-31'.' '.'00:00:00';
$diciembre_1=$_SESSION['anios'].'-12-01'.' '.'00:00:00';
$diciembre_2=$_SESSION['anios'].'-12-31'.' '.'00:00:00';
// Some data

require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_bar.php');

$sql3 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$enero_1' AND '$enero_2'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$enero_1' AND '$enero_2'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
     $enero= $row[0];
	 global  $enero;
	  }
$sql4 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$febrero_1' AND '$febrero_2'";
$resultado4 = mysql_query($sql4);

$select4=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$febrero_1' AND '$febrero_2'");
if (mysql_num_rows($select4)>0){
 $row = mysql_fetch_array($resultado4);
     $febrero= $row[0];
	 global  $febrero;
	  }
$sql5 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$marzo_1' AND '$marzo_2'";
$resultado5 = mysql_query($sql5);

$select5=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$marzo_1' AND '$marzo_2'");
if (mysql_num_rows($select5)>0){
 $row = mysql_fetch_array($resultado5);
     $marzo= $row[0];
	 global  $marzo;
	  }
	  
	  $sql6 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$abril_1' AND '$abril_2'";
$resultado6 = mysql_query($sql6);

$select6=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$abril_1' AND '$abril_2'");
if (mysql_num_rows($select6)>0){
 $row = mysql_fetch_array($resultado6);
     $abril= $row[0];
	 global  $abril;
	  }
	  
	  	  $sql7 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$mayo_1' AND '$mayo_2'";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$mayo_1' AND '$mayo_2'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
     $mayo= $row[0];
	 global  $mayo;
	  }
	  
		  	  $sql8 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$junio_1' AND '$junio_2'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$junio_1' AND '$junio_2'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
     $junio= $row[0];
	 global  $junio;
	  }
	  
$sql9 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$julio_1' AND '$julio_2'";
$resultado9 = mysql_query($sql9);

$select9=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$julio_1' AND '$julio_2'");
if (mysql_num_rows($select9)>0){
 $row = mysql_fetch_array($resultado9);
     $julio= $row[0];
	 global  $julio;
	  }	  
$sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$agosto_1' AND '$agosto_2'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$agosto_1' AND '$agosto_2'");
if (mysql_num_rows($select10)>0){
 $row = mysql_fetch_array($resultado10);
     $agosto= $row[0];
	 global  $agosto;
	  }	
$sql11 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$septiembre_1' AND '$septiembre_2'";
$resultado11 = mysql_query($sql11);

$select11=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$septiembre_1' AND '$septiembre_2'");
if (mysql_num_rows($select11)>0){
 $row = mysql_fetch_array($resultado11);
     $septiembre= $row[0];
	 global  $septiembre;
	  }		 
$sql12 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol BETWEEN '$octubre_1' AND '$octubre_2'";
$resultado12 = mysql_query($sql12);

$select12=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$octubre_1' AND '$octubre_2'");
if (mysql_num_rows($select12)>0){
 $row = mysql_fetch_array($resultado12);
     $octubre= $row[0];
	 global  $octubre;
	  }	
$sql13 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$noviembre_1' AND '$noviembre_2'";
$resultado13 = mysql_query($sql13);

$select13=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$noviembre_1' AND '$noviembre_2'");
if (mysql_num_rows($select13)>0){
 $row = mysql_fetch_array($resultado13);
     $noviembre= $row[0];
	 global  $noviembre;
	  }		  
$sql14 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$diciembre_1' AND '$diciembre_2'";
$resultado14 = mysql_query($sql14);

$select14=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$diciembre_1' AND '$diciembre_2'");
if (mysql_num_rows($select14)>0){
 $row = mysql_fetch_array($resultado14);
     $diciembre= $row[0];
	 global  $diciembre;
	  }		  	   	    
$data1y=array($enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre);


// Create the graph. These two calls are always required
$graph = new Graph(890,500,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40), array(15,45,75,105,135));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);


// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#C9101A");



$graph->title->Set("Retiros Anuales");

// Display the graph
$graph->Stroke();

?>

