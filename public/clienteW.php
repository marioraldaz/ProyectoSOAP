<?php

require_once '../vendor/autoload.php';

try{
    $client = new SoapClient('http://localhost/mio/ProyectoSOAP/servidorSoap/servicioW.php?wsdl');
    $resultado = $client->getPVP(1); // Ejemplo: llamar al método getPVP con el código de producto 123

}catch(soapFault $e){
    var_dump($e);
    var_dump($client->__getLastRequestHeaders());
}


// Llama a las otras funciones y maneja los resultados

?>