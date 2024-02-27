<?php

require_once '../vendor/autoload.php';

use PHP2WSDL\PHPClass2WSDL;

// Ruta a la clase que contiene las funciones que deseas exponer como servicios SOAP
$class = "Daw2\\ProyectoSoap\\servicioW";
// URI del servicio
$uri = 'http://localhost/unidad6/servidorSoap/servicioW.php';
// Instancia del generador de WSDL
$wsdlGenerator = new PHPClass2WSDL($class, $uri);

// Generar el archivo WSDL
$wsdlGenerator->generateWSDL(true);

// Guardar el archivo WSDL en la carpeta especificada
$file = $wsdlGenerator->save('../servidorSoap/servicioW.wsdl');

echo "WSDL generado correctamente en $file";

?>