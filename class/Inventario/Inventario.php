<?php
include("../../system/config.php");

class Inventario{

	public function MostrarTipo(){
        $Sql = mysql_query("SELECT id_tipo,tipo FROM INV_tipo ORDER BY tipo ASC");
        echo '<table id="TablaInventario" class="display" cellspacing="0" width="100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Nombre Tipo</th>';
        echo '<th>Editar</th>';
        echo '<th>Eliminar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($Record = mysql_fetch_array($Sql)){
            $Tipo = $Record['tipo'];
            $Id = $Record['id_tipo'];
            echo "<tr id='$Id'>";
            echo "<td>".$Id."</td>";
            echo "<td>".$Tipo."</td>";
            echo "<td><button type='button' class='btn btn-primary Edit' data-toggle='modal' data-target='#Editar' ><i class='fa fa-edit'></i></button></td>";
            echo "<td><button type='button' class='btn btn-danger Delete' data-toggle='modal' data-target='#Eliminar'><i class='fa fa-trash '></i></button></td>";
            echo "</tr>";

        }
            
        echo '</tbody>';
        echo '</table>';
        
	}   

    public function MostrarMarca(){
        $Sql = mysql_query("SELECT id_marca,marca,id_tipo FROM INV_marca ORDER BY marca ASC");
        echo '<table id="TablaMarca" class="display" cellspacing="0" width="100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Tipo</th>';
        echo '<th>Marca</th>';
        echo '<th>Editar</th>';
        echo '<th>Eliminar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($Record = mysql_fetch_array($Sql)){
            $Marca = $Record['marca'];
            $Id = $Record['id_marca'];
            $IdTipo = $Record['id_tipo'];
            $SqlMarca = mysql_query("SELECT tipo FROM INV_tipo WHERE id_tipo = $IdTipo");
            $row = mysql_fetch_array($SqlMarca);
            $Tipo = $row[0];
            echo "<tr id='$Id'>";
            echo "<td>".$Id."</td>";
            echo "<td>".$Tipo."</td>";
            echo "<td>".$Marca."</td>";
            echo "<td><button type='button' class='btn btn-primary Edit' data-toggle='modal' data-target='#Editar' ><i class='fa fa-edit'></i></button></td>";
            echo "<td><button type='button' class='btn btn-danger Delete' data-toggle='modal' data-target='#Eliminar'><i class='fa fa-trash '></i></button></td>";
            echo "</tr>";

        }
            
        echo '</tbody>';
        echo '</table>';
        
	}   

    public function MostrarModelo(){
        $Sql = mysql_query("SELECT id_modelo,modelo,id_marca FROM INV_modelo ORDER BY modelo ASC");
        echo '<table id="TablaModelo" class="display" cellspacing="0" width="100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Marca</th>';
        echo '<th>Modelo</th>';
        echo '<th>Editar</th>';
        echo '<th>Eliminar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($Record = mysql_fetch_array($Sql)){
            $Modelo = $Record['modelo'];
            $Id = $Record['id_modelo'];
            $IdTipo = $Record['id_marca'];
            $SqlMarca = mysql_query("SELECT marca FROM INV_marca WHERE id_marca = $IdTipo");
            $row = mysql_fetch_array($SqlMarca);
            $Tipo = $row[0];
            echo "<tr id='$Id'>";
            echo "<td>".$Id."</td>";
            echo "<td>".$Tipo."</td>";
            echo "<td>".$Modelo."</td>";
            echo "<td><button type='button' class='btn btn-primary Edit' data-toggle='modal' data-target='#Editar' ><i class='fa fa-edit'></i></button></td>";
            echo "<td><button type='button' class='btn btn-danger Delete' data-toggle='modal' data-target='#Eliminar'><i class='fa fa-trash '></i></button></td>";
            echo "</tr>";

        }
            
        echo '</tbody>';
        echo '</table>';
        
	}   

    public function Eliminar($Id,$Mod){
        if($Mod==1){
            mysql_query("DELETE FROM INV_tipo WHERE id_tipo = $Id");
        }
        elseif($Mod==2){
            mysql_query("DELETE FROM INV_marca WHERE id_marca = $Id");
        }
        elseif($Mod==3){
            mysql_query("DELETE FROM INV_modelo WHERE id_modelo = $Id");
        }
    }
    public function Ingresar($Tipo,$Mod,$Marca,$Modelo){
        if($Mod==1){
            mysql_query("INSERT INTO INV_tipo (tipo) VALUES('$Tipo') ");
        }
        else if($Mod==2){
            mysql_query("INSERT INTO INV_marca (id_tipo,marca) VALUES('$Tipo','$Marca') ");

        }
        else if($Mod==3){
            mysql_query("INSERT INTO INV_modelo (id_marca,modelo) VALUES('$Marca','$Modelo') ");

        }
    }
    public function Editar($idEdit,$Mod){
        if($Mod==1){
            $Sql = mysql_query("SELECT tipo FROM INV_tipo WHERE id_tipo = $idEdit");
            $row = mysql_fetch_array($Sql);
            echo $row[0];
        }
        else if($Mod==2){
            $Sql = mysql_query("SELECT marca FROM INV_marca WHERE id_marca = $idEdit");
            $row = mysql_fetch_array($Sql);
            echo $row[0];
        }
        else if($Mod==3){
            $Sql = mysql_query("SELECT modelo FROM INV_modelo WHERE id_modelo = $idEdit");
            $row = mysql_fetch_array($Sql);
            echo $row[0];
        }
    }

    public function Guardar($idEdit,$Mod,$Tipo,$Marca,$Modelo){
        if($Mod==1){
            mysql_query("UPDATE INV_tipo SET tipo = '$Tipo' WHERE id_tipo = $idEdit");
        }
        else if($Mod==2){
            mysql_query("UPDATE INV_marca SET marca = '$Marca' WHERE id_marca = $idEdit");
        }
        else if($Mod==3){
            mysql_query("UPDATE INV_modelo SET modelo = '$Modelo' WHERE id_modelo = $idEdit");
        }
    }

}
?>
