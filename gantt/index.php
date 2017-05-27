<?php

require_once( '../jQuery-Php-Gantt/server/config.php' );

if( isset($_SESSION['signin']) and $_SESSION['signin'] ) {
	
	header('Location: gantt.html');
	
} else {
	
	header('Location: server/signin.php');
	
}

?>