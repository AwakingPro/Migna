<div id="contacto_1"><table width="920" border="0" >
  <tr>
    <td width="85" height="15"><a href="factibilidades_buscar.php" class="Menu" >Buscar </a></td>
    <td width="81" class="Sub_menu"><a href="ticket_nuevo_factibilidad.php" class="Menu">Nueva </a></td>
    <td width="111" class="Sub_menu"><a href="factibilidades_pendientes.php" class="Menu">Pendientes
      <?php $sql = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' and subtipo='Factibilidad' ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' and subtipo='Factibilidad'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="625" class="Menu"><a href="asignar_factibilidades.php" class="Menu">Asignados
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

?>&nbsp;</a>
</td>
 <td width="121" class="Menu"><a href="web.php" class="Menu" title="Solicitudes Via Web"> Solicitudes Web</a></td>
    </tr>
</table></div>