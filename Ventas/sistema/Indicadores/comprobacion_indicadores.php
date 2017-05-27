<?php

require("../../../system/config.php");
include("../../../services2/config.php");


$indicador= $_POST["indicador"];



switch ($indicador) {
    case "Instalaciones Mensuales":
	{ 
header("Location: instalaciones_mensuales.php?indicador=$indicador");
     }
	  break;
    case "Clientes por Estacion":
        {
header("Location: clientes_por_estacion.php?indicador=$indicador");

        }      
     
        break;
	  break;
    case "Factibilidades Mensuales":
        {
header("Location: factibilidades_mensuales.php?indicador=$indicador");
        } 
	

	}




mysql_free_result($sql1);
mysql_free_result($sql2);
mysql_free_result($sql3);
mysql_free_result($sql4);
mysql_free_result($sql5);
mysql_free_result($sql6);
mysql_free_result($sql7);
mysql_free_result($sql8);
mysql_close();

?>