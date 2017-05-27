<html>
<title>Nueva Web</title>
<body>

<br>
<?php
$nombre=$_POST['nombre'];

?>
<form action="axel.php" method="POST">
<input type="text" name="nombre">
<input type="submit">
</form>

<?php  if($nombre=='Luis'){
	 
	   echo "Bienvenido al sistema ".$nombre."<br> El nuemro secreto es :666";
	   
	   
	}
	else {
		
		echo "No tienes permiso para conocer el numero secreto";
		
		}
	
	
	?>

</body>
</html>