<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class ProyectoModel {
    // Definimos el tipo de la conexión
    private ?PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Asegúrate de que estos nombres coincidan EXACTAMENTE con los del controlador
    public function create($nombre, $descripcion, $responsable) {
        $query = "INSERT INTO proyectos (nombre, descripcion, responsable) VALUES (:n, :d, :r)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['n' => $nombre, 'd' => $descripcion, 'r' => $responsable]);
    }

    public function delete($id) {
        $query = "DELETE FROM proyectos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
    
    public function getAll() {
        $query = "SELECT * FROM proyectos ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>