<?php

//funcion que regresa los valores si existen para evitar deshabilitar los warnings
function obtener_parametro($nombre_parametro) {
	if (isset($_REQUEST[$nombre_parametro]))
		return trim($_REQUEST[$nombre_parametro]);
		
	return '';
}


$op = trim(obtener_parametro('op'));
$resultado = array();

if ($op == 'busqueda') {
	$ciudad = trim(obtener_parametro('ciudad'));
	$resultado['ciudades'] = array();
	
	if ($ciudad != '') {
		$url = "http://xoap.weather.com/weather/search/search?where={$ciudad}";
		$xml = simplexml_load_file($url);
		
		foreach($xml->loc as $localidad) {
			$item = array();
			$attributos = $localidad->attributes();
			
			$item['localidad_id'] = $attributos['id']."";
			$item['nombre'] = $localidad."";
			
			//agregar el item a los resultados
			$resultado['ciudades'][] = $item;
		}
	}
	
} else if ($op == 'clima') {
	$localidad_id = trim(obtener_parametro('localidad_id'));
	$resultado['clima'] = array();
	
	/*
	 * traduccion de los codigos de estado ver:
	 * http://developer.yahoo.com/weather/#codes
	 */
	
	$mensajes = array(
		0 => 'Tornado',
		1 => 'Tormenta Tropical',
		2 => 'Hurac&aacute;n',
		3 => 'Tormentas El&eacute;ctricas Severas',
		4 => 'Tormentas El&eacute;ctricas',
		5 => 'Lluvia y Nieve',
		6 => 'Lluvia y Aguanieve',
		7 => 'Nieve y Aguanieve',
		8 => 'Llovizna congelada',
		9 => 'Llovizna',
		10 => 'Lluvia congelada',
		11 => 'Lluvia',
		12 => 'Lluvia',
		13 => 'R&aacute;fagas de Nieve',
		14 => 'Nevada ligera',
		15 => 'Nieve con viento',
		16 => 'Nieve',
		17 => 'Granizo',
		18 => 'Aguanieve',
		19 => 'Polvo',
		20 => 'Neblina',
		21 => 'Niebla ligera',
		22 => 'Neblina', //no creo que sea exacta esta traduccion
		23 => 'Vendaval',
		24 => 'Con viento',
		25 => 'Helado',
		26 => 'Nublado',
		27 => 'Muy nublado (noche)',
		28 => 'Muy nublado (dia)',
		29 => 'Parcialmente nublado (noche)',
		30 => 'Parcialmente nublado (dia)',
		31 => 'Despejado (noche)',
		32 => 'Soleado',
		33 => 'Despejado (noche)',
		34 => 'Despejado (dia)',
		35 => 'Lluvia y Granizo',
		36 => 'Caluroso',
		37 => 'Tormentas el&eacute;ctricas aisladas',
		38 => 'Tormentas el&eacute;ctricas dispersas',
		39 => 'Tormentas el&eacute;ctricas dispersas',
		40 => 'Lluvia dispersa',
		41 => 'Nieve densa',
		42 => 'Nieve y lluvia dispersas',
		43 => 'Nieve densa',
		44 => 'Parcialmente nublado',
		45 => 'Tormentas el&eacute;ctricas',
		46 => 'Nieve',
		47 => 'Tormentas el&eacute;ctricas aisladas',
		3200 => 'No disponible',
	);
	
	if ($localidad_id != '') {
		$url = "http://weather.yahooapis.com/forecastrss?p={$localidad_id}&u=c";
		
		$namespace_yweather = 'http://xml.weather.yahoo.com/ns/rss/1.0';
		
		$xml_string = file_get_contents($url);
		$xml = new DOMDocument();
		$xml->loadXML($xml_string);
		
		$clima = $xml->getElementsByTagNameNS($namespace_yweather, 'condition');
		$clima = $clima->item(0);
		
		$resultado['clima']['codigo'] = $clima->getAttribute('code');
		$resultado['clima']['estado'] = $mensajes[$resultado['clima']['codigo']];
		$resultado['clima']['temperatura'] = $clima->getAttribute('temp');
		$resultado['clima']['fecha_unix'] = strtotime($clima->getAttribute('date'));
		$resultado['clima']['fecha'] = date('d/m/Y h:i:s', $resultado['clima']['fecha_unix']);			
	}
} else {
	$resultado = array('error' => 1, 'mensaje' => 'Operacion no valida');	
}

header('Content-Type: text/javascript');
//evitar cache

print json_encode($resultado);

?>