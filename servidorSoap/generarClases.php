<?php

namespace Daw2\ProyectoSoap;

// Incluye el autoload de Composer para cargar las clases necesarias
require_once '../vendor/autoload.php';

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

// Ruta al archivo WSDL
$wsdlFile = 'servidorSoap/servicio.wsdl';

// Directorio de salida para las clases generadas
$outputDirectory = 'src/Clases1';

// Comando para generar las clases PHP
$command = "wsdl2php -o $outputDirectory $wsdlFile";

// Ejecutar el comando
$process = new Process([$command]);
$process->run();

// Verificar si ocurrió algún error al ejecutar el comando
if (!$process->isSuccessful()) {
    throw new ProcessFailedException($process);
}

// Mostrar la salida del proceso
echo $process->getOutput();

?>