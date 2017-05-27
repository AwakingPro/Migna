	<?php
include("../../../system/config.php");
include '../../../include/estructura/session_admin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<?php include '../../../include/estructura/title.php';?>
<?php include '../../../include/estructura/bordes.php';?>
<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="top"></div>
<div id="body">
<?php include '../../../include/estructura/banner.php';?>

 <?php include '../../../include/estructura/menu.php';?>
 <?php include '../../../include/estructura/submenu_clientes.php';?>
  <div id="resumen_general">
    <p>Bienvenido al Sistema Gestión de Clientes    </p>
    <p>En el encontraran toda la información y herramientas necesarias , para la Gestión de Clientes y Soporte Técnico.</p>
    <p>Seleccione el Módulo que Necesita.</p></div>
     <?php include '../../../include/estructura/foot.php';?> 
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
