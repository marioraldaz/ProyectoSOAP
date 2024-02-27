<?php

require_once 'servicio.wsdl';

$client = new SoapClient('servicio.wsdl');

$result1 = $client->__soapCall('getPVP', array($parametro1));
$result2 = $client->__soapCall('getStock', array($parametro1, $parametro2));
// Llama a las otras funciones y maneja los resultados

?>