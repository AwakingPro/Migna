<?php

require("../../../system/config.php");

$proveedor2= $_POST["proveedor2"];
$rut= $_POST["rut"];
$nombre= $_POST["nombre"];
$especialidad= $_POST["especialidad"];
$direccion= $_POST["direccion"];
$telefono= $_POST["telefono"];
$correo= $_POST["correo"];
$contacto= $_POST["contacto"];





$sql=mysql_query("SELECT * FROM INV_proveedor WHERE nombre='$proveedor2'");

if (mysql_num_rows($sql)>0)
{
	 $sql2=mysql_query("UPDATE INV_proveedor 
SET nombre=	'$nombre' ,rut=	'$rut',especialidad='$especialidad',direccion=	'$direccion' ,telefono=	'$telefono',correo='$correo',contacto=	'$contacto'  WHERE nombre='$proveedor2'  ");

$sql3=mysql_query("UPDATE INV_activos
SET proveedor=	'$nombre'   WHERE proveedor='$proveedor2'  ");

$sql4=mysql_query("UPDATE INV_activos_paso
SET proveedor=	'$nombre'   WHERE proveedor='$proveedor2'  ");

header("Location: inventario_editar_proveedor.php?id=1&proveedor=$nombre");
} else if(mysql_num_rows($sql)==0){
	


header("Location: n.php");    

      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>