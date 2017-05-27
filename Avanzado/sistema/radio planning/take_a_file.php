<?php
include("../../../system/config.php");
?>
<html>
<head>
</head>

<body>

  
<div id="rpe"> <p class="iconos_top">
	</br>
  <p class="iconos_top"><form method="post" enctype="multipart/form-data"  action="validacion.php" >     <table width="740" border="0">
  <tr>
    <td width="8">&nbsp;</td>
    <td width="126">Subir Archivo</td>
    <td colspan="2"><input name="file"  type="file" class="formulario" size="25" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="formulariochico" value="Ingresar Registro"   /></td>
    <td width="184">&nbsp;</td>
    <td width="404">&nbsp;</td>
    </tr>
    </table> </FORM>
<?php
$id=$_GET['id'];
if (isset($id)){
	
	echo "URL de descarga : http://172.16.10.3/id=$id";
	
	}
?>


  </div>
 </div>
  </p>
  
  
</div>

</body>
</html>
