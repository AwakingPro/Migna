<?php
require("../../../system/config.php");

$archivo = $_FILES["file"]["tmp_name"];
$tamanio = $_FILES["file"]["size"];
$tipo    = $_FILES["file"]["type"];
$nombre  = $_FILES["file"]["name"];

$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
$numerodeletras=10; //numero de letras para generar el texto
$cadena = ""; //variable para almacenar la cadena generada
for($i=0;$i<$numerodeletras;$i++)
{
    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
entre el rango 0 a Numero de letras que tiene la cadena */
}
$nombre_aleatorio=$cadena;

$fp = fopen($archivo, "rb");
$file = fread($fp, $tamanio);
$file = addslashes($file);
fclose($fp);

$sql=mysql_query("INSERT INTO take_a_file(nombre_aleatorio,file,nombre) values ('$nombre_aleatorio','$file','$nombre')");

header("Location: take_a_file.php?id=$nombre_aleatorio");    

?>