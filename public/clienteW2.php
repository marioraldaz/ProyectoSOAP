<?php

require_once '../src/Clases1/Operaciones.php';

$client = new Operaciones();
$result1 = $client->getPVP($parametro1);
$result2 = $client->getStock($parametro1, $parametro2);
// Llama a las otras funciones y maneja los resultados

?>