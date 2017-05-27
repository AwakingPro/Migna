<?php
include("system/config.php");
?>
<html>
<head>
<style type="text/css">
#rpe {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 16px;
	color: #06F;
	font-weight: normal;
}
</style>
</head>

<body>

  
<div id="rpe"> <p class="iconos_top">
	</br>
  Take a File<p class="iconos_top"><form method="post" enctype="multipart/form-data"  action="validacion.php" >     <table width="740" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>Ingrese correo de Destino</td>
    <td colspan="2"><label for="textfield"></label>
      <input type="text" name="correo" id="textfield"></td>
  </tr>
  <tr>
    <td width="8">&nbsp;</td>
    <td width="217">Subir Archivo</td>
    <td colspan="2"><input name="file"  type="file" class="formulario" size="25" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="formulariochico" value="Ingresar Registro"   /></td>
    <td width="93">&nbsp;</td>
    <td width="404">&nbsp;</td>
    </tr>
    </table> </FORM>
<?php
$id=$_GET['id'];
if (isset($id)){
	
	echo "URL de descarga : <br>http://172.16.10.3/get_a_file.php?id=$id";
	
	}
?>


  </div>
 </div>
  </p>
  
  
</div>

</body>
</html>
