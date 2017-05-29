<?php
include("../../system/config.php");

class Indicadores{

	public function Instalaciones(){
        $Array = array();
        $ArrayCantidad = array();

        $QueryAnios = mysql_query("SELECT anios FROM IND_anios ORDER BY anios ASC");
        while($row = mysql_fetch_array($QueryAnios)){
            $Fecha = $row[0];
            $X = $Fecha."-01-01";
            $Y = $Fecha."-12-31";
            array_push($Array,$Fecha);
            $Contar=mysql_query("SELECT * FROM SP_dato_cliente WHERE  fecha_inst  BETWEEN '$X' AND '$Y'");
            $Cantidad = mysql_num_rows($Contar);
            array_push($ArrayCantidad,$Cantidad);
        }
        
        $array = array('uno' => $Array,'dos' => $ArrayCantidad);
        echo json_encode($array);
        
	}   
	

}
?>
