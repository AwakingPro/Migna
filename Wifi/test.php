<?php

require('api.php');

$API = new routeros_api();

$API->debug = true;

if ($API->connect('10.56.0.2', 'admin', 'm9a7r5s3')) {

   $API->comm("/ppp/secret/add", array(
          "name"     => "user",
          "password" => "pass",
          "service" => "pppoe",
          "profile"  => "2"));

   $READ = $API->read(false);
   $ARRAY = $API->parse_response($READ);

   print_r($ARRAY);

   $API->disconnect();

}

?>