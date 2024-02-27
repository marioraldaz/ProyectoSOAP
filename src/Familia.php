<?php

namespace Daw2\ProyectoSoap;

use Daw2\ProyectoSoap\DBConnection;

use PDO;

use PDOException;

class Familia extends DBConnection{
    private $conexion;

    public function __construct() {
        parent::getConnection();
    }

    public function getAllFamilias() {
        // Obtener todas las familias de la base de datos
        $query = "SELECT * FROM familias";
        $stmt = $this->conexion->query($query);
        $familias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $familias;
    }

    public function getFamiliaById($id) {
        // Obtener una familia por su ID
        $query = "SELECT * FROM familias WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $familia = $stmt->fetch(PDO::FETCH_ASSOC);
        return $familia;
    }

    public function addFamilia($nombre) {
        // Agregar una nueva familia a la base de datos
        $query = "INSERT INTO familias (nombre) VALUES (:nombre)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        return $this->conexion->lastInsertId();
    }

    public function updateFamilia($id, $nombre) {
        // Actualizar el nombre de una familia
        $query = "UPDATE familias SET nombre = :nombre WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteFamilia($id) {
        // Eliminar una familia de la base de datos
        $query = "DELETE FROM familias WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}