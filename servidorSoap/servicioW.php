<?php

namespace Daw2\ProyectoSoap;

// Incluimos el archivo de autoload generado por Composer
require_once '../vendor/autoload.php';

// Importamos las clases que necesitaremos
use Daw2\ProyectoSoap\Operaciones;

// Creamos una instancia de SoapServer
$server = new \SoapServer('http://localhost/mio/proyectoSOAP/servidorSoap/servicio.wsdl');

// Asociamos la clase Operaciones al servidor SOAP
$server->setClass(Operaciones::class);

// Manejamos las solicitudes SOAP
$server->handle();