<?php
include("../../system/config.php");

class Ventas{

	public function Provincia($id){
       $QueryProvincia = mysql_query("SELECT provincia_id ,provincia_nombre FROM provincias WHERE region_id = $id");
        echo "<select id='provincias' class='formulario_grande_intranet2'>";
        echo "<option>Seleccione</option>";
        while($row = mysql_fetch_array($QueryProvincia)){
            $id = $row[0];
            $nombre = $row[1];
            echo "<option value='$id'>".utf8_encode($nombre)."</option>";
        }
        echo "</select>";
        
	}

    public function Comuna($id){
       $QueryComunas = mysql_query("SELECT comuna_nombre FROM comunas WHERE provincia_id = $id");
        echo "<select id='comuna' name='comuna' class='formulario_grande_intranet2'>";
        while($row = mysql_fetch_array($QueryComunas)){
            $nombre = $row[0];
            echo "<option value='$nombre'>".utf8_encode($nombre)."</option>";
        }
        echo "</select>";
        
	}
	

}
?>
