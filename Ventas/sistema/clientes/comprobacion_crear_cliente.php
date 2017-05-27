<?php
include("../../../system/config.php");

$cliente2 = $_POST["cliente"];
$cliente= trim($cliente2);

$rut= $_POST["rut"];
$giro= $_POST["giro"];
$telefonos= $_POST["telefonos"];
$correos= $_POST["correos"];
$contacto= $_POST["contacto"];
$region=$_POST['country'];
$provincia=$_POST['city'];
$comuna=$_POST['zone'];
$direccion_comercial= $_POST["direccion_comercial"];
$sql=mysql_query("SELECT cliente,rut,contacto FROM SP_soporte_crear_cliente WHERE cliente='$cliente'");

if (mysql_num_rows($sql)>0)
{
header("Location: registro_ingresado_duplicado.php?cliente=$cliente");
} else  if (mysql_num_rows($sql)==0){
header("Location: registro_ingresado.php");

           $sql2=mysql_query("
            select country_name,city_name,zone_name from countries INNER join cities INNER join zones ON countries.id_country='$region' AND            cities.id_city='$provincia' AND zones.id_zone='$comuna' ");

       while($row = mysql_fetch_array($sql2)){ 
         echo $row['country_name'];
		 $a= $row['country_name'];
          echo $row['city_name'];
		  $b=$row['city_name'];
		  echo $row['zone_name'];
		  $c=$row['zone_name'];
		 $sql3=mysql_query("INSERT INTO SP_soporte_crear_cliente(region,provincia,comuna,cliente,rut,giro,telefonos,correos,contacto,direccion_comercial) values ('$a','$b','$c','$cliente','$rut','$giro','$telefonos','$correos','$contacto','$direccion_comercial')");

        }
}



?>

