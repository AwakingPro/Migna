<?php
include("../../system/config.php");

class Servicios{

	public function CrearServicio($Data){

       $Nube = $Data[0];
       $Plan = $Data[1];
       $Administracion = $Data[2];
       $Contrato = $Data[3];
       $Fecha = explode("/",$Data[4]);
       $Fecha = $Fecha[2]."-".$Fecha[0]."-".$Fecha[1];
       $Tipo = $Data[5];
       $Cliente = $Data[6];
       $Rut = $Data[7];
       $Alias = $Data[8];

       $Validar = mysql_query("SELECT * FROM SP_servicio_acronis WHERE rut = '$Rut'");
       if(mysql_num_rows($Validar)>0){
        echo 1;
       }
       else{
        $Insert = "INSERT INTO SP_servicio_acronis(cliente,rut,alias,Nube,Plan,Administracion,Contrato,Fecha,Tipo) VALUES ('$Cliente','$Rut','$Alias','$Nube','$Plan','$Administracion','$Contrato','$Fecha','$Tipo')";
        mysql_query($Insert);
        echo 0;
       }
       
        
	}

    public function ValidarServicio($Data){
        $Cliente = $Data[0];
        $Servicio = $Data[1];

        $ResponseArray = array();
        $Enlaces = array();

        $Query = mysql_query("SELECT alias FROM SP_dato_cliente WHERE cliente='$Cliente'");
        while($row = mysql_fetch_array($Query)){
            array_push($Enlaces,$row[0]);
        }
        switch ($Servicio) {
            case 1:
                $ResponseArray = array('Servicio'=> $Servicio ,'Response' => 2,'Enlaces'=> 1);
                echo json_encode($ResponseArray);
                break;
            case 2:
                $ResponseArray = array('Servicio'=> $Servicio ,'Response' => 2,'Enlaces'=> $Enlaces);
                echo json_encode($ResponseArray);
                break;
            case 3:
                $ResponseArray = array('Servicio'=> $Servicio ,'Response' => 2,'Enlaces'=> $Enlaces);
                echo json_encode($ResponseArray);
                break;
                
           case 4:
                if (mysql_num_rows($Query)>1){
                    $ResponseArray = array('Servicio'=> $Servicio ,'Response' => 2,'Enlaces'=> $Enlaces);
                    echo json_encode($ResponseArray);

                } 
                else{
                    $ResponseArray = array('Servicio'=> $Servicio ,'Response' => 1,'Enlaces'=> $Enlaces);
                    echo json_encode($ResponseArray);
                }
                break;     
        }
    }	
}
?>
