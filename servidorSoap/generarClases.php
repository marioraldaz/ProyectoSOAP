<?php

require_once 'vendor/autoload.php';

// Se crea una instancia de Wsdl2PhpGenerator\Config y se le pasan las opciones.
$config = new Wsdl2PhpGenerator\Config(array(
    'inputFile' => 'servicio.wsdl',  // Se especifica el archivo WSDL de entrada.
    'outputDir' => '../src/Clases1',  // Se especifica el directorio de salida donde se guardarán las clases generadas.
));

// Se crea una instancia del generador de wsdl2phpgenerator.
$generator = new \Wsdl2PhpGenerator\Generator();

// Se genera el código PHP basado en la configuración especificada.
$generator->generate($config);