<?php

echo $opcion= $_POST["OPCION"];

if ($opcion=='1')
{
header("Location: ver_activos.php");
}
if ($opcion=='2')
{
header("Location: ver_todos_suspendidos.php");
}if ($opcion=='3')
{
header("Location: ver_todos_retirados.php");
}if ($opcion=='4')
{
header("Location: ver_todos_retirados_proceso.php");
}
if ($opcion=='5')
{
header("Location: ver_todos.php");
}
?>