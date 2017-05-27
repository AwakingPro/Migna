<?php
require("simplepie.inc");
require("simplepie_yahoo_weather.inc");

$code = "PEXX0011";
$path = "http://weather.yahooapis.com/forecastrss?u=c&p=";
$feed = new SimplePie();
$feed->set_feed_url($path.$code);
$feed->set_item_class('SimplePie_Item_YWeather');
$feed->init();

$weather = $feed->get_item(0);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yahoo Weather</title>
<style type="text/css">
<!--
body {
	font-family: "Trebuchet MS", Tahoma, Verdana;
	font-size: 12px;
	font-weight: normal;
	color: #777777;
	text-decoration: none;
	background-color: #FFFFFF;
}
.copy {
	font-size: 12px;
	font-weight: normal;
	text-decoration: none;
	text-align: right;
	padding-top: 4px;
	padding-right: 16px;
	padding-bottom: 4px;
	padding-left: 16px;
}
-->
</style>
</head>
<body>
<h3>Condiciones para: <?php echo $weather->get_city().", ".$weather->get_country(); ?></h3>
<img src="<?php echo $weather->get_condition_image(); ?>" width="52" height="52" border="0">
<ul>
	<li><strong>Condici&oacute;n:</strong> <?php echo $weather->get_condition(); ?></li>
	<li><strong>Temperatura</strong> <?php echo $weather->get_temperature(); ?>&deg;<?php echo $weather->get_units_temp(); ?></li>
	<li><strong>Humedad:</strong> <?php echo $weather->get_humidity(); ?>%</li>
	<li><strong>Rising:</strong> <?php echo $weather->get_rising(); ?>%</li>
	<li><strong>Sunrise:</strong> <?php echo $weather->get_sunrise(); ?></li>
	<li><strong>Sunset:</strong> <?php echo $weather->get_sunset(); ?></li>
</ul>
</body>
</html>