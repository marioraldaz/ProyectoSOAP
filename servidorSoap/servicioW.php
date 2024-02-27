<?php

namespace Daw2\ProyectoSoap;

// Incluimos el archivo de autoload generado por Composer
require_once '../vendor/autoload.php';

// Creamos una instancia de SoapServer con el archivo WSDL
$server = new \SoapServer('servidorSoap/servicio.wsdl');

// Manejamos las solicitudes SOAP
$server->handle();

?>