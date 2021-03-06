<?PHP

include("system/config2.php");
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "3";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
   // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && false) {
      $isValid = true;
    }
  }
  return $isValid;
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0)
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}
$usuario=$_SESSION['MM_Username'];
$usuario=mysql_query("SELECT nombre,sexo FROM usuarios WHERE usuario='$usuario'");
while($row=mysql_fetch_array($usuario)){
     	$usuario=$row['nombre'];
		$sexo=$row['sexo'];
		}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migna</title>


    <!--STYLESHEET-->
    <!--=================================================-->



    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMO ]-->
    <link href="premium/icon-sets/solid-icons/premium-solid-icons.min.css" rel="stylesheet">
    <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="plugins/animate-css/animate.min.css" rel="stylesheet">
    <link href="plugins/morris-js/morris.min.css" rel="stylesheet">
    <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


<style type="text/css">
    .LP {
	height: 30px;
	width: 90%;
	margin-right: 20px;
	margin-left: 10px;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-left: 10px;
	border: thin solid #EDF0F3;
}
    .LP2 {
	height: 30px;
	width: 90%;
	background-color:#CCC;
	margin-right: 20px;
	margin-left: 10px;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-left: 10px;
	border: thin solid #EDF0F3;
}
.LP50 {
	height: 30px;
	width: 30%;
	margin-right: 20px;
	margin-left: 10px;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-left: 10px;
	border: thin solid #EDF0F3;
}
    .titulo_LP {
	padding-left: 10px;
}
</style>
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="effect mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">
                     <br>
                            <span class="brand-text">&nbsp;&nbsp;&nbsp;<i class="psi-eye-visible"></i>  Migna</span>
                       
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="pli-view-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>

                            <!--Notification dropdown menu-->
                            <div class="dropdown-menu dropdown-menu-md">
                                <div class="pad-all bord-btm">
                                    <p class="text-lg text-semibold mar-no">Tienes Nuevas Notificaciones</p>
                                </div>
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">

                                            <!-- Dropdown list-->
                                     

                                            <!-- Dropdown list-->
                                      

                                            <!-- Dropdown list-->
                                    

                                            <!-- Dropdown list-->
                          

                                            <!-- Dropdown list-->
                                     

                                            <!-- Dropdown list-->
                                     
                                            <!-- Dropdown list-->
                                   

                                            <!-- Dropdown list-->
                                      
                                        </ul>
                                    </div>
                                </div>

                                <!--Dropdown footer-->
                                <div class="pad-all bord-top">
                                    <a href="#" class="btn-link text-dark box-block">
                                        <i class="fa fa-angle-right fa-lg pull-right"></i>Ver Todas las Notificaciones
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->
                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <!--Language selector-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="dropdown">
                            <a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                                <span class="lang-selected">
                                    <img class="lang-flag" src="img/flags/spain.png" alt="Español">
                                </span>
                            </a>

                            <!--Language selector menu-->
                            <ul class="head-list dropdown-menu">
						        <li>
						            <!--English-->
						            <a href="#" class="active">
						                <img class="lang-flag" src="img/flags/united-kingdom.png" alt="English">
						                <span class="lang-id">EN</span>
						                <span class="lang-name">English</span>
						            </a>
						        </li>
						  
						
						 
						        <li>
						            <!--Spain-->
						            <a href="#">
						                <img class="lang-flag" src="img/flags/united-kingdom.png" alt="English">
						                <span class="lang-id">EN</span>
						                <span class="lang-name">English</span>
						            </a>
						        </li>
                            </ul>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End language selector-->



                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <?php if($sexo==0){ ?>
                                    <img class="img-circle img-user media-object" src="img/av1.png" alt="Profile Picture">
                                    <?php } else { ?>
										 <img class="img-circle img-user media-object" src="img/av5.png" alt="Profile Picture">
										<?php }?>
                                </span>
                                <div class="username hidden-xs"><?php echo $usuario;?></div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- Dropdown heading  -->
                           


                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                    <li>
                                        <a href="#">
                                            <i class="pli-male icon-lg icon-fw"></i> Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">9</span>
                                            <i class="pli-mail icon-lg icon-fw"></i> Mensajes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="pli-gear icon-lg icon-fw"></i> Configuración
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="pli-information icon-lg icon-fw"></i> Ayuda
                                        </a>
                                    </li>
                          
                                </ul>

                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a href="index.php" class="btn btn-primary">
                                        <i class="pli-unlock"></i> Salir
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Inicio</h1>

                    <!--Searchbox-->
            
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Sistema</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->


        

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    Bienvenido , Seleccione Modulo :
                </div>
                <!--===================================================-->
                <!--End page content-->


            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut">
                        <ul class="list-unstyled">
                
                            <li class="col-xs-4" data-content="Page Alerts">
                               
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Menú Principal</li>
						
						            <!--Menu list item-->
						            <li class="active-link">
						                <a href="index.php" >
						                    <i class="psi-home"></i>
						                    <span class="menu-title">
												<strong>Inicio</strong>
											</span>
						                </a>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-address-book"></i>
						                    <span class="menu-title">
												<strong>Clientes</strong>
											</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse ">
						                    <li ><a href="ver.php">Ver Clientes</a></li>

						                </ul>
						            </li>
						            <li>
						                <a href="#">
						                    <i class="psi-dollar-sign"></i>
						                    <span class="menu-title">Ventas</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
							
											
						                </ul>
						            </li>
                                        <li>
						                <a href="#">
						                    <i class="psi-depression"></i>
						                    <span class="menu-title">Retiros</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
	
						                </ul>
						            </li>
                                      <li>
						                <a href="#">
						                    <i class="psi-phone-2"></i>
						                    <span class="menu-title">Ticket</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
	
						                </ul>
						            </li>
                                      <li>
						                <a href="#">
						                    <i class="psi-communication-tower-2"></i>
						                    <span class="menu-title">Radio Planning</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
	
						                </ul>
						            </li>
                                      <li>
						                <a href="#">
						                    <i class="psi-notepad"></i>
						                    <span class="menu-title">Inventario</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="ingresos.php">Ingresos</a></li>
	
						                </ul>
						            </li>
                                      <li>
						                <a href="#">
						                    <i class="psi-bar-chart-2"></i>
						                    <span class="menu-title">Kpi</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
	
						                </ul>
						            </li>
                                      <li>
						                <a href="#">
						                    <i class="psi-box-with-folders"></i>
						                    <span class="menu-title">Intranet</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
	
						                </ul>
						            </li>
                                      <li>
						                <a href="#">
						                    <i class="psi-power-cable"></i>
						                    <span class="menu-title">PPPoE</span>
											<i class="arrow"></i>
						                </a>

						                <ul class="collapse">
						                    <li><a href="#">Submenu</a></li>
	
						                </ul>
						            </li>
						            <!--Menu list item-->
		
						
						
						            <!--Category name-->
						
						            <!--Menu list item-->
		
						
						            <!--Menu list item-->
						          
						            <!--Menu list item-->
						        
                                   
						
						            <!--Menu list item-->
						       
						
						
						            <!--Category name-->
						
						            <!--Menu list item-->
						            
						
						            <!--Menu list item-->
						          
						            <!--Menu list item-->
						           

						
						
						            <!--Category name-->
						            

                                <!--Widget-->
                                <!--================================-->
                             
                                <!--================================-->
                                <!--End widget-->

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->
            
            <!--ASIDE-->
            <!--===================================================-->
            <aside id="aside-container">
                <div id="aside">
                    <div class="nano">
                        <div class="nano-content">
                            
                            <!--Nav tabs-->
                            <!--================================-->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#demo-asd-tab-1" data-toggle="tab">
                                        <i class="pli-speech-bubble-7"></i>
                                        <span class="badge badge-purple">7</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#demo-asd-tab-2" data-toggle="tab">
                                        <i class="pli-information"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#demo-asd-tab-3" data-toggle="tab">
                                        <i class="pli-wrench"></i>
                                    </a>
                                </li>
                            </ul>
                            <!--================================-->
                            <!--End nav tabs-->



                            <!-- Tabs Content -->
                            <!--================================-->
                            <div class="tab-content">

                                <!--First tab (Contact list)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="tab-pane fade in active" id="demo-asd-tab-1">
                                    <h4 class="pad-all">
                                        <span class="pull-right badge badge-warning">3</span> Family
                                    </h4>

                                    <!--Family-->
                                    <div class="list-group bg-trans">
							            <a href="#" class="list-group-item">
							                <div class="media-left">
							                    <img class="img-circle img-xs" src="img/av2.png" alt="Profile Picture">
							                </div>
							                <div class="media-body">
							                    <p class="mar-no">Stephen Tran</p>
							                    <small class="text-muted">Availabe</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left">
							                    <img class="img-circle img-xs" src="img/av4.png" alt="Profile Picture">
							                </div>
							                <div class="media-body">
							                    <p class="mar-no">Brittany Meyer</p>
							                    <small class="text-muted">I think so</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left">
							                    <img class="img-circle img-xs" src="img/av3.png" alt="Profile Picture">
							                </div>
							                <div class="media-body">
							                    <p class="mar-no">Donald Brown</p>
							                    <small class="text-muted">Lorem ipsum dolor sit amet.</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left">
							                    <img class="img-circle img-xs" src="img/av5.png" alt="Profile Picture">
							                </div>
							                <div class="media-body">
							                    <p class="mar-no">Betty Murphy</p>
							                    <small class="text-muted">Bye</small>
							                </div>
							            </a>
                                    </div>

                                    <hr>
                                    <h4 class="pad-hor">
                                        <span class="pull-right badge badge-success">Offline</span> Friends
                                    </h4>

                                    <!--Works-->
                                    <div class="list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
                                        </a>
                                    </div>


                                    <hr>
                                    <h4 class="pad-hor">News</h4>

                                    <div class="pad-hor">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetuer
                                            <a data-title="45%" class="add-tooltip text-semibold" href="#">adipiscing elit</a>, sed diam nonummy nibh. Lorem ipsum dolor sit amet.
                                        </p>
                                        <small class="text-muted"><em>Last Update : Des 12, 2014</em></small>
                                    </div>


                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--End first tab (Contact list)-->


                                <!--Second tab (Custom layout)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="tab-pane fade" id="demo-asd-tab-2">

                                    <!--Monthly billing-->
                                    <div class="pad-all">
                                        <h4>Billing &amp; reports</h4>
                                        <p class="text-muted">Get <strong>$5.00</strong> off your next bill by making sure your full payment reaches us before August 5, 2016.</p>
                                        <hr>
                                        <span class="text-semibold">Amount Due On</span>
                                        <p>August 17, 2016</p>
                                        <p class="text-2x text-thin">$83.09</p>
                                        <button class="btn btn-block btn-success mar-top">Pay Now</button>
                                    </div>


                                    <hr>

                                    <h4 class="pad-hor">Additional Actions</h4>

                                    <!--Simple Menu-->
                                    <div class="list-group bg-trans">
                                        <a href="#" class="list-group-item"><i class="pli-information icon-lg icon-fw"></i> Service Information</a>
                                        <a href="#" class="list-group-item"><i class="pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                                        <a href="#" class="list-group-item"><span class="label label-info pull-right">New</span><i class="pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                                        <a href="#" class="list-group-item"><i class="pli-support icon-lg icon-fw"></i> Message Center</a>
                                    </div>


                                    <hr>

                                    <div class="text-center">
                                        <div><i class="pli-old-telephone icon-3x"></i></div>
                                        Questions?
                                        <p class="text-lg text-semibold"> (415) 234-53454 </p>
                                        <small><em>We are here 24/7</em></small>
                                    </div>
                                </div>
                                <!--End second tab (Custom layout)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                                <!--Third tab (Settings)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="tab-pane fade" id="demo-asd-tab-3">
                                    <ul class="list-group bg-trans">
                                        <li class="pad-top list-header">
                                            <h4>Account Settings</h4>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="demo-switch" type="checkbox" checked>
                                            </div>
                                            <p>Show my personal status</p>
                                            <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="demo-switch" type="checkbox" checked>
                                            </div>
                                            <p>Show offline contact</p>
                                            <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="demo-switch" type="checkbox">
                                            </div>
                                            <p>Invisible mode </p>
                                            <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                        </li>
                                    </ul>


                                    <hr>

                                    <ul class="list-group pad-btm bg-trans">
                                        <li class="list-header"><h4>Public Settings</h4></li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="demo-switch" type="checkbox" checked>
                                            </div>
                                            Online status
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="demo-switch" type="checkbox" checked>
                                            </div>
                                            Show offline contact
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="demo-switch" type="checkbox">
                                            </div>
                                            Show my device icon
                                        </li>
                                    </ul>



                                    <hr>

                                    <h4 class="pad-hor">Task Progress</h4>
                                    <div class="pad-all">
                                        <p>Upgrade Progress</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
                                        </div>
                                        <small class="text-muted">15% Completed</small>
                                    </div>
                                    <div class="pad-hor">
                                        <p>Database</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
                                        </div>
                                        <small class="text-muted">17/23 Database</small>
                                    </div>

                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--Third tab (Settings)-->

                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--===================================================-->
            <!--END ASIDE-->

        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pull-right">
                <ul class="footer-list list-inline">
                

                
                    </li>
                </ul>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">Versión 3.0</div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->




        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    
    <!-- SETTINGS - DEMO PURPOSE ONLY -->
    <!--===================================================-->
    <div id="demo-set" class="demo-set">
        <div class="demo-set-body bg-light">
            <div id="demo-set-alert"></div>
            <div class="nano" style="height:520px">
                <div class="nano-content">
                    <div class="panel mar-no">
                        <!--Panel heading-->
                        <div class="panel-heading bg-dark">
                            <div class="panel-control pull-left">
                                <ul class="nav nav-tabs text-lg">
                                    <li class="active"><a data-toggle="tab" href="#demo-settings-box-1" aria-expanded="true">Basic Layout</a></li>
                                    <li class=""><a data-toggle="tab" href="#demo-settings-box-2" aria-expanded="false">Sidebars</a></li>
                                    <li class=""><a data-toggle="tab" href="#demo-settings-box-3" aria-expanded="false">Header &amp; Footer</a></li>
                                    <li class=""><a data-toggle="tab" href="#demo-settings-box-4" aria-expanded="false">Cambiar Color</a></li>
                                </ul>
                            </div>
                            <h3 class="panel-title">&nbsp;</h3>
                        </div>

                        <!--Panel body-->
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="demo-settings-box-1" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <img src="img/settings/animation.png">
                                        </div>
                                        <div class="col-xs-8">
                                            <table class="table mar-no">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><p class="text-lg text-semibold text-primary">Animations</p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><p>Enable Animations</p></td>
                                                        <td class="text-right">
                                                            <div id="demo-anim">
                                                                <label class="form-checkbox form-icon active">
                                                                    <input type="checkbox" checked="">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Transition effects</p>
                                                        </td>
                                                        <td class="text-right">
                                                            <select id="demo-ease">
                                                                <option value="effect" selected>ease (Default)</option>
                                                                <option value="easeInQuart">easeInQuart</option>
                                                                <option value="easeOutQuart">easeOutQuart</option>
                                                                <option value="easeInBack">easeInBack</option>
                                                                <option value="easeOutBack">easeOutBack</option>
                                                                <option value="easeInOutBack">easeInOutBack</option>
                                                                <option value="steps">Steps</option>
                                                                <option value="jumping">Jumping</option>
                                                                <option value="rubber">Rubber</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <img src="img/settings/box-layout.png">
                                        </div>
                                        <div class="col-xs-8">
                                            <table class="table mar-no">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><p class="text-lg text-semibold text-primary">Layout</p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><p>Boxed Layout</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-box-lay" class="form-checkbox form-icon active">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-settings-box-2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <img src="img/settings/navigation.png">
                                        </div>
                                        <div class="col-xs-8">
                                            <table class="table mar-no">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><p class="text-lg text-semibold text-primary">Navigation</p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><p>Fixed</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-nav-fixed" class="form-checkbox form-icon mar-btm">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Collapsed</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-nav-coll" class="form-checkbox form-icon mar-btm">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Off-Canvas Mode</p></td>
                                                        <td class="text-right">
                                                            <select id="demo-nav-offcanvas">
                                                                <option value="none" selected disabled="disabled">-- Select Mode --</option>
                                                                <option value="push">Push</option>
                                                                <option value="slide">Slide in on top</option>
                                                                <option value="reveal">Reveal</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <img src="img/settings/aside.png">
                                        </div>
                                        <div class="col-xs-8">
                                            <table class="table mar-no">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><p class="text-lg text-semibold text-primary">Aside</p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><p>Visible</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-asd-vis" class="form-checkbox form-icon">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Fixed</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-asd-fixed" class="form-checkbox form-icon">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Aside on the left side</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-asd-align" class="form-checkbox form-icon">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Bright Mode</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-asd-themes" class="form-checkbox form-icon">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-settings-box-3" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <img src="img/settings/header_and_footer.png">
                                        </div>
                                        <div class="col-xs-8">
                                            <table class="table mar-no">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><p class="text-lg text-semibold text-primary">Header &amp; Footer</p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><p>Fixed Header</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-navbar-fixed" class="form-checkbox form-icon">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Fixed Footer</p></td>
                                                        <td class="text-right">
                                                            <label id="demo-footer-fixed" class="form-checkbox form-icon">
                                                                <input type="checkbox">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-settings-box-4" class="tab-pane fade">
                                    <div id="demo-theme">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <img src="img/settings/scheme_a.png">
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="demo-theme-btn">
                                                    <a href="#" class="demo-theme demo-a-light add-tooltip" data-theme="theme-light" data-type="a" data-title="(A). Light">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-navy add-tooltip" data-theme="theme-navy" data-type="a" data-title="(A). Navy Blue">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-ocean add-tooltip" data-theme="theme-ocean" data-type="a" data-title="(A). Ocean">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-lime add-tooltip" data-theme="theme-lime" data-type="a" data-title="(A). Lime">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-purple add-tooltip" data-theme="theme-purple" data-type="a" data-title="(A). Purple">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-dust add-tooltip" data-theme="theme-dust" data-type="a" data-title="(A). Dust">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-mint add-tooltip" data-theme="theme-mint" data-type="a" data-title="(A). Mint">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-yellow add-tooltip" data-theme="theme-yellow" data-type="a" data-title="(A). Yellow">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-well-red add-tooltip" data-theme="theme-well-red" data-type="a" data-title="(A). Well Red">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-coffee add-tooltip" data-theme="theme-coffee" data-type="a" data-title="(A). Coffee">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-prickly-pear add-tooltip" data-theme="theme-prickly-pear" data-type="a" data-title="(A). Prickly pear">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-a-dark add-tooltip" data-theme="theme-dark" data-type="a" data-title="(A). Dark">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <img src="img/settings/scheme_b.png">
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="demo-theme-btn">
                                                    <a href="#" class="demo-theme demo-b-light add-tooltip" data-theme="theme-light" data-type="b" data-title="(B). Light">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-navy add-tooltip" data-theme="theme-navy" data-type="b" data-title="(B). Navy Blue">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-ocean add-tooltip" data-theme="theme-ocean" data-type="b" data-title="(B). Ocean">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-lime add-tooltip" data-theme="theme-lime" data-type="b" data-title="(B). Lime">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-purple add-tooltip" data-theme="theme-purple" data-type="b" data-title="(B). Purple">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-dust add-tooltip" data-theme="theme-dust" data-type="b" data-title="(B). Dust">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-mint add-tooltip" data-theme="theme-mint" data-type="b" data-title="(B). Mint">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-yellow add-tooltip" data-theme="theme-yellow" data-type="b" data-title="(B). Yellow">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-well-red add-tooltip" data-theme="theme-well-red" data-type="b" data-title="(B). Well red">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-coffee add-tooltip" data-theme="theme-coffee" data-type="b" data-title="(B). Coofee">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-prickly-pear add-tooltip" data-theme="theme-prickly-pear" data-type="b" data-title="(B). Prickly pear">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-b-dark add-tooltip" data-theme="theme-dark" data-type="b" data-title="(B). Dark">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <img src="img/settings/scheme_c.png">
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="demo-theme-btn">
                                                    <a href="#" class="demo-theme demo-c-light add-tooltip" data-theme="theme-light" data-type="c" data-title="(C). Light">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-navy add-tooltip" data-theme="theme-navy" data-type="c" data-title="(C). Navy Blue">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-ocean add-tooltip" data-theme="theme-ocean" data-type="c" data-title="(C). Ocean">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-lime add-tooltip" data-theme="theme-lime" data-type="c" data-title="(C). Lime">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-purple add-tooltip" data-theme="theme-purple" data-type="c" data-title="(C). Purple">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-dust add-tooltip" data-theme="theme-dust" data-type="c" data-title="(C). Dust">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-mint add-tooltip" data-theme="theme-mint" data-type="c" data-title="(C). Mint">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-yellow add-tooltip" data-theme="theme-yellow" data-type="c" data-title="(C). Yellow">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-well-red add-tooltip" data-theme="theme-well-red" data-type="c" data-title="(C). Well Red">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-coffee add-tooltip" data-theme="theme-coffee" data-type="c" data-title="(C). Coffee">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-prickly-pear add-tooltip" data-theme="theme-prickly-pear" data-type="c" data-title="(C). Prickly pear">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                    <a href="#" class="demo-theme demo-c-dark add-tooltip" data-theme="theme-dark" data-type="c" data-title="(C). Dark">
                                                        <div class="demo-theme-brand"></div>
                                                        <div class="demo-theme-head"></div>
                                                        <div class="demo-theme-nav"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pad-top pad-hor bord-top clearfix">
                <div class="pull-right">
                    <button id="demo-reset-settings" class="btn btn-primary mar-btm">Reset Settings</button>
                </div>
                <p class="text-lg text-semibold">Theme Options</p>
                <p class="text-muted text-sm">* All settings will be saved automatically.</p>
            </div>
        </div>
        <button id="demo-set-btn" class="btn btn-sm"><i class="fa fa-cog fa-2x"></i></button>
    </div>
    <!--===================================================-->
    <!-- END SETTINGS -->

    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="js/jquery-2.2.1.min.js"></script>

    <script src="js/funciones.js"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js/bootstrap.min.js"></script>


    <!--Fast Click [ OPTIONAL ]-->
    <script src="plugins/fast-click/fastclick.min.js"></script>

    
    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="js/nifty.min.js"></script>


    <!--Morris.js [ OPTIONAL ]-->
    <script src="plugins/morris-js/morris.min.js"></script>
	<script src="plugins/morris-js/raphael-js/raphael.min.js"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>


    <!--Skycons [ OPTIONAL ]-->
    <script src="plugins/skycons/skycons.min.js"></script>


    <!--Switchery [ OPTIONAL ]-->
    <script src="plugins/switchery/switchery.min.js"></script>


    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>


    <!--Demo script [ DEMONSTRATION ]-->
    <script src="js/demo/nifty-demo.min.js"></script>


    <!--Specify page [ SAMPLE ]-->
    <script src="js/demo/dashboard.js"></script>

    
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
