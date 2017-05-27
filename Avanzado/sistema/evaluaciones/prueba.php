<?php 
include("../../../system/config.php");
include("../../../services/config.php");
//Datos Importantes

$fecha_evaluacion=$_POST["fecha_evaluacion"]; 
$tecnico=$_POST["tecnico"];
$comentario=$_POST["comentario"]; 

//Preguntas Tabla 1

$puntualidad=$_POST["puntualidad"]; 
$responsabilidad=$_POST["responsabilidad"];
$calidad=$_POST["calidad"];
$cumplimiento=$_POST["cumplimiento"];
$documentacion=$_POST["documentacion"];
$conocimiento=$_POST["conocimiento"];
$resolucion=$_POST["resolucion"];

//Preguntas Tabla 2

$actitud_e=$_POST["actitud_e"]; 
$actitud_s=$_POST["actitud_s"];
$actitud_c=$_POST["actitud_c"];
$actitud_cc=$_POST["actitud_cc"];
$trabajo_e=$_POST["trabajo_e"];


//Preguntas Tabla 3

$iniciativa=$_POST["iniciativa"]; 
$creatividad=$_POST["creatividad"];
$respuesta=$_POST["respuesta"];
$relacion=$_POST["relacion"];




//Ponderaciones 
$ponderacion70=70;
$ponderacion35=35;
$ponderacion30=30;
$ponderacion25=25;
$ponderacion15=15;
$ponderacion20=20;
$ponderacion10=10;
$ponderacion5=5;



//Resultado de Preguntas tabla 1
$resultado_puntualidad = ($puntualidad*$ponderacion25)/100;
$resultado_responsabilidad = ($responsabilidad*$ponderacion15)/100;
$resultado_calidad = ($calidad*$ponderacion20)/100;
$resultado_cumplimiento = ($cumplimiento*$ponderacion20)/100;
$resultado_documentacion = ($documentacion*$ponderacion10)/100;
$resultado_conocimiento = ($conocimiento*$ponderacion5)/100;
$resultado_resolucion = ($resolucion*$ponderacion5)/100;

//Resultado de Preguntas tabla 2
$resultado_actitud_e = ($actitud_e*$ponderacion35)/100;
$resultado_actitud_s = ($actitud_s*$ponderacion25)/100;
$resultado_actitud_c = ($actitud_c*$ponderacion15)/100;
$resultado_actitud_cc = ($actitud_cc*$ponderacion5)/100;
$resultado_trabajo_e= ($trabajo_e*$ponderacion20)/100;

//Resultado de Preguntas tabla 3
$resultado_iniciativa = ($iniciativa*$ponderacion30)/100;
$resultado_creatividad = ($creatividad*$ponderacion30)/100;
$resultado_respuesta = ($respuesta*$ponderacion30)/100;
$resultado_relacion= ($relacion*$ponderacion10)/100;



$resultado_1=($resultado_puntualidad+$resultado_responsabilidad+$resultado_calidad+$resultado_cumplimiento+$resultado_documentacion+$resultado_conocimiento+$resultado_resolucion);


$resultado_2=($resultado_actitud_e+$resultado_actitud_s+$resultado_actitud_c+$resultado_actitud_cc+$resultado_trabajo_e);

$resultado_3=($resultado_iniciativa+$resultado_creatividad+$resultado_respuesta+$resultado_relacion);



$nota_1=($resultado_1*$ponderacion70)/100;
$nota_2=($resultado_2*$ponderacion15)/100;

$nota_3=($resultado_3*$ponderacion15)/100;


$nota=($nota_1+$nota_2+$nota_3);

$sql=mysql_query("SELECT tecnico FROM EV WHERE tecnico='$tecnico' AND fecha_evaluacion= '$fecha_evaluacion'  ");

if (mysql_num_rows($sql)>0)
{
	echo "mayor";
} else  if (mysql_num_rows($sql)==0){
	echo "mayor";
		 $sql3=mysql_query("INSERT INTO EV(tecnico,fecha_evaluacion,nota,comentario) values ('$tecnico','$fecha_evaluacion','$nota','$comentario')");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nota;?></title>
</head>

<body>
<p><table width="1000" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Ponderacion Total</td>
    <td>Resumen de Notas</td>
    <td>Nota Final</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Desempeño Laboral</td>
    <td>70%</td>
    <td><?php echo $resultado_1;?></td>
    <td><?php echo $nota_1;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Relación Interpersonal</td>
    <td>30%</td>
    <td><?php echo $resultado_2;?></td>
    <td><?php echo $nota_2;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Habilidades</td>
    <td>30%</td>
    <td><?php echo $resultado_3;?></td>
    <td><?php echo $nota_3;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $final;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</p>
<?php $result = mysql_query("SELECT SUM(nota) as total FROM EV WHERE tecnico='Carlos Poblete'");   
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$resultado = $row["total"];

// primero conectamos siempre a la base de datos mysql
$sql2 = "SELECT * FROM EV";  // sentencia sql
$result2 = mysql_query($sql2);
$numero = mysql_num_rows($result2); // obtenemos el número de filas
echo 'El número de registros de la tabla es: '.$numero.'';  // imprimos en pantalla el número generado


$nota_acumulada=($resultado/$numero);
?>


Nota Acumulada = <?php echo $nota_acumulada;?>




</body>
</html>