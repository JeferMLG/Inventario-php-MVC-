<?php

require_once __DIR__  . '/../config/sesion.php';
require_once __DIR__ . '/../model/equipos.model.php';

class EquiposController {

    private $model;

    public function __construct() {
        $this->model = new EquiposModel();
    }

    /**
     * Mostrar la vista principal del inventario
     */
    public function mostrarEquipos() {
        $equipos = $this->model->obtenerEquipos();

        // Calcular el precio total
        $totalPrecio = 0;
        foreach ($equipos as $equipo) {
            $totalPrecio += $equipo['precio'] * $equipo['cantidad'];
        }

        include __DIR__ . '/../view/equipos.view.php';
    }


    /**
     * Eliminar un equipo
     */
    public function eliminarEquipo($id) {
        $resultado = $this->model->eliminarEquipo($id);
        if ($resultado) {
            header("Location: index.php?vista=equipos");
        } else {
            echo "Error al eliminar el equipo.";
        }
    }

    /**
     * Mostrar formulario de edición
     */
    public function mostrarEditarEquipo($id) {
        $equipo = $this->model->obtenerEquipoPorId($id);
        if (!$equipo) {
            echo "Equipo no encontrado";
            return;
        }

        // Aquí podrías traer también los estados si los usas en el <select>
        include __DIR__ . '/../view/edit_device.view.php';
    }

    /**
     * Guardar cambios de edición
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
                header("Location: index.php?vista=equipos");
            } else {
                echo "Error al actualizar el equipo.";
            }
        }
    }

}
