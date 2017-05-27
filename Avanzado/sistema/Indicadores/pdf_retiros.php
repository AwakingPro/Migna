
<?


include('../../../system/config.php');
$mes=$_GET['mes'];
$anio=$_GET['anio'];
$fecha_1='20'.$anio.'-'.$mes.'-01'.' '.'00:00:00';
$fecha_2='20'.$anio.'-'.$mes.'-31'.' '.'00:00:00';
$fecha1='20'.$anio.'-01-01'.' '.'00:00:00';
$fecha2='20'.$anio.'-12-31'.' '.'00:00:00';





define('FPDF_FONTPATH', 'font/');
require('../../../pdf/WriteHTML.php');
     $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Domicilio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Domicilio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  $uno=$row10[0]; }
else {echo "";}
$pdf=new PDF_HTML();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->Image('pie_retiros1.php' , 80 ,22, 35 , 38,'', 'http://www.desarrolloweb.com');
$pdf->WriteHTML("<table width='200' border='1'>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
");
$pdf->Output();




?>