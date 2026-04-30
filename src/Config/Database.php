<?php
namespace App\Config; // Cambiado de src\Config a App\Config

use PDO;
use PDOException;

class Database {
    private string $host = "localhost";
    private string $dbname = "proyecto";
    private string $user = "root";
    private string $pass = "";
    public ?PDO $conn = null;

    public function getConnection(): ?PDO {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>

