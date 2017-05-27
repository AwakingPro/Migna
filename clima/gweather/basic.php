<?php
require("xml2array.php");
require("functions.php");

$url = "http://www.google.com/ig/api?weather=lima&hl=es";

$contents = file_get_contents($url);
$data = xml2array($contents);

$weather_info = $data['xml_api_reply']['weather']['forecast_information'];
$weather_current = $data['xml_api_reply']['weather']['current_conditions'];
$weather_forecast = $data['xml_api_reply']['weather']['forecast_conditions'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Google Weather Demo </title>
<style type="text/css">
<!--
body {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333;
	text-decoration: none;
	line-height: 18px;
	margin: 10px;
}
img {
	border: 1px solid #F0F0F0;
	padding: 5px;
}
h3 {
	font-size: 14px;
	color: #06C;
}
form {
	padding: 10px;
	border: 1px solid #DBDBDB;
	background-color: #F1F1F1;
	margin-bottom: 10px;
	width: 500px;
}
#result {
	padding: 10px;
	margin-bottom: 10px;
	width: 500px;
}
#current {
	padding: 10px;
	width: 500px;
	border: 1px dashed #C2C2C2;
	margin-bottom: 10px;
}
#current img {
	float: left;
	margin-right: 10px;
	margin-top: 4px;
}
#forecast {
	padding: 10px;
	width: 500px;
	border: 1px dashed #C2C2C2;
}
#forecast #item {
	float: left;
	width: 70px;
	text-align: center;
}
.mini {
	font-size: 10px;
}
-->
</style>
</head>
<body>
<h3>Google Weather Demo </h3>
<div id="current">
    <strong><?php echo utf8_encode($weather_info['city']['attr']['data']); ?></strong><br />
    <img src="<?php echo $weather_current['icon']['attr']['data']; ?>" width="40" height="40" />
    Condición: <?php echo $weather_current['condition']['attr']['data']; ?><br />
    Temperatura: <?php echo $weather_current['temp_c']['attr']['data']; ?> &deg;C<br />
    <?php echo $weather_current['humidity']['attr']['data']; ?><br />
</div>
</body>
</html>