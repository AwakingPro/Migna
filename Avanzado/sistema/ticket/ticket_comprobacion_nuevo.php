<?php

require("../../../system/config.php");
include("../../../services2/config.php");

 $cliente2= $_POST["cliente"];
 $cliente= trim($cliente2);
   $fecha_actualizacion= $_POST["fecha_actualizacion"];
$fecha_sistema=date('Y-d-m');
 $hora= $_POST["hora"];		
 $origen= $_POST["origen"];
 $creador= $_POST["creador"];
 $tipo= $_POST["tipo"];
 $comentario= $_POST["comentario"];
 $fecha_creacion= $_POST["fecha_creacion"];
 $status= $_POST["status"];

 $asignar= $_POST["responsable"];
 $depto=$_POST['country'];
 $tipo=$_POST['city'];
$subtipo=$_POST['zone'];

 $numero = rand(100004,999899);

 $prioridad= $_POST["prioridad"];
 $sql1=mysql_query("SELECT cliente FROM SP_dato_cliente  WHERE cliente='$cliente'");

 if (mysql_num_rows($sql1)>0)
{


switch ($prioridad) {
    case "Baja":
        $nuevafecha = strtotime ( '+72 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
		$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }
	  break;
    case "Normal":
            $nuevafecha = strtotime ( '+48 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
		$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql4=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql4)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql5=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }

		 break;
    case "Alta":
            $nuevafecha = strtotime ( '+24 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
		$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql6=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql6)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql7=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }
        break;
		
		case "Por Definir":
            $nuevafecha = strtotime ( '+1200 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
	$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql8=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql8)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql9=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }
        break;
	
}
}
if (mysql_num_rows($sql1)==0){
	
	switch ($prioridad) {
    case "Baja":
        $nuevafecha = strtotime ( '+72 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
		$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)==0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }
        break;
    case "Normal":
            $nuevafecha = strtotime ( '+48 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
		$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)==0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");



        }      
     }
		 break;
    case "Alta":
            $nuevafecha = strtotime ( '+24 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
		$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)==0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }
        break;
		
		case "Por Definir":
            $nuevafecha = strtotime ( '+1200 hour' , strtotime ( $fecha_creacion ) ) ;
        $fecha_solucion = date ( 'Y-m-d H:i:s' , $nuevafecha );
	$sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)==0)
{
header("Location: ticket_nuevo.php?numero=$numero&id=1");
           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries2 INNER join cities2 INNER join zones2 ON countries2.id_country='$depto' AND            cities2.id_city='$tipo' AND zones2.id_zone='$subtipo' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO TICKET(cliente,origen,depto,tipo,subtipo,comentario,fecha_creacion,fecha_solucion,prioridad,asignar,creador,numero,status,fecha_actualizacion,fecha_sistema) values ('$cliente','$origen','$a','$b','$c','$comentario','$fecha_creacion','$fecha_solucion','$prioridad','$asignar','$creador','$numero','$status','$fecha_actualizacion','$fecha_sistema')");




        }      
     }
        break;
	
}
	}




mysql_free_result($sql1);
mysql_free_result($sql2);
mysql_free_result($sql3);
mysql_free_result($sql4);
mysql_free_result($sql5);
mysql_free_result($sql6);
mysql_free_result($sql7);
mysql_free_result($sql8);
mysql_close();

?>