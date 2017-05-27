<?php



require_once('system/config2.php'); 

?>
<?php $id=$_GET['id'] ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_name, $conn);
$query_SG_Login_Usuario = "SELECT * FROM usuarios ORDER BY nivel ASC";
$SG_Login_Usuario = mysql_query($query_SG_Login_Usuario, $conn) or die(mysql_error());
$row_SG_Login_Usuario = mysql_fetch_assoc($SG_Login_Usuario);
$totalRows_SG_Login_Usuario = mysql_num_rows($SG_Login_Usuario);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "sistema.php";
  $MM_redirectLoginSuccess2 = "#";
  $MM_redirectLoginSuccess3 = "sistema.php";
  $MM_redirectLoginSuccess4 = "#";
  $MM_redirectLoginFailed = "index.php?id=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_name, $conn);

  $LoginRS__query=sprintf("SELECT usuario, clave, nivel FROM usuarios WHERE usuario=%s AND clave=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {

    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');

    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
       if($loginStrGroup==1) { header("Location: " . $MM_redirectLoginSuccess ); }
          if($loginStrGroup==2) { header("Location: " . $MM_redirectLoginSuccess2 ); }
          if($loginStrGroup==3) { header("Location: " . $MM_redirectLoginSuccess3 ); }
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migna v3</title>


    <!--STYLESHEET-->
    <!--=================================================-->



    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="premium/icon-sets/solid-icons/premium-solid-icons.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMO ]-->
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo.min.css" rel="stylesheet">




    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


    
    <!--

    REQUIRED
    You must include this in your project.

    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.

    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.

    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.

    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    -->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="cls-container">
		
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class="bg-img img-balloon"></div>
		
		
		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="index.php">
					<!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
					<span class="brand-title">  Migna <span class="text-thin">Sistema Gestión de Clientes</span></span>
				</a>
			</div>
		</div>
		<!--===================================================-->
		
		
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Acceso al Sistema</p>
					<form action="<?php echo $loginFormAction;?>" METHOD="POST" name="ingreso" id="ingreso">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" name='usuario' class="form-control" placeholder="Usuario">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="password" name='password' class="form-control" placeholder="Contraseña">
							</div>
						</div>
						<div class="row">
					
						
						</div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">
							<i class="fa fa-circle-o-notch "></i> Entrar
						</button>
					</form>
                    <br>
                    <?PHP if ($_GET['id']==1){
						echo "Usuario o Contraseña Incorrectos.";
						} else {}?>
				</div>
			</div>
			<div class="pad-ver">
			</div>
		</div>
		<!--===================================================-->
		
		
		<!-- DEMO PURPOSE ONLY -->
		<!--===================================================-->
		<div class="demo-bg">
	
		</div>
		<!--===================================================-->
		
		
		
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->


		
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="js/jquery-2.2.1.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js/bootstrap.min.js"></script>


    <!--Fast Click [ OPTIONAL ]-->
    <script src="plugins/fast-click/fastclick.min.js"></script>

    
    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="js/nifty.min.js"></script>


    <!--Background Image [ DEMONSTRATION ]-->
    <script src="js/demo/bg-images.js"></script>

    
    <!--

    REQUIRED
    You must include this in your project.

    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.

    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.

    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.

    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    -->
        

</body>
</html>
