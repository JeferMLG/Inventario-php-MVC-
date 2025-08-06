<?php

require_once __DIR__  . '/../config/sesion.php';
require_once __DIR__ . '/../model/inventario.model.php';

class inventarioController {

    private $model;

    public function __construct() {
        $this->model = new inventarioModel();
    }

    /**
     * Mostrar la vista principal del inventario
     */
    public function mostrarInventario() {
        $equipos = $this->model->obtenerEquipos();

        // Calcular el precio total
        $totalPrecio = 0;
        foreach ($equipos as $equipo) {
            $totalPrecio += $equipo['precio'] * $equipo['cantidad'];
        }

        include __DIR__ . '/../view/inventario.view.php';
    }


    /**
     * Eliminar un equipo
     */
    public function eliminarEquipo($id) {
        $resultado = $this->model->eliminarEquipo($id);
        if ($resultado) {
            header("Location: index.php?vista=inventario");
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
                header("Location: index.php?vista=inventario");
            } else {
                echo "Error al actualizar el equipo.";
            }
        }
    }
    public function crearMantenimiento() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'equipo_id' => $_POST['equipo_id'],
                'tipo_mantenimiento_id' => $_POST['tipo_mantenimiento_id'],
                'descripcion' => $_POST['descripcion'],
                'tecnico_id' => $_POST['tecnico_id'],
                'estado_id' => $_POST['estado_id'],
                'ultimo_mantenimiento' => $_POST['fecha_mantenimiento'],
                'proximo_mantenimiento' => $_POST['proximo_mantenimiento']
            ];

            if ($this->model->crearMantenimiento($data)) {
                header("Location: index.php?vista=mantenimiento");
                exit();
            } else {
                echo "Error al crear mantenimiento";
            }
        } else {
            // Cargar datos para selects
            $datos = $this->model->obtenerDatosMantenimiento();
            $equipos = $datos['equipos'];
            $tipos_mantenimiento = $datos['tipos_mantenimiento'];
            $tecnicos = $datos['tecnicos'];
            $estados = $datos['estados'];

            include __DIR__ . '/../view/crear_mantenimiento.view.php';
        }
    }
    public function mostrarMantenimientos() {
        $mantenimientos = $this->model->mostrarMantenimientos();
        include __DIR__ . '/../view/mantenimiento.view.php';
    }    
}
