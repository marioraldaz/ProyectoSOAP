<?php

// Crear una instancia del cliente SOAP
$client = new SoapClient(null,["location"=>"http://localhost/mio/ProyectoSoap/servidorSoap/servicio.php", "uri"=>"http://localhost/mio/ProyectoSoap/servidorSoap", "trace"=>true]);

try {
    // Llamar a un método del servidor SOAP
    $resultado = $client->getPVP(1); // Ejemplo: llamar al método getPVP con el código de producto 123
    echo "Resultado de getPVP: $resultado\n<br>";

  

    // Otros llamados a métodos del servidor SOAP
    // ...

} catch (SoapFault $e) {
    // Capturar errores SOAP
    echo "Error SOAP: " . $e;
} catch (Exception $e) {
    // Capturar otras excepciones
    echo "Error: " . $e->getMessage() . "\n";
}

?>