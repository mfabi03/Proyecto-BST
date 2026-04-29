<?php
namespace App\Config;
use PDO;
use PDOException;
class Database {
 private $host = "localhost";
 private $dbname = "uptaeb_proyectos";
 private $user = "root";
 private $pass = "";
 public $conn;
 public function getConnection() {
 $this->conn = null;
 try {
 $this->conn = new PDO("mysql:host=" . $this->host . ";dbnasme=" .
$this->dbname, $this->user, $this->pass);
 $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $e) {
 echo "Error de conexión: " . $e->getMessage();
 }
 return $this->conn;
 }
}