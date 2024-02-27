<?php

namespace Daw2\ProyectoSoap;

use Daw2\ProyectoSoap\DBConnection;

use PDO;

use PDOException;

class Stock extends DBConnection{


    private $conexion;

    public function __construct() {
        parent::getConnection();
    }

    public function getStockByCodigoAndTienda($codigo, $tienda_id) {
        // Obtener el stock de un producto en una tienda específica
        $query = "SELECT stock FROM stock WHERE codigo_producto = :codigo AND tienda_id = :tienda_id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':tienda_id', $tienda_id);
        $stmt->execute();
        $stock = $stmt->fetchColumn();
        return $stock;
    }
}