<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA - Administracion de Datacenter</title>


    <!--STYLESHEET-->
    <!--=================================================-->



    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMO ]-->
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--Animate.css [ OPTIONAL ]-->
    <link href="plugins/animate-css/animate.min.css" rel="stylesheet">


    <!--Morris.js [ OPTIONAL ]-->
    <link href="plugins/morris-js/morris.min.css" rel="stylesheet">


    <!--Switchery [ OPTIONAL ]-->
    <link href="plugins/switchery/switchery.min.css" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


    <!--Demo script [ DEMONSTRATION ]-->
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
    <div id="container" class="effect mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Nifty</span>
                        </div>
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
                                    <p class="text-lg text-semibold mar-no">You have 9 notifications.</p>
                                </div>
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">

                                            <!-- Dropdown list-->
                                            <li>
                                                <a href="#">
                                                    <div class="clearfix">
                                                        <p class="pull-left">Database Repair</p>
                                                        <p class="pull-right">70%</p>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div style="width: 70%;" class="progress-bar">
                                                            <span class="sr-only">70% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Dropdown list-->
                                            <li>
                                                <a href="#">
                                                    <div class="clearfix">
                                                        <p class="pull-left">Upgrade Progress</p>
                                                        <p class="pull-right">10%</p>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div style="width: 10%;" class="progress-bar progress-bar-warning">
                                                            <span class="sr-only">10% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Dropdown list-->
                                            <li>
                                                <a class="media" href="#">
                                            <span class="badge badge-success pull-right">90%</span>
                                                    <div class="media-left">
                                                        <i class="pli-data-settings icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-nowrap">HDD is full</div>
                                                        <small class="text-muted">50 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Dropdown list-->
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <i class="pli-file-edit icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-nowrap">Write a news article</div>
                                                        <small class="text-muted">Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Dropdown list-->
                                            <li>
                                                <a class="media" href="#">
                                            <span class="label label-danger pull-right">New</span>
                                                    <div class="media-left">
                                                        <i class="pli-speech-bubble-7 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-nowrap">Comment Sorting</div>
                                                        <small class="text-muted">Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Dropdown list-->
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <i class="pli-add-user-plus-star icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-nowrap">New User Registered</div>
                                                        <small class="text-muted">4 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php/*
                                                print message_dropdown("av4.png", "Lucy", "30 minutes ago");
                                                print message_dropdown("av3.png", "Jackson", "40 minutes ago");
                                                print notification_dropdown('icon-circle bg-danger', 'fa-hdd-o', 'HDD is full', '50 minutes ago', 'badge badge-success', '90%');
                                                print notification_dropdown('bg-info', 'fa-file-word-o', 'Write a news article', 'Last Update 8 hours ago');
                                                print notification_dropdown('bg-purple', 'fa-comment', 'Comment Sorting', 'Last Update 8 hours ago', 'label label-danger', 'New');
                                                print notification_dropdown('bg-success', 'fa-user', 'New User Registered', '4 minutes ago');
                                                print message_dropdown("av3.png", "Jackson", "Yesterday");
                                            */?>
                                            <!-- Dropdown list-->
                                            <li class="bg-gray">
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="img/av4.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-nowrap">Lucy sent you a message</div>
                                                        <small class="text-muted">30 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>

                                            <!-- Dropdown list-->
                                            <li class="bg-gray">
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="img/av3.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="text-nowrap">Jackson sent you a message</div>
                                                        <small class="text-muted">40 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!--Dropdown footer-->
                                <div class="pad-all bord-top">
                                    <a href="#" class="btn-link text-dark box-block">
                                        <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Notifications
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->



                        <!--Mega dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                     
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End mega dropdown-->

                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <!--Language selector-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="dropdown">
                            <a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                                <span class="lang-selected">
                                        <img class="lang-flag" src="img/flags/spain.png" alt="Spain">
                                </span>
                            </a>

                            <!--Language selector menu-->
                            <ul class="head-list dropdown-menu">
						        <li>
						            <!--English-->
						            <a href="#" class="active">
                                     <img class="lang-flag" src="img/flags/spain.png" alt="Spain">
                                        <span class="lang-id">ES</span>
                                        <span class="lang-name">Espa&ntilde;ol</span>
						                <img class="lang-flag" src="img/flags/united-kingdom.png" alt="English">
						                <span class="lang-id">EN</span>
						                <span class="lang-name">English</span>
						            </a>
						        </li>
						        <li>
						            <!--France-->
						            <a href="#">
						                <img class="lang-flag" src="img/flags/france.png" alt="France">
						                <span class="lang-id">FR</span>
						                <span class="lang-name">Fran&ccedil;ais</span>
						            </a>
						        </li>
						        <li>
						            <!--Germany-->
						            <a href="#">
						                <img class="lang-flag" src="img/flags/germany.png" alt="Germany">
						                <span class="lang-id">DE</span>
						                <span class="lang-name">Deutsch</span>
						            </a>
						        </li>
						        <li>
						            <!--Italy-->
						            <a href="#">
						                <img class="lang-flag" src="img/flags/italy.png" alt="Italy">
						                <span class="lang-id">IT</span>
						                <span class="lang-name">Italiano</span>
						            </a>
						        </li>
						        <li>
						            <!--Spain-->
						            <a href="#">
						                <img class="lang-flag" src="img/flags/spain.png" alt="Spain">
						                <span class="lang-id">ES</span>
						                <span class="lang-name">Espa&ntilde;ol</span>
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
                                    <img class="img-circle img-user media-object" src="img/av1.png" alt="Profile Picture">
                                </span>
                                <div class="username hidden-xs">Luis Ponce Z.</div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- Dropdown heading  -->
                                <div class="pad-all bord-btm">
                                    <p class="text-lg text-semibold mar-btm">750Gb of 1,000Gb Used</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar" style="width: 70%;">
                                            <span class="sr-only">70%</span>
                                        </div>
                                    </div>
                                </div>


                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                    <li>
                                        <a href="#">
                                            <i class="pli-male icon-lg icon-fw"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">9</span>
                                            <i class="pli-mail icon-lg icon-fw"></i> Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success pull-right">New</span>
                                            <i class="pli-gear icon-lg icon-fw"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="pli-information icon-lg icon-fw"></i> Help
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="pli-computer-secure icon-lg icon-fw"></i> Lock screen
                                        </a>
                                    </li>
                                </ul>

                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a href="pages-login.html" class="btn btn-primary">
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
                    <h1 class="page-header text-overflow">Dashboard</h1>

           
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->


        

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<div class="row">
					    <div class="col-lg-12">
					
					        <!--Network Line Chart-->
					        <!--===================================================-->
					        <div id="demo-panel-network" class="panel">
					            <div class="panel-heading">
					                <div class="panel-control">
					                    <button id="demo-panel-network-refresh" data-toggle="panel-overlay" data-target="#demo-panel-network" class="btn"><i class="fa fa-rotate-right"></i></button>
					                    <div class="btn-group">
					                        <button class="dropdown-toggle btn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i></button>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#">Action</a></li>
					                            <li><a href="#">Another action</a></li>
					                            <li><a href="#">Something else here</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#">Separated link</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <h3 class="panel-title">Uso de Enlace de Datos</h3>
					            </div>
					
					            <!--Morris line chart placeholder-->
					            <div id="morris-chart-network" class="morris-full-content"></div>
					
					            <!--Chart information-->
					            <div class="panel-body">
					                <div class="row">
					                    <div class="col-lg-9">
					                        <p class="text-semibold text-uppercase">Temperatura Sala 1</p>
					                        <div class="row">
					                            <div class="col-xs-5">
					                                <div class="media">
					                                    <div class="media-left">
					                                        <span class="text-3x text-nowrap">
					                                            <i class="pli-temperature"></i> 20.7</span>
					                                    </div>
					                                    <div class="media-body">
					                                        <p class="mar-no">°C</p>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="col-xs-7 text-sm">
					                                <p>
					                                    <span>Minima</span>
					                                    <span class="pad-lft text-semibold">
					                                        <span class="text-lg">19°</span>
					                                        
					                                    </span>
					                                </p>
					                                <p>
					                                    <span>Maxima</span>
					                                    <span class="pad-lft text-semibold">
					                                        <span class="text-lg">22°</span>
					                                     
					                                    </span>
					                                </p>
					                            </div>
					                        </div>
					
					                        <hr>
					
					                        <div class="pad-rgt">
					                            <p class="text-semibold text-uppercase"><i class="fa fa-question-circle fa-fw text-primary"></i> Today Tips </p>
					                            <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
					                        </div>
					                    </div>
					
					                    <div class="col-lg-3">
					                        <p class="text-uppercase text-semibold">Bandwidth Usage</p>
					                        <ul class="list-unstyled">
					                            <li>
					                                <div class="media pad-btm">
					                                    <div class="media-left">
					                                        <span class="text-2x text-semibold">754.9</span>
					                                    </div>
					                                    <div class="media-body">
					                                        <p class="mar-no">Mbps</p>
					                                    </div>
					                                </div>
					                            </li>
					                            <li class="pad-btm">
					                                <div class="clearfix">
					                                    <p class="pull-left mar-no">Income</p>
					                                    <p class="pull-right mar-no">70%</p>
					                                </div>
					                                <div class="progress progress-xs">
					                                    <div class="progress-bar" style="width: 70%;">
					                                        <span class="sr-only">70% Complete</span>
					                                    </div>
					                                </div>
					                            </li>
					                            <li>
					                                <div class="clearfix">
					                                    <p class="pull-left mar-no">Outcome</p>
					                                    <p class="pull-right mar-no">10%</p>
					                                </div>
					                                <div class="progress progress-xs">
					                                    <div class="progress-bar progress-bar-info" style="width: 10%;">
					                                        <span class="sr-only">10% Complete</span>
					                                    </div>
					                                </div>
					                            </li>
					                        </ul>
					                    </div>
					                </div>
					            </div>
					
					
					        </div>
					        <!--===================================================-->
					        <!--End network line chart-->
					
					    </div>
					    <div class="col-lg-12">
					        <div class="row">
					            <div class="col-sm-6 col-lg-6">
					
					                <!--Sparkline Area Chart-->
					                <div class="panel panel-success panel-colorful">
					
					                    <div class="pad-all">
					                        <p class="text-lg text-semibold"><i class="pli-data-storage icon-fw"></i> HDD VMWare </p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">1,1Tb</span>
					                            Free Space
					                        </p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">900Gb</span>
					                            Used space
					                        </p>
					                    </div>
					                    <div class="pad-all text-center">
					
					                        <!--Placeholder-->
					                        <div id="demo-sparkline-area"></div>
					
					                    </div>
					                </div>
					            </div>
					            <div class="col-sm-6 col-lg-6">
					
					                <!--Sparkline Line Chart-->
					                <div class="panel panel-info panel-colorful">
					                    <div class="pad-all">
					                        <p class="text-lg text-semibold"><i class="pli-wallet-2 icon-fw"></i> Earning</p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">$764</span>
					                            Today
					                        </p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">$1,332</span>
					                            Last 7 Day
					                        </p>
					                    </div>
					                    <div class="pad-all text-center">
					
					                        <!--Placeholder-->
					                        <div id="demo-sparkline-line"></div>
					
					                    </div>
					                </div>
					            </div>
					        </div>
					        <div class="row">
					            <div class="col-sm-6 col-lg-6">
					
					                <!--Sparkline bar chart -->
					                <div class="panel panel-purple panel-colorful">
					                    <div class="pad-all">
					                        <p class="text-lg text-semibold"><i class="pli-bag-coins icon-fw"></i> Sales</p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">$764</span>
					                            Today
					                        </p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">$1,332</span>
					                            Last 7 Day
					                        </p>
					                    </div>
					                    <div class="pad-all text-center">
					
					                        <!--Placeholder-->
					                        <div id="demo-sparkline-bar" class="box-inline"></div>
					
					                    </div>
					                </div>
					            </div>
					            <div class="col-sm-6 col-lg-6">
					
					                <!--Sparkline pie chart -->
					                <div class="panel panel-warning panel-colorful">
					                    <div class="pad-all">
					                        <p class="text-lg text-semibold"><i class="pli-check icon-fw"></i> Task Progress</p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">34</span>
					                            Completed
					                        </p>
					                        <p class="mar-no">
					                            <span class="pull-right text-bold">79</span>
					                            Total
					                        </p>
					                    </div>
					                    <div class="pad-all">
					                            <ul class="list-group list-unstyled">
					                                <li class="mar-btm">
					                                    <span class="label label-warning pull-right">15%</span>
					                                    <p>Progress</p>
					                                    <div class="progress progress-md">
					                                        <div style="width: 15%;" class="progress-bar progress-bar-light">
					                                            <span class="sr-only">15%</span>
					                                        </div>
					                                    </div>
					                                </li>
					                            </ul>
					                        <!--Placeholder-->
					                        <div id="demo-sparkline-pie" class="box-inline hidden"></div>
					                    </div>
					                </div>
					            </div>
					        </div>
					
					
					        <!--Extra Small Weather Widget-->
					        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
					        <div class="panel middle">
					            <div class="media-left pad-all">
					                <canvas id="demo-weather-xs-icon" width="48" height="48"></canvas>
					            </div>
					
					            <div class="media-body">
					                <p class="text-2x mar-no">25&#176;</p>
					                <p class="text-sm mar-no text-uppercase">Partly Cloudy Day</p>
					            </div>
					        </div>
					
					        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
					        <!--End Extra Small Weather Widget-->
					
					
					    </div>
					</div>
					
					
					<!--Tiles - Bright Version-->
					
					<!--===================================================-->
					<!--End Tiles - Bright Version-->
					
				
					
				
					
					
					
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
                            <li class="col-xs-4" data-content="Additional Sidebar">
                                <a id="demo-toggle-aside" class="shortcut-grid" href="#">
                                    <i class="psi-sidebar-window"></i>
                                </a>
                            </li>
                            <li class="col-xs-4" data-content="Notification">
                                <a id="demo-alert" class="shortcut-grid" href="#">
                                    <i class="psi-speech-bubble-comic-2"></i>
                                </a>
                            </li>
                            <li class="col-xs-4" data-content="Page Alerts">
                                <a id="demo-page-alert" class="shortcut-grid" href="#">
                                    <i class="psi-warning-window"></i>
                                </a>
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
						            <li class="list-header">Navigation</li>
						
						            <!--Menu list item-->
						            <li class="active-link">
						                <a href="index.html">
						                    <i class="psi-home"></i>
						                    <span class="menu-title">
												<strong>Dashboard</strong>
												<span class="label label-success pull-right">Top</span>
											</span>
						                </a>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-split-vertical-2"></i>
						                    <span class="menu-title">
												<strong>Layouts</strong>
											</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="layouts-collapsed-navigation.html">Collapsed Navigation</a></li>
											<li><a href="layouts-offcanvas-navigation.html">Off-Canvas Navigation</a></li>
											<li><a href="layouts-offcanvas-slide-in-navigation.html">Slide-in Navigation</a></li>
											<li><a href="layouts-offcanvas-revealing-navigation.html">Revealing Navigation</a></li>
											<li class="list-divider"></li>
											<li><a href="layouts-aside-right-side.html">Aside on the right side</a></li>
											<li><a href="layouts-aside-left-side.html">Aside on the left side</a></li>
											<li><a href="layouts-aside-bright-theme.html">Bright aside theme</a></li>
											<li class="list-divider"></li>
											<li><a href="layouts-fixed-navbar.html">Fixed Navbar</a></li>
											<li><a href="layouts-fixed-footer.html">Fixed Footer</a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="widgets.html">
						                    <i class="psi-gear-2"></i>
						                    <span class="menu-title">
												<strong>Widgets</strong>
												<span class="pull-right badge badge-warning">9</span>
											</span>
						                </a>
						            </li>
						
						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Components</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-boot-2"></i>
						                    <span class="menu-title">
												Bootstrap
												<span class="pull-right label label-purple">UI</span>
											</span>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="ui-buttons.html">Buttons</a></li>
											<li><a href="ui-checkboxes-radio.html">Checkboxes &amp; Radio</a></li>
											<li><a href="ui-panels.html">Panels</a></li>
											<li><a href="ui-modals.html">Modals</a></li>
											<li><a href="ui-progress-bars.html">Progress bars</a></li>
											<li><a href="ui-components.html">Components</a></li>
											<li><a href="ui-typography.html">Typography</a></li>
											<li><a href="ui-list-group.html">List Group</a></li>
											<li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
											<li><a href="ui-alerts-tooltips.html">Alerts &amp; Tooltips</a></li>
											<li><a href="ui-helper-classes.html">Helper Classes</a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-pen-5"></i>
						                    <span class="menu-title">Forms</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="forms-general.html">General</a></li>
											<li><a href="forms-components.html">Components</a></li>
											<li><a href="forms-validation.html">Validation</a></li>
											<li><a href="forms-wizard.html">Wizard</a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-receipt-4"></i>
						                    <span class="menu-title">Tables</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="tables-static.html">Static Tables</a></li>
											<li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
											<li><a href="tables-datatable.html">Data Tables<span class="label label-info pull-right">New</span></a></li>
											<li><a href="tables-footable.html">Foo Tables<span class="label label-info pull-right">New</span></a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="charts.html">
						                    <i class="psi-bar-chart"></i>
						                    <span class="menu-title">Charts</span>
						                </a>
						            </li>
						
						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">More</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-repair"></i>
						                    <span class="menu-title">Miscellaneous</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="misc-calendar.html">Calendar</a></li>
											<li><a href="misc-maps.html">Google Maps</a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-mail"></i>
						                    <span class="menu-title">Email</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="mailbox.html">Inbox</a></li>
											<li><a href="mailbox-message.html">View Message</a></li>
											<li><a href="mailbox-compose.html">Compose Message</a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-file-html"></i>
						                    <span class="menu-title">Pages</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="pages-blank.html">Blank Page</a></li>
											<li><a href="pages-profile.html">Profile</a></li>
											<li><a href="pages-search-results.html">Search Results</a></li>
											<li><a href="pages-timeline.html">Timeline<span class="label label-info pull-right">New</span></a></li>
											<li><a href="pages-faq.html">FAQ</a></li>
											<li class="list-divider"></li>
											<li><a href="pages-404.html">404 Error</a></li>
											<li><a href="pages-500.html">500 Error</a></li>
											<li class="list-divider"></li>
											<li><a href="pages-login.html">Login</a></li>
											<li><a href="pages-register.html">Register</a></li>
											<li><a href="pages-password-reminder.html">Password Reminder</a></li>
											<li><a href="pages-lock-screen.html">Lock Screen</a></li>
											
						                </ul>
						            </li>


                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="psi-tactic"></i>
                                            <span class="menu-title">Menu Level</span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="#">Second Level Item</a></li>
                                            <li><a href="#">Second Level Item</a></li>
                                            <li><a href="#">Second Level Item</a></li>
                                            <li class="list-divider"></li>
                                            <li>
                                                <a href="#">Third Level<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Third Level<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li class="list-divider"></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                    <li><a href="#">Third Level Item</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

						
						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Extras</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-happy"></i>
						                    <span class="menu-title">Icons Pack</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="icons-ionicons.html">Ion Icons</a></li>
											<li><a href="icons-themify.html">Themify</a></li>
											<li><a href="icons-font-awesome.html">Font Awesome</a></li>
											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="psi-medal-2"></i>
						                    <span class="menu-title">
												PREMIUM ICONS
												<span class="label label-danger pull-right">BEST</span>
											</span>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="premium-line-icons.html">Line Icons Pack</a></li>
											<li><a href="premium-solid-icons.html">Solid Icons Pack</a></li>
											
						                </ul>
						            </li>                                </ul>


                                <!--Widget-->
                                <!--================================-->
                                <div class="mainnav-widget">

                                    <!-- Show the button on collapsed navigation -->
                                    <div class="show-small">
                                        <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                    </div>

                                    <!-- Hide the content on collapsed navigation -->
                                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                        <ul class="list-group">
                                            <li class="list-header pad-no pad-ver">Server Status</li>
                                            <li class="mar-btm">
                                                <span class="label label-primary pull-right">15%</span>
                                                <p>CPU Usage</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                        <span class="sr-only">15%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mar-btm">
                                                <span class="label label-purple pull-right">75%</span>
                                                <p>Bandwidth</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                        <span class="sr-only">75%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">Ver Detalles</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--================================-->
                                <!--End widget-->

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
         

        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">




            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">Versión v2.4.1</div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2016 Netland Chile S.A.</p>



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
                                    <li class=""><a data-toggle="tab" href="#demo-settings-box-4" aria-expanded="false">Color Schemes</a></li>
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!-- END SETTINGS -->

    
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
