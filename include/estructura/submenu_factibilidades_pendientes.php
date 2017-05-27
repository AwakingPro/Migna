<div id="contacto_1"><table width="1125" border="0" >
  <tr>
    <td width="93" height="15">
    <a href="factibilidades.php" title="Buscar Solicitud de instalacion" class="Menu" >Buscar</a></td>
    <td width="92" class="Sub_menu">
    <a href="ticket_nuevo_factibilidad.php" title="Ingresar Nueva Solicitud de Instalacion" class="Menu">Crear</a></td>
    <td width="140" class="Sub_menu">
    <a href="sin_agendar.php" title="Instalaciones pendientes de asignacion a Terreno" class="Menu">Sin Agendar
<?php $sql = "SELECT COUNT(*) FROM TICKET  WHERE status='Abierto'  AND subtipo='Factibilidad' AND resultado='Pendiente' and not estado_factibilidad='En Espera' and not estado_factibilidad='Por Instalar'  ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto'  AND subtipo='Factibilidad' AND resultado='Pendiente' and not estado_factibilidad='En Espera' and not estado_factibilidad='Por Instalar'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="108" class="Menu"><a href="en_ruta.php" title="Solicitudes por Instalar y en Ruta" class="Menu">En Ruta
          <?php $user8=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user8)){
     	$user8 =$row['nombre'];
	    global $user8; 
	}$sql8 = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto'  AND estado_factibilidad='En Ruta'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE status='Abierto'  AND estado_factibilidad='En Ruta'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
&nbsp;</a></td>
    <td width="134" class="Menu"><a href="por_instalar.php" title="Solicitudes En Espera por decision Comercial"  class="Menu">Por Instalar 
          <?php $user8=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user8)){
     	$user8 =$row['nombre'];
	    global $user8; 
	}$sql8 = "SELECT COUNT(*) FROM TICKET WHERE   status='Abierto' and estado_factibilidad='Por Instalar'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE  status='Abierto' and  estado_factibilidad='Por Instalar'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
</a></td>
    <td width="131" class="Menu"><a href="negociacion.php" title="Solicitudes En Espera por decision Comercial"  class="Menu">Negociación <?php $user8=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user8)){
     	$user8 =$row['nombre'];
	    global $user8; 
	}$sql8 = "SELECT COUNT(*) FROM TICKET WHERE   status='Abierto' and estado_factibilidad='Negociacion'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE  status='Abierto' and  estado_factibilidad='Negociacion'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
</a>
 
    <td width="115" class="Menu"><a href="factibilidades_negativas.php" title="Solicitudes Negativas" class="Menu">Negativas 
        <?php $user9=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user9)){
     	$user9 =$row['nombre'];
	    global $user9; 
	}$sql9 = "SELECT COUNT(*) FROM TICKET WHERE  status='Cerrado' and subtipo='Factibilidad'  and estado_factibilidad='Negativa'";
$resultado9 = mysql_query($sql9);

$select9=mysql_query("SELECT * FROM TICKET WHERE  status='Cerrado' and subtipo='Factibilidad'  and  estado_factibilidad='Negativa'");
if (mysql_num_rows($select9)>0){
 $row = mysql_fetch_array($resultado9);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
&nbsp;</a></td>
    <td width="121" class="Menu"><a href="factibilidades_rechazadas.php" title="Rechazadas por x motivos" class="Menu">Rechazadas
        <?php $user9=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user9)){
     	$user9 =$row['nombre'];
	    global $user9; 
	}$sql9 = "SELECT COUNT(*) FROM TICKET WHERE  status='Cerrado' and subtipo='Factibilidad'  and  estado_factibilidad='Rechazado' ";
$resultado9 = mysql_query($sql9);

$select9=mysql_query("SELECT * FROM TICKET WHERE  status='Cerrado' and subtipo='Factibilidad'  and  estado_factibilidad='Rechazado' '");
if (mysql_num_rows($select9)>0){
 $row = mysql_fetch_array($resultado9);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
&nbsp;</a></td>
    <td width="253" class="Menu"><a href="asignar_factibilidades.php" class="Menu" title="Solicitudes Asignadas a mi Usuario"> A Mi
      <?php $user7=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user7)){
     	$user7 =$row['nombre'];
	    global $user7; 
	}$sql7 = "SELECT COUNT(*) FROM TICKET WHERE asignar='$user7' and status='Abierto'  and subtipo='Factibilidad'  ";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT * FROM TICKET WHERE asignar='$user7' and status='Abierto'  and subtipo='Factibilidad'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
 </a></td>
    <td width="121" class="Menu"><a href="web.php" class="Menu" title="Solicitudes Via Web"> Solicitudes Web</a></td>

    </tr>
</table></div> 