<?php
 
//conexiones, conexiones everywhere
error_reporting(E_ALL);
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'm9a7r5s3';
 
$database = 'SGC';
$table = 'TU_TABLA';
if (!mysql_connect($db_host, $db_user, $db_pass))
    die("No se pudo establecer conexión a la base de datos");
 
if (!mysql_select_db($database))
    die("base de datos no existe");
    if(isset($_POST['submit']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' ';
         $chk_ext = explode(".",$fname);
         
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
        
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $sql = "INSERT into TU_TABLA(data1, data2, data3) values('$data[0]','$data[1]','$data[2]')";
                mysql_query($sql) or die(mysql_error());
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
             
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             //ver si esta separado por " , "
             echo "Archivo invalido!";
         }   
    }
     
    ?>
	
    <!DOCTYPE html>
  <body> 
  <h1>Importando archivo CSV</h1>
  <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
   Importar Archivo : <input type='file' name='sel_file' size='20'>
   <input type='submit' name='submit' value='submit'>
  </form>
 </body>
</html>