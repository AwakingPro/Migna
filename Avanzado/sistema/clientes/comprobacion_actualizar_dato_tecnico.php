<?php
include("../../../system/config.php");

$cliente2 = $_POST["cliente2"];
$alias2 = $_POST["alias2"];
$rut2= $_POST["rut2"];
$mac_antigua = $_POST["mac2"];
$mac_antigua_router = $_POST["mac3"];
$cliente = $_POST["cliente"];
$rut= $_POST["rut"];
$plan= $_POST["plan"];
$fecha_suspension2= $_POST["fecha_suspension"];
$fecha_suspension=date("Y-m-d",strtotime($fecha_suspension2));
$auditado= $_POST["auditado"];
$contactos= $_POST["contactos"];
 $contrato=$_POST['contrato'];
 $telefonos=$_POST['telefonos'];
 $correos=$_POST['correos'];
 $direccion_comercial= $_POST["direccion_comercial"];
 $direccion_instalacion= $_POST["direccion_instalacion"];
$nota= $_POST["nota"];
 $fecha_inst2= $_POST["fecha_inst"];
 	  $fecha_inst=date("Y-m-d",strtotime($fecha_inst2));
	  
	  $sql_desc_plan=mysql_query("SELECT descripcion FROM SP_row_plan WHERE plan='$plan'");
	  
	  while($row=mysql_fetch_array($sql_desc_plan)){
		  
		  $desc_plan= $row[0];

		  }
	  
  $factura= $_POST["factura"];

 $instalador= $_POST["instalador"];
 $velocidad= $_POST["velocidad"];
$estado= $_POST["estado"];
 $mac_su= $_POST["mac_su"];
 $ip_su= $_POST["ip_su"];
 $senal= $_POST["senal"];
 $ap= $_POST["ap"];
 $alias= $_POST["alias"];
 $mac_router= $_POST["mac_router"];
 $configuracion= $_POST["configuracion"];
 $ip= $_POST["ip"];
 $tipo= $_POST["tipo"];
 $usuario_sistema= $_POST["usuario_sistema"];
 $hora= date("G:H:s");
 $ID_suspension= $_POST["ID_suspension"];
 $fecha_suspension3= $_POST["fecha_suspension3"];
 $estado3= $_POST["estado3"];




$sql_alias=mysql_query("SELECT alias FROM SP_dato_cliente WHERE alias='$alias' AND cliente='$cliente' AND NOT alias='$alias2'  ");
	
	if (mysql_num_rows($sql_alias)>0)
	{
		header("Location: modificar.php?cliente=$cliente&alias=$alias2&id=10");

		}
else if (mysql_num_rows($sql_alias)==0){



		
$sql2=mysql_query("UPDATE SP_dato_cliente	 
SET contactos=	'$contactos' ,plan=	'$plan',contrato=	'$contrato',telefonos='$telefonos',correos=	'$correos' ,direccion_instalacion=	'$direccion_instalacion',nota='$nota',fecha_inst=	'$fecha_inst' ,instalador=	'$instalador' ,velocidad=	'$velocidad' ,mac_su='$mac_su' ,ip_su='$ip_su',senal='$senal',ap='$ap',alias='$alias',mac_router='$mac_router',configuracion='$configuracion',ip='$ip',tipo='$tipo',auditado='$auditado',desc_plan='$desc_plan',factura='$factura' WHERE (cliente='$cliente2' AND alias='$alias2') OR (rut='$rut2' AND alias='$alias2')");




  //$sql11=mysql_query("INSERT INTO INV_activos_paso SELECT * FROM INV_activos WHERE mac='$mac_antigua'");
   //$sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");	
	
$sql4=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_antigua' ");
$sql5=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_antigua_router' ");
$sql2=mysql_query("UPDATE INV_activos	 SET id='1'  WHERE mac='$mac_su' ");
$sql3=mysql_query("UPDATE INV_activos	 SET id='1'  WHERE mac='$mac_router' ");	

//$sql4=mysql_query("UPDATE INV_activos_paso	 
//SET bodega=	'terreno'  WHERE mac='$mac_antigua' ");
//$sql5=mysql_query("UPDATE INV_activos	 
//SET bodega=	'$cliente'  WHERE mac='$mac_router' ");
// $sql6=mysql_query("DELETE FROM INV_activos_paso WHERE  mac='$mac_router' ");
//       $sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");
	   



//$sql_comprobacion=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$cliente'   ");
//		if (mysql_num_rows($sql_comprobacion)>0)
//{
	   
header("Location:  ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut&id=1");
}

?>

