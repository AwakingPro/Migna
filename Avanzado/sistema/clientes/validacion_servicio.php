<?php
require("../../../system/config.php");

$cliente= $_POST["cliente"];
$rut= $_POST["rut"];
$alias= $_POST["alias"];
$servicio= $_POST["servicio"];

if (empty($cliente) || empty($servicio))
{
header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=1");    

}
else 
    {
	if ($servicio=='1'){
      $sql=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

        if (mysql_num_rows($sql)>0)
          {
             header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente");
             } else if(mysql_num_rows($sql)==0){
                 header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=1");    
             }
            }
       else if ($servicio=='2'  ){
		         $sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");
				 if (mysql_num_rows($sql)>0)
          {
             header("Location: clientes_busqueda_ingreso_dato_tecnico2.php?cliente=$cliente");
             } else if(mysql_num_rows($sql)==0){
                 header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=10");    
             }
           }
		   

       else if ($servicio=='3' ){
               $sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");
				 if (mysql_num_rows($sql)>0)
          {
             header("Location: clientes_busqueda_ingreso_dato_tecnico3.php?cliente=$cliente");
             } else if(mysql_num_rows($sql)==0){
                 header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=10");    
           }
	    }
        else if ($servicio=='4' ){
               $sql=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'  ");
				 if (mysql_num_rows($sql)>0)
          {
             header("Location: clientes_busqueda_ingreso_dato_tecnico4.php?cliente=$cliente");
             } else if(mysql_num_rows($sql)==0){
                 header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=10");    
           }
	    }
	}

?>