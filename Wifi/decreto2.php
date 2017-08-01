<?php

$Data = $_POST['decreto'];
$Host = "";
switch($Data){
    case 69:
    $Host = "172.16.3.5";
    break;
    case 51:
    $Host = "172.16.9.9";
    break;
    case 33:
    $Host = "172.16.9.4";
    break;
    case 37:
    $Host = "172.16.9.8";
    break;
    case 171:
    $Host = "172.16.9.5";
    break;
    case 172:
    $Host = "172.16.9.6";
    break;
    case 173:
    $Host = "172.16.9.7";
    break;

}
$ConFoco=mysql_connect("$Host","root","m9a7r5s3"); 
mysql_select_db('SPOTMANAGER',$ConFoco); 

$Fecha = date("Y-m-d");
$ExplodeFecha = explode("-",$Fecha);
$Mes = $ExplodeFecha[1];
$Ano = $ExplodeFecha[2];
$Anio = $ExplodeFecha[0];
$Dias = cal_days_in_month(CAL_GREGORIAN, $Mes, $Ano); 
$Dias2 = $Dias - $Ano;
$DiasFinal = $Dias - $Dias2;

echo '<table border="1" class="display" width="100%" cellspacing="0">';
echo '<thead>';
echo '<tr>';
echo "<th><span class='text'>Codigo AP</span></th>";
$i = 1;
while($i<=$DiasFinal){
    echo "<th><span class='text'>Dia".$i."</span></th>";
    $i++;
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
$SqlAP = mysql_query("SELECT codigo_ap FROM hotspot WHERE reporte=1",$ConFoco);
while($row = mysql_fetch_array($SqlAP)){
    $CodigoAp = $row[0];
    echo "<tr>";
    $i = 1;
    while($i<=$DiasFinal){
        $FechaSesion = $Anio."-".$Mes."-".$i;
        $q = "SELECT codigo_ap FROM mac_usuarios_reportes WHERE codigo_ap = '$CodigoAp' AND fecha_inicio_sesion2 = '$FechaSesion'";
        $SqlRecords = mysql_num_rows(mysql_query($q,$ConFoco));
        if($SqlRecords==0){
            $class = 'bgcolor="red"';
            echo "<td><span class='text'>".$CodigoAp."</span></td>";

            echo "<th $class><span class='text-white'>".$SqlRecords."</span></th>";

        }else{
        }
        $i++;
    }
    echo "</tr>";
}
echo '</tbody>';
echo '</table>';
?>