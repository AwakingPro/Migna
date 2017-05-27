<?php // content="text/plain; charset=utf-8"
if (!isset($_SESSION)) {
  session_start();
}


$sql_anios=mysql_query("SELECT anios FROM IND_anios");
// Some data

require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_line.php');




// Setup the graph
$graph = new Graph(890,400);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
//$graph->title->Set('Historial de Instalaciones anuales');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");



$sql=mysql_query("SELECT anios FROM IND_anios");

  $datay3 = array();   
while($row = mysql_fetch_array($sql)) { 
    
$datay3[] = $row[0]; 
    
}

$sql2=mysql_query("SELECT anios FROM IND_anios");

  
  



$graph->xaxis->SetTickLabels($datay3);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line





$sql_max=mysql_query("SELECT anios FROM IND_anios order by anios ASC");
$sql_min=mysql_query("SELECT anios FROM IND_anios order by anios DESC");

while($row = mysql_fetch_array($sql_max)) { 

$max = $row[0]; 
	 
	  }	
	
	while($row = mysql_fetch_array($sql_min)) { 

$min= $row[0]; 
	 
	  }	
    


$i = $min;  
$x = $min.'-01-01';
$y = $min.'-12-31';


$datay4 = array(); 




while($i<=$max)
 { 
  
 $sql_cuenta = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  fecha_inst  BETWEEN '$x' AND '$y' and estado='Retirado'";
$resultado = mysql_query($sql_cuenta);

$select=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  fecha_inst  BETWEEN '$x' AND '$y' and estado ='Retirado'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
     $datay4[] = $row[0]; 
	 
	
	  }	
 
 
 $i++;



$x = strtotime ( '+1 year' , strtotime ( $x ) ) ;
$x = date ( 'Y-m-j' , $x );

$y = strtotime ( '+1 year' , strtotime ( $y ) ) ;
$y = date ( 'Y-m-j' , $y );}











$p1 = new LinePlot($datay4);
$graph->Add($p1);
$p1->SetColor("#06C");
$p1->SetLegend('Retiros');




$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


