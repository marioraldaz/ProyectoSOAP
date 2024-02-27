<?php

require_once '../vendor/autoload.php';
use Daw2\ProyectoSoap\servicioW;

// Crear una instancia del cliente SOAP utilizando la clase generada por wsdl2php
$client = new servicioW();

// Llamar a las funciones del servicio web
try {
    // Llamada a la función getPVP
    $codigoProducto = 'ABC123';
    $pvp = $client->getPVP($codigoProducto);
    echo "El PVP del producto $codigoProducto es: $pvp" . PHP_EOL;

    // Llamada a la función getStock
    $codigoTienda = 'T001';
    $stock = $client->getStock($codigoProducto, $codigoTienda);
    echo "El stock del producto $codigoProducto en la tienda $codigoTienda es: $stock" . PHP_EOL;

    // Llamada a la función getFamilias
    $familias = $client->getFamilias();
    echo "Las familias disponibles son: " . implode(', ', $familias) . PHP_EOL;

    // Llamada a la función getProductosFamilia
    $codigoFamilia = 'F001';
    $productos = $client->getProductosFamilia($codigoFamilia);
    echo "Los productos de la familia $codigoFamilia son: " . implode(', ', $productos) . PHP_EOL;
} catch (Exception $e) {
    echo "Error al llamar al servicio: " . $e->getMessage() . PHP_EOL;
}