<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<? 
$xml = simplexml_load_file('http://weather.service.msn.com/data.aspx?weadegreetype=C&culture=es-ES&weasearchstr=Curacavi,CL'); 
$information = $xml->xpath("weather");$information=(array)$information[0]->attributes();$information=$information['@attributes']; 
$current = $xml->xpath("weather/current");$current=(array)$current[0]->attributes();$current=$current['@attributes']; 
$forecast_list = $xml->xpath("weather/forecast"); 
?> 
<html> 
    <head> 
        <title>Pronóstico del Tiempo</title> 
    </head> 
    <body> 
        <h3>Curacaví, Santiago de Chile</h3> 
                <h4>El Clima Ahora</h4>  
                <div class="weather"> <img src="<?= $information[imagerelativeurl].$current['skycode']?>.gif" alt="Clima"?> 
            <span class="condition"> 
            <?= $current[temperature]?>°C, 
            <?=    $current[skytext]?> 
            </span> 
        </div> 
        <h4>Proximos Días</h4> 
        <? 
         foreach($forecast_list as $forecast){ 
             $forecast=(array)$forecast[0]->attributes();$forecast=$forecast['@attributes']; 
          ?> 
        <div class="weather"> 
            <img src="<?= $information[imagerelativeurl].$forecast['skycodeday']?>.gif" alt="Clima"?> 
            <div><? echo strtoupper(substr($forecast[day],0,1));echo substr($forecast[day],1);?></div> 
            <span class="condition"> 
                <?= $forecast[low]?>°C - <?= $forecast[high] ?>°C, 
                <?= $forecast[skytextday]?> 
            </span> 
        </div> 
<? }?>