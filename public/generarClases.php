<?php

namespace Daw2\ProyectoSoap;

use Wsdl2PhpGenerator\Generator;
use Wsdl2PhpGenerator\Config;
// Incluye el autoload de Composer para cargar las clases necesarias
require_once '../vendor/autoload.php';


$generador = new Generator();

$generador->generate(
    new Config([
        'inputFile'=>'http://localhost/mio/ProyectoSOAP/servidorSoap/servicio.wsdl',
        'outputDir'=>'../src/Clases1',
        'namespaceName'=>'Daw2\ProyectoSoap'
    ])
);