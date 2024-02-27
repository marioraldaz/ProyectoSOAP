<?php

require_once 'servicio.wsdl';
require_once '../src/Operaciones.php';

$server = new SoapServer('servicio.wsdl');
$server->setClass('Operaciones');
$server->handle();