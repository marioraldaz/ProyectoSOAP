<?php

$client = new SoapClient(null, array(
    'location' => "http://localhost/tarea6/servidorSoap/servicio.php",
    'uri' => "http://localhost/tarea6/servidorSoap/servicio.php",
    'trace' => 1
));

$result1 = $client->__soapCall('getPVP', array($parametro1));
$result2 = $client->__soapCall('getStock', array($parametro1, $parametro2));
// Llama a las otras funciones y maneja los resultados

?>