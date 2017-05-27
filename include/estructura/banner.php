<div id="inc_banner">
  <div id="inc_logo"></div>
  <div id="inc_bienvenido"><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
      <div id="cliente2"><?php echo "Bienvenido , "." ".$row['nombre']." | "?><a href="/../Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a></div>
      <?php
	  }
	  ?></div>
  
</div>