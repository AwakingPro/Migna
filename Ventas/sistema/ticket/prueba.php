<?php

$cliente2= $_POST["cliente"];
$cliente= trim($cliente2);
		
$origen= $_POST["origen"];
$departamento= $_POST["departamento"];
$creador= $_POST["creador"];
$tipo= $_POST["tipo"];
$comentario= $_POST["comentario"];
$fecha_creacion= $_POST["fecha_creacion"];
$fecha_solucion= $_POST["fecha_solucion"];
$prioridad= $_POST["prioridad"];




echo $origen;
echo $cliente;
echo $departamento;
echo $tipo;
echo $comentario;
echo $fecha_creacion;
echo $fecha_solucion;
echo $prioridad;
?>