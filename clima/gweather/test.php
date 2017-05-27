<?php
require("xml2array.php");
require("functions.php");

$url = "http://www.google.com/ig/api?weather=lima&hl=es";

$contents = file_get_contents($url);
$data = xml2array($contents);

print_r($data);
?>
