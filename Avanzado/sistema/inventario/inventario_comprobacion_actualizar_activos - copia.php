<?php

require("../../../system/config.php");
$serial2= $_POST["serial2"];
$mac2= $_POST["mac2"];
$serial= $_POST["serial"];
$mac= $_POST["mac"];
$tipo= $_POST["tipo"];
$marca= $_POST["marca"];
$modelo= $_POST["modelo"];
$proveedor= $_POST["proveedor"];
$bodega= $_POST["bodega"];
$factura= $_POST["factura"];
$fecha= $_POST["fecha"];
$garantia= $_POST["garantia"];
$cantidad= $_POST["cantidad"];
$precio= $_POST["precio"];
$estado= $_POST["estado"];
$responsable= $_POST["responsable"];
$comentario= $_POST["comentario"];



$sql=mysql_query("SELECT serial,mac FROM INV_activos WHERE serial='$serial2' or mac='$mac2' ");

if (mysql_num_rows($sql)>0)
{
	 $sql2=mysql_query("UPDATE INV_activos	 
SET serial=	'$serial' ,mac=	'$mac',tipo='$tipo',marca=	'$marca' ,modelo=	'$modelo',proveedor='$proveedor',bodega=	'$bodega' ,factura=	'$factura',fecha='$fecha',garantia=	'$garantia' ,cantidad=	'$cantidad',precio='$precio',estado=	'$estado' ,responsable=	'$responsable',comentario='$comentario' WHERE serial='$serial2' or mac='$mac2' ");

header("Location: inventario_actualizo_activo.php");
} else if(mysql_num_rows($sql)==0){
	


header("Location: n.php");    

      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>