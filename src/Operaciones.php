<?php

namespace Daw2\ProyectoSoap;

use Daw2\ProyectoSoap\DBConnection;
use PDO;
use PDOException;
class Operaciones extends DBConnection{
    private $conexion;

    public function __construct() {
        parent::getConnection();
    }

    public function getPVP($codigoProducto) {
        // Lógica para obtener el PVP del producto con el código dado
        $query = "SELECT pvp FROM productos WHERE codigo = :codigo";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':codigo', $codigoProducto);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pvp'];
    }

    public function getStock($codigoProducto, $codigoTienda) {
        // Lógica para obtener el stock del producto en la tienda dada
        $query = "SELECT stock FROM stock WHERE codigo_producto = :codigo_producto AND codigo_tienda = :codigo_tienda";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':codigo_producto', $codigoProducto);
        $stmt->bindParam(':codigo_tienda', $codigoTienda);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['stock'];
    }

    public function getFamilias() {
        // Lógica para obtener los códigos de todas las familias
        $query = "SELECT codigo FROM familias";
        $stmt = $this->conexion->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }

    public function getProductosFamilia($codigoFamilia) {
        // Lógica para obtener los códigos de todos los productos de una familia
        $query = "SELECT codigo FROM productos WHERE codigo_familia = :codigo_familia";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':codigo_familia', $codigoFamilia);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }
}