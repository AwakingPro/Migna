<?php // content="text/plain; charset=utf-8"
if (!isset($_SESSION)) {
  session_start();
}

require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_line.php');




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


$datay3 = array(); 




while($i<=$max)
 { 
  
 $sql_cuenta = "SELECT COUNT(*) FROM SP_dato_cliente WHERE  fecha_inst  BETWEEN '$x' AND '$y'";
$resultado = mysql_query($sql_cuenta);

$select=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE  fecha_inst  BETWEEN '$x' AND '$y'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
     $datay3[] = $row[0]; 
	 
	
	  }	
 
 
 $i++;



$x = strtotime ( '+1 year' , strtotime ( $x ) ) ;
$x = date ( 'Y-m-j' , $x );

$y = strtotime ( '+1 year' , strtotime ( $y ) ) ;
$y = date ( 'Y-m-j' , $y );










$sql=mysql_query("SELECT anios FROM IND_anios");

  $datay3 = array();   
while($row = mysql_fetch_array($sql)) { 
    
$datay3[] = $row[0]; 
    
}


 }
 

 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
?>
