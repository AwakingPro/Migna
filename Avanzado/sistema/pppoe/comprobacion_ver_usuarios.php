<?php

$nombre_server= $_POST["nombre_server"];

header("Location: usuarios_en_server.php?id_seleccion=1&nombre_server=$nombre_server");



?>

