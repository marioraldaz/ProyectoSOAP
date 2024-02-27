<?php

require_once '../src/Operaciones.php';

$server = new SoapServer(null, array('uri' => 'http://localhost/tarea6/servidorSoap/servicio.php'));
$server->setClass('Operaciones');
$server->handle();

?>