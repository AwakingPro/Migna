<?php

$A=mysql_connect('172.16.9.7','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$A); 

$B=mysql_connect('172.16.9.5','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$B);

$QueryA = mysql_query("SELECT numero_servicio,region,localidad,comuna,id_localidad,codigo_ap,fecha_inicio,comentario,ip,status,estacion,contacto_1,contacto_2,contacto_3,fecha_inst,instalador,ip_su,ip_ap,reporte FROM hotspot where comuna = 'La Cruz'",$A);
while($row = mysql_fetch_array($QueryA)){
    $num_ser = $row[0];
    $region = $row[1];
    $localidad = $row[2];
    $comuna = $row[3];
    $id_localidad = $row[4];
    $codido_ap = $row[5];
    $fecha_inicio = $row[6];
    $comentario = $row[7];
    $ip = $row[8];
    $status = $row[9];
    $estacion = $row[10];
    $con = $row[11];
    $con2 = $row[12];
    $con3 = $row[13];
    $fecha_inst = $row[14];
    $instalador = $row[15];
    $ip_su = $row[16];
    $ip_ap = $row[17];
    $reporte = $row[18];

    mysql_query("INSERT INTO hotspot(numero_servicio,region,localidad,comuna,id_localidad,codigo_ap,fecha_inicio,comentario,ip,status,estacion,contacto_1,contacto_2,contacto_3,fecha_inst,instalador,ip_su,ip_ap,reporte) VALUES ('$num_ser','$region','$localidad','$comuna','$id_localidad','$codido_ap','$fecha_inicio','$comentario','$ip','$status','$estacion','$con','$con2','$con3','$fecha_inst','$instalador','$ip_su','$ip_ap','$reporte')",$B);
    mysql_query("INSERT INTO base_subtel(codigo_ap,numero_servicio,region,comuna,localidad,id_localidad,uso,comentario,estado) VALUES ('$codido_ap','$num_ser','$region','$comuna','$localidad','$id_localidad','1','$comentario','4')",$B);
} 


?>