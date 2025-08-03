<?php
require_once __DIR__ . '/../model/nuevo_dispositivo.model.php';

class NuevoDispositivoController {
    private $model;

    public function __construct() {
        $this->model = new NuevoDispositivoModel();
    }

    // Mostrar formulario
    public function mostrarFormulario() {
        $proveedores = $this->model->obtenerProveedores();
        $categorias = $this->model->obtenerCategorias();
        $marcas = $this->model->obtenerMarcas();

        include __DIR__ . '/../view/nuevo_dispositivo.view.php';
    }

    // Procesar formulario
    public function procesarFormulario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'cantidad' => $_POST['cantidad'],
                'proveedor' => $_POST['proveedor'],
                'categoria' => $_POST['categoria'],
                'marca' => $_POST['marca'],
                'precio' => $_POST['precio'],
                'caracteristicas' => $_POST['caracteristicas'],
                'fecha_compra' => $_POST['fecha_compra'],
                'fecha_garantia' => $_POST['fecha_garantia'],
                'fecha_vida_util' => $_POST['fecha_vida_util'],
            ];

            $this->model->insertarDispositivo($data);

            header("Location: index.php?vista=inventario");
            exit;
        }
    }
}
