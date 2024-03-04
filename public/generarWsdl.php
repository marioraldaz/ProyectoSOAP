<?php

namespace Daw2\ProyectoSoap;

// Incluimos el archivo de autoload generado por Composer
require_once '../vendor/autoload.php';

use PHP2WSDL\PHPClass2WSDL;

// Especificamos la clase PHP que queremos exponer como un servicio SOAP
$class = "Daw2\ProyectoSoap\Operaciones";

// Especificamos el URI en el que se ofrecerá el servicio
$uri = 'http://localhost/mio/ProyectoSoap/servicio.php';

// Creamos una instancia de PHPClass2WSDL y generamos el WSDL
$wsdlGenerator = new PHPClass2WSDL($class, $uri);
$wsdlGenerator->generateWSDL(true);

// Guardamos el archivo WSDL generado
$wsdlFile = '../servidorSoap/servicio.wsdl';
$wsdlGenerator->save($wsdlFile);

echo "WSDL generado exitosamente en $wsdlFile.";

?>