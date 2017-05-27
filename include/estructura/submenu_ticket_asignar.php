 <div id="contacto_1"><table width="920" border="0" >
  <tr>
    <td width="106" height="15"><a href="buscar_ticket.php"class="Menu" >Buscar Ticket</a></td>
    <td width="83" ><a href="ticket_nuevo.php" class="Menu" >Nuevo</a></td>
    <td width="118" class="Sub_menu"><a href="ticket_abiertos.php" class="Menu">Abiertos
      <?php $sql = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto'  AND NOT subtipo='Factibilidad'";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' AND NOT subtipo='Factibilidad'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="118" class="Sub_menu"><a href="ticket_incumplidos.php" class="Menu">Incumplidos
      <?php 
	  $fecha2=date("Y-m-d H:i:s");
	  $sql2 = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' and    fecha_solucion<'$fecha2' AND NOT subtipo='Factibilidad'";
$resultado2 = mysql_query($sql2);

$select2=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' and  fecha_solucion<'$fecha2' AND NOT subtipo='Factibilidad' ");
if (mysql_num_rows($select2)>0){
 $row = mysql_fetch_array($resultado2);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="112" class="Sub_menu"><a href="asignar.php" class="Submenu_principal">Asignados
      <?php $user7=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user7)){
     	$user7 =$row['nombre'];
	    global $user7; 
	}$sql7 = "SELECT COUNT(*) FROM TICKET WHERE asignar='$user7' and status='Abierto' AND NOT subtipo='Factibilidad' ";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT * FROM TICKET WHERE asignar='$user7' and status='Abierto' AND NOT subtipo='Factibilidad'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="123" class="Sub_menu"><a href="ticket_finalizados.php" class="Menu">Revisión
      Terreno <?php $sql8 = "SELECT COUNT(*) FROM TICKET WHERE status='Finalizado' AND NOT subtipo='Factibilidad' ";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE status='Finalizado' AND NOT subtipo='Factibilidad'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    </tr>
</table></div>