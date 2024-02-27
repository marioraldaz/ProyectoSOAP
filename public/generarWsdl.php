<?php

require_once 'vendor/autoload.php';
require_once '../src/Operaciones.php';

$autoloader = new Zend\Soap\AutoDiscover();
$autoloader->setClass('Operaciones');
$autoloader->setUri('http://localhost/tarea6/servidorSoap/servicioW.php');
$autoloader->handle();

