<?php
include("../../../system/config.php");
$id_eliminar=$_GET['id_eliminar'];
$eliminar=mysql_query("DELETE FROM morosos WHERE id_morosos=$id_eliminar");
$eliminar2=mysql_query("DELETE FROM id_morosos WHERE id=$id_eliminar");
$eliminar3=mysql_query("DELETE FROM morosos_total WHERE id_morosos=$id_eliminar");
header("Location: cargar.php");
?>