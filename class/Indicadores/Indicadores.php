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

    public function Factibilidades(){
        $ArrayMes = array(1,2,3,4,5,6,7,8,9,10,11,12);
        $ArrayMesLabel = array();
        $ContarMes = count($ArrayMes);
        $MesActual = date('m');
        $AnioActual = date('Y');
        $ArrayPositiva = array();
        $ArrayNegativa = array();
        $ArrayRechazada = array();
        $ArrayPendiente = array();
        $i = 0;
        $j = 1;
        while($j<=$MesActual){
            if($ArrayMes[$i]==1){
                array_push($ArrayMesLabel,'Enero');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);
            }
            elseif($ArrayMes[$i]==2){
                array_push($ArrayMesLabel,'Febrero');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }
            elseif($ArrayMes[$i]==3){
                array_push($ArrayMesLabel,'Marzo');
               $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);
            }
            elseif($ArrayMes[$i]==4){
                array_push($ArrayMesLabel,'Abril');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }
            elseif($ArrayMes[$i]==5){
                array_push($ArrayMesLabel,'Mayo');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }
            elseif($ArrayMes[$i]==6){
                array_push($ArrayMesLabel,'Junio');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }
            elseif($ArrayMes[$i]==7){
                array_push($ArrayMesLabel,'Julio');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }

            elseif($ArrayMes[$i]==8){
                array_push($ArrayMesLabel,'Agosto');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }

            elseif($ArrayMes[$i]==9){
                array_push($ArrayMesLabel,'Septiembre');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }

            elseif($ArrayMes[$i]==10){
                array_push($ArrayMesLabel,'Octubre');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }

            elseif($ArrayMes[$i]==11){
                array_push($ArrayMesLabel,'Noviembre');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }

            elseif($ArrayMes[$i]==12){
                array_push($ArrayMesLabel,'Diciembre');
                $X = $AnioActual."-".$ArrayMes[$i]."-01";
                $Y = $AnioActual."-".$ArrayMes[$i]."-31";

                $QueryPositiva = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Positiva'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $Cantidad = mysql_num_rows($QueryPositiva);
                array_push($ArrayPositiva,$Cantidad);

                $QueryNegativa = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Negativa'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadNegativa = mysql_num_rows($QueryNegativa);
                array_push($ArrayNegativa,$CantidadNegativa);

                $QueryRechazada = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Rechazada'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadRechazada = mysql_num_rows($QueryRechazada);
                array_push($ArrayRechazada,$CantidadRechazada);

                $QueryPendiente = mysql_query("SELECT * FROM  TICKET WHERE subtipo =  'Factibilidad' AND resultado =  'Pendiente'  AND fecha_creacion BETWEEN '$X' AND '$Y'");
                $CantidadPendiente = mysql_num_rows($QueryPendiente);
                array_push($ArrayPendiente,$CantidadPendiente);

            }
            //array_push($ArrayMesLabel,$ArrayMes[$i]);
            $i++;
            $j++;


        }
        $array = array('uno' => $ArrayMesLabel,'dos' => $ArrayPositiva ,'tres' => $ArrayNegativa , 'cuatro' => $ArrayRechazada , 'cinco' => $ArrayPendiente);
        echo json_encode($array);
        /*$ArrayCantidad = array();

        $QueryAnios = mysql_query("SELECT anios FROM IND_anios ORDER BY anios ASC");
        while($row = mysql_fetch_array($QueryAnios)){
            $Fecha = $row[0];
            $X = $Fecha."-01-01";
            $Y = $Fecha."-12-31";
            array_push($Array,$Fecha);
            $Contar=mysql_query("SELECT * FROM SP_dato_cliente WHERE  fecha_inst  BETWEEN '$X' AND '$Y'");
            $Cantidad = mysql_num_rows($Contar);
            array_push($ArrayCantidad,$Cantidad);
        }*/
        
       
        
	}   
	

}
?>
