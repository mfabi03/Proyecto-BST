<?php
namespace App\Controllers;
use App\Models\ProyectoModel;
class ProyectoController {
private $model;
public function __construct() {
$this->model = new ProyectoModel();
}
// Mostrar listado de proyectos
public function index() {
$proyectos = $this->model->getAll();
require_once __DIR__ . '/../Views/proyectos/index.php';
}
// Mostrar formulario para crear
public function crear() {
require_once __DIR__ . '/../Views/proyectos/crear.php';
}
// Guardar el nuevo proyecto (procesa el formulario)
public function guardar() {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$responsable = $_POST['responsable'];
$this->model->create($nombre, $descripcion, $responsable);
header("Location: index.php?action=index");
}
}
// Eliminar proyecto
public function eliminar() {
if (isset($_GET['id'])) {
$this->model->delete($_GET['id']);
header("Location: index.php?action=index");
}
}
}?>