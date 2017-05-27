<?php
require("../../../system/config.php");
$cliente= $_GET["cliente"];
$id_morosos= $_GET["id_morosos"];
$rut= $_GET["rut"];
$cs= $_GET["cs"];

$sql_cliente=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente'");
$sql_rut=mysql_query("SELECT rut FROM SP_dato_cliente WHERE rut='$rut'");
$sql_cs=mysql_query("SELECT id_dato FROM SP_dato_cliente WHERE id_dato='$cs'");

//==============================================================================================
// Si codigo de Servicio viene vacio
//==============================================================================================

if (isset($cs))
{
	$sql_id=mysql_query("SELECT cliente,rut,alias FROM SP_dato_cliente WHERE id_dato='$cs'");
	while($row=mysql_fetch_array($sql_id))
	{
		$cliente=$row['cliente'];
        $alias=$row['alias'];
        $rut=$row['rut'];
    }
	if(mysql_num_rows($sql_cs)==1 )
	{	
		header("Location: ver_clientes.php?cliente=$cliente&rut=$rut&alias=$alias&id_morosos=$id_morosos");       
    }
	if (mysql_num_rows($sql_cs)>1)
	{
		header("Location: clientes_con_mas_resultados.php?cliente=$cliente&rut=$rut&id_morosos=$id_morosos");
	} 
	else if (mysql_num_rows($sql_cs)==0)
	{
	header("Location: clientes.php?id=1");
	} 
}

if (empty($rut) && isset($cliente)){
	$sql_cliente2=mysql_query("SELECT cliente,rut,alias FROM SP_dato_cliente WHERE cliente='$cliente'");

              while($row=mysql_fetch_array($sql_cliente2)){
				   $rut=$row['rut'];
                   $alias=$row['alias'];
      }
	 if(mysql_num_rows($sql_cliente)==1 ){
		
header("Location: ver_clientes.php?cliente=$cliente&rut=$rut&alias=$alias&id_morosos=$id_morosos");    
	        
        }
		 else if (mysql_num_rows($sql_cliente)>1)
{
header("Location: clientes_con_mas_resultados.php?cliente=$cliente&rut=$rut&id_morosos=$id_morosos");
} 
	
	 else if (mysql_num_rows($sql_cliente)==0)
{
header("Location: clientes.php?id=1");
} 

}
elseif (isset($rut) && empty($cliente)){
	$sql_rut2=mysql_query("SELECT cliente,rut,alias FROM SP_dato_cliente WHERE rut='$rut'");

              while($row=mysql_fetch_array($sql_rut2)){
				   $cliente=$row['cliente'];
                   $alias=$row['alias'];
      }
	 if(mysql_num_rows($sql_rut)==1 ){
		
header("Location: ver_clientes.php?cliente=$cliente&rut=$rut&alias=$alias&id_morosos=$id_morosos");    
	        
        }
		 if (mysql_num_rows($sql_rut)>1)
{
header("Location: clientes_con_mas_resultados.php?cliente=$cliente&rut=$rut&id_morosos=$id_morosos");
} 
	
		 else if (mysql_num_rows($sql_rut)==0)
{
header("Location: clientes.php?id=1");
} 
	

}


?>