<?php
$Decreto69=mysql_connect('172.16.3.5','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto69); 

$Decreto4=mysql_connect('172.16.9.4','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto4); 

$Decreto5=mysql_connect('172.16.9.5','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto5); 

$Decreto6=mysql_connect('172.16.9.6','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto6);

$Decreto7=mysql_connect('172.16.9.7','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto7);

$Decreto8=mysql_connect('172.16.9.8','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto8);

$Decreto9=mysql_connect('172.16.9.9','root','m9a7r5s3'); 
mysql_select_db('SPOTMANAGER',$Decreto9);

$array1 = "200,201,194,195,154,155,157,156,44,48,47,43,181,182,183,184";
$array2 = "110,111,109,113,128,117,127,102,103,119,118,121,55,54,52,51";
$array3 = "149,147,145,148,82,81,72,73,46,45,50,49,177,79,180,176";
$array4 = "9,26,10,11,165,166,167,168,12,7,6,13,136,133,126,130";
$array5 = "122,123,125,132,188,189,185,186,98,88,89,71,34,42,38,41";
$array6 = "40,37,35,68,28,29,32,5,190,191,193,196,20,15,27,31";
$array7 = "106,105,100,99,198,192,197,199,161,162,163,164,151,150,146,144";
$array8 = "178,170,175,173,159,169,160,158,120,116,115,114,140,85,84,83";
$array9 = "86,97,101,141,94,137,138,139,69,80,70,79,142,153,152,143";
$array10 = "96,92,93,95,108,107,104,112";
$array11 = "1,2,3,6,7,8,11,12,13,14,15,16,17,18,19,20"; 
$array24 = "21,22,23,24,25,26,27,28,29,30,31,32,33,34";//16
$array12 = "9,10,11,12,13,17,18,19,24,25,26,27,33,34,35,36";
$array13 = "37,38,39,40,41,42,43,44,47,48,49,50,51,52,53,54";
$array14 = "55,56,57,58,59,60,61,62,67,68,69,70";
$array15 = "1,2,3,4,5,6,7,8,14,15,16,28,29,30,31,32";
$array16 = "33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48";
$array17 = "49,50,51,52,53,54,55,56,57,58,59,60";
$array18 = "20,21,22,23,29,30,31,32,35,36,37,38,39,40,41,42";
$array19 = "43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58";
$array20 = "59,60,61,62,63,64,65";
$array21 = "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16";
$array22 = "20,21,25,26,30,31,32";
$array23 = "1,2,3,4,5,6,7,8";

























$QueryDecreto69_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array1)",$Decreto69);
$QueryDecreto69_2 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array2)",$Decreto69);
$QueryDecreto69_3 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array3)",$Decreto69);
$QueryDecreto69_4 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array4)",$Decreto69);
$QueryDecreto69_5 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array5)",$Decreto69);
$QueryDecreto69_6 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array6)",$Decreto69);
$QueryDecreto69_7 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array7)",$Decreto69);
$QueryDecreto69_8 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array8)",$Decreto69);
$QueryDecreto69_9 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array9)",$Decreto69);
$QueryDecreto69_10 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array10)",$Decreto69);
$QueryDecreto4_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array11)",$Decreto4);
$QueryDecreto4_2 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array24)",$Decreto4);
$QueryDecreto5_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array12)",$Decreto5);
$QueryDecreto5_2 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array13)",$Decreto5);
$QueryDecreto5_3 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array14)",$Decreto5);
$QueryDecreto6_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array15)",$Decreto6);
$QueryDecreto6_2 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array16)",$Decreto6);
$QueryDecreto6_3 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array17)",$Decreto6);
$QueryDecreto7_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array18)",$Decreto7);
$QueryDecreto7_2 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array19)",$Decreto7);
$QueryDecreto7_3 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array20)",$Decreto7);
$QueryDecreto8_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array21)",$Decreto8);
$QueryDecreto8_2 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array22)",$Decreto8);
$QueryDecreto9_1 = mysql_query("SELECT comuna,id_localidad,status,ip FROM hotspot WHERE id_hotspot IN ($array23)",$Decreto9);



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META HTTP-EQUIV="REFRESH" CONTENT="3600;">

    <title>Foco | Software de Estrategia</title>
    <!--STYLESHEET-->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="nifty.min.css" rel="stylesheet">
    <style type="text/css">

    .modal {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 )
            url('../img/gears.gif')
            50% 50%
            no-repeat;
            }
body.loading
           {
            overflow: hidden;
           }
body.loading .modal
          {
           display: block;
          }

 #divtablapeq {
    width: 500px;
    }
 #divtablamed {
    width: 600px;
    }
.text-sm {
    font-size: .7em;
}


    </style>
    <script>
            var timeout = setInterval(reloadDiv, 360000);    
            function reloadDiv() {
                $('#DivRefresh').load('ReporteActualizado.php');
            }
    </script>
</head>
<body>
  <div id="container" class="effect mainnav-sm">
    <!--NAVBAR-->
    <!--===================================================-->
    
    <!--===================================================-->
    <!--END NAVBAR-->
      <div class="boxed">
        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content">
          <!--Page Title-->
          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <div id="page-title">
          <!--Searchbox-->
          </div>
          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <!--End page title-->
          <!--Breadcrumb-->
          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

          <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <!--End breadcrumb-->
          <!--Page content-->
          <!--===================================================-->
          <div id="page-content">
           
                                <div class="col-sm-12">
                                    <div id="DivRefresh">
                                    <table id="demo-dt-selection" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        
                                        <tbody>
                                        <?php
                                        echo "<tr>";
                                        echo "<td><b>Decreto 69</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_2)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_3)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_4)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_5)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_6)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_7)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_8)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_9)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto69_10)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><b>Decreto 33</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto4_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto4_2)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><b>Decreto 171</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto5_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto5_2)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto5_3)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                        echo "<td><b>Decreto 172</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto6_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto6_2)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto6_3)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                        echo "<td><b>Decreto 173</b></td>";
                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto7_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto7_2)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                         echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto7_3)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><b>Decreto 37</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto8_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto8_2)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><b>Decreto 51 Cultural</b></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            while($row=mysql_fetch_array($QueryDecreto9_1)){
                                                $Comuna = $row[0];
                                                $Localidad  =$row[1];
                                                $Status = $row[2];
                                                $Ip = $row[3];
                                                $Class = '';
                                                if($Status == 0){
                                                    $Class = "class='bg-danger'";
                                                }
                                                else{
                                                    $Class = "class='bg-success'";
                                                }
                                                echo "<td $Class><span class='text-sm'><a class='btn-link add-tooltip' data-toggle='tooltip' href='#' data-original-title='$Localidad  $Ip'><center>".substr($Comuna, 0, 8)."</center></a></span></td>";
                                                
                                            }
                                        echo "</tr>";
                                        
                                        
                                        
                                               
                                            
                                        ?>    

                                        </tbody>
                                        </table>
                                   	
                            </div>
                                    
            </div>
          </div>
          <!--===================================================-->
          <!--End page content-->
        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->
      </div>
        <!-- FOOTER -->
        <!--===================================================-->
        <!--===================================================-->
        <!-- END FOOTER -->
        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <div class="modal"><!-- Place at bottom of page --></div>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="jquery-2.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="../plugins/fast-click/fastclick.min.js"></script>
    <script src="nifty.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>
    <script src="../plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../js/demo/nifty-demo.min.js"></script>
    <script src="../plugins/bootbox/bootbox.min.js"></script>
    <script src="../plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="../plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="ui-alerts.js"></script>
</body>
</html>