<?php
namespace App\Controllers;

use App\Models\ProyectoModel;

class ProyectoController {
    // Definimos el tipo de propiedad para que el IDE reconozca los métodos del modelo
    private ProyectoModel $model;

    public function __construct() {
        $this->model = new ProyectoModel();
    }

    // Listado principal
    public function index(): void {
        $proyectos = $this->model->getAll();
        // Nota: Asegúrate de que la carpeta se llame 'Views' (con e) y no 'Viwes'
        require_once __DIR__ . '/../Views/proyectos/index.php';
    }

    // ESTE ES EL MÉTODO QUE FALTABA PARA TU INDEX.PHP
    public function crear(): void {
        require_once __DIR__ . '/../Views/proyectos/crear.php';
    }

    public function guardar(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $responsable = $_POST['responsable'] ?? '';
            
            $this->model->create($nombre, $descripcion, $responsable);
            header("Location: index.php?action=index");
            exit; // Buena práctica añadir exit después de un redireccionamiento
        }
    }

    public function eliminar(): void {
        if (isset($_GET['id'])) {
            $this->model->delete((int)$_GET['id']);
            header("Location: index.php?action=index");
            exit;
        }
    }
}
?>