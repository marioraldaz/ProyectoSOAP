<?php

namespace Daw2\ProyectoSoap;

use Daw2\ProyectoSoap\DBConnection;

use PDO;

use PDOException;

class Producto extends DBConnection{
        private $conexion;
    
        public function __construct() {
            parent::getConnection();
        }
    
        public function getProductosByFamilia($familia_id) {
            // Obtener todos los productos de una familia específica
            $query = "SELECT * FROM productos WHERE familia_id = :familia_id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':familia_id', $familia_id);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        }
    
        public function getProductoByCodigo($codigo) {
            // Obtener un producto por su código
            $query = "SELECT * FROM productos WHERE codigo = :codigo";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            return $producto;
        }
    
        public function getPVPByCodigo($codigo) {
            // Obtener el PVP de un producto por su código
            $query = "SELECT PVP FROM productos WHERE codigo = :codigo";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            $pvp = $stmt->fetchColumn();
            return $pvp;
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
    
    ?>

}