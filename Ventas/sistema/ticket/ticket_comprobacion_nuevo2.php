<?php

require("../../../system/config.php");
include("../../../services2/config.php");

 $cliente2= $_POST["cliente"];
 $cliente= trim($cliente2);
 $hora= $_POST["hora"];		
 $origen= $_POST["origen"];
 $creador= $_POST["creador"];
 $tipo= $_POST["tipo"];
 $comentario= $_POST["comentario"];
 $comentario_interno= $_POST["comentario_interno"];
 $fecha_creacion= $_POST["fecha_creacion"];
 $status= $_POST["status"];
 

 if (mysql_num_rows($sql_prioridad)>0){
 
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}
 
$nuevafecha = strtotime ( '+24 hour' , strtotime ( $fecha_creacion ) ) ;
$fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );







 $prioridad= $_POST["prioridad"];
 $asignar= $_POST["responsable"];
 $depto=$_POST['country'];
 $tipo=$_POST['city'];
$subtipo=$_POST['zone'];

 $numero = rand(100004,999899);



$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_creado.php?cliente=$cliente&numero=$numero");
           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,comentario_interno,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status) values ('$cliente','$origen','$a','$b','$c','$comentario','$comentario_interno','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status')");




        }      
     }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_free_result($sql3);
mysql_free_result($sql4);
mysql_close();

?>