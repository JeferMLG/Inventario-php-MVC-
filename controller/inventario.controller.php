<?php

require_once __DIR__ . '/../config/sesion.php';
require_once __DIR__ . '/../model/inventario.model.php';

class InventarioController {
    private $model;

    public function __construct() {
        $this->model = new InventarioModel();
    }

    /**
     * Mostrar lista de equipos
     */
    public function mostrarInventario() {
        $equipos = $this->model->obtenerEquipos();

        // Calcular precio total
        $totalPrecio = 0;
        foreach ($equipos as $equipo) {
            $totalPrecio += $equipo['precio'] * $equipo['cantidad'];
        }

        include __DIR__ . '/../view/inventario.view.php';
    }

    /**
     * Mostrar formulario de edición
     */
    public function mostrarEditarEquipo($id) {
        $equipo = $this->model->obtenerEquipoPorId($id);

        if (!$equipo) {
            echo "Equipo no encontrado.";
            return;
        }

        include __DIR__ . '/../view/edit_device.view.php';
    }

    /**
     * Actualizar datos del equipo
     */
    public function actualizarEquipo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['edit_id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];

            $resultado = $this->model->editarEquipo($id, $nombre, $descripcion, $cantidad, $precio);

            if ($resultado) {
                header("Location: index.php?vista=inventario");
            } else {
                echo "Error al actualizar el equipo.";
            }
        }
    }

    /**
     * Eliminar equipo
     */
    public function eliminarEquipo($id) {
        $resultado = $this->model->eliminarEquipo($id);

        if ($resultado) {
            header("Location: index.php?vista=inventario");
        } else {
            echo "Error al eliminar el equipo.";
        }
    }
}
