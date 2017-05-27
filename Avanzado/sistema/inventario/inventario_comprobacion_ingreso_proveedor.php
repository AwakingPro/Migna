<?php
require("../../../system/config.php");

$rut = $_POST["rut"];
$nombre= $_POST["nombre"];
$especialidad= $_POST["especialidad"];
$direccion= $_POST["direccion"];
$telefono= $_POST["telefono"];
$correo= $_POST["correo"];
$contacto= $_POST["contacto"];



$sql=mysql_query("SELECT rut FROM INV_proveedor WHERE rut='$rut' ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_ingresos_proveedor.php?id=2");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_ingresos_proveedor.php?id=1");    
		
 
		 $sql2=mysql_query("INSERT INTO INV_proveedor(rut,nombre,especialidad,direccion,telefono,correo,contacto) values ('$rut','$nombre','$especialidad','$direccion','$telefono','$correo','$contacto')");



      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>