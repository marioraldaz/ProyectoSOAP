<?php

namespace Daw2\ProyectoSoap;

// Incluimos el archivo de autoload generado por Composer
require_once '../vendor/autoload.php';

// Clase que contiene los métodos a exponer como servicios SOAP
class servicioW {
    
    /**
     * Suma dos números.
     * 
     * @param int $a Primer número
     * @param int $b Segundo número
     * @return int Resultado de la suma
     */
    public function sumar($a, $b) {
        return $a + $b;
    }

    /**
     * Resta dos números.
     * 
     * @param int $a Primer número
     * @param int $b Segundo número
     * @return int Resultado de la resta
     */
    public function restar($a, $b) {
        return $a - $b;
    }

    /**
     * Multiplica dos números.
     * 
     * @param int $a Primer número
     * @param int $b Segundo número
     * @return int Resultado de la multiplicación
     */
    public function multiplicar($a, $b) {
        return $a * $b;
    }

    /**
     * Divide dos números.
     * 
     * @param int $a Dividendo
     * @param int $b Divisor
     * @return float Resultado de la división
     */
    public function dividir($a, $b) {
        if ($b == 0) {
            throw new \Exception("No es posible dividir por cero.");
        }
        return $a / $b;
    }
}

// Creamos una instancia de SoapServer con el archivo WSDL
$server = new \SoapServer('../servidorSOAP/servicio.wsdl');

// Asociamos la clase servicioW al servidor SOAP
$server->setObject(new servicioW());

// Manejamos las solicitudes SOAP
$server->handle();

?>