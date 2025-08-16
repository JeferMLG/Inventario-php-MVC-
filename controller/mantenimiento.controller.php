<?php

require_once __DIR__ . '/../config/sesion.php';
require_once __DIR__ . '/../model/mantenimiento.model.php';

class MantenimientoController {
    private $model;

    public function __construct() {
        $this->model = new mantenimientoModel();
    }

    // Método unificado para crear o actualizar
    public function guardarMantenimiento() {    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

            $data = [
                'equipo_id' => $_POST['equipo_id'],
                'tipo_mantenimiento_id' => $_POST['tipo_mantenimiento_id'],
                'descripcion' => $_POST['descripcion'],
                'tecnico_id' => $_POST['tecnico_id'],
                'estado_id' => $_POST['estado_id'],
                'ultimo_mantenimiento' => $_POST['fecha_mantenimiento'],
                'proximo_mantenimiento' => $_POST['proximo_mantenimiento']
            ];

            if ($id) {
                // Actualizar
                $ok = $this->model->actualizarMantenimiento($id, $data);
                if ($ok) {
                    header("Location: index.php?vista=mantenimiento&mensaje=actualizado");
                    exit;
                } else {
                    // Si falla, recargar la vista de actualización
                    $mantenimiento = $this->model->obtenerMantenimientoPorId($id);
                    require 'view/actualizar_mantenimiento.view.php';
                }
            } else {
                // Crear
                $ok = $this->model->crearMantenimiento($data);
                if ($ok) {
                    header("Location: index.php?vista=mantenimiento&mensaje=creado");
                    exit;
                } else {
                    // Si falla, recargar la vista de creación
                    require 'view/crear_mantenimiento.view.php';
                }
            }
        } else {
            $this->mostrarFormulario();
        }
    }

    // Mostrar formulario (para crear o editar)
    public function mostrarFormulario($id = null, $modo = 'crear') {
        $mantenimiento = null;

        if ($modo === 'actualizar' && $id) {
            $mantenimiento = $this->model->obtenerMantenimientoPorId($id);
            if (!$mantenimiento) {
                echo "Mantenimiento no encontrado";
                return;
            }
        }

        // Obtener datos comunes (equipos, técnicos, etc.)
        $datos = $this->model->obtenerDatosMantenimiento();
        $equipos = $datos['equipos'];
        $tipos_mantenimiento = $datos['tipos_mantenimiento'];
        $tecnicos = $datos['tecnicos'];
        $estados = $datos['estados'];

        // Cargar la vista correspondiente
        if ($modo === 'actualizar') {
            include __DIR__ . '/../view/actualizar_mantenimiento.view.php';
        } else {
            include __DIR__ . '/../view/crear_mantenimiento.view.php';
        }
    }

    public function mostrarMantenimientos() {
        $mantenimientos = $this->model->obtenerMantenimientos();
        require __DIR__ . '/../view/mantenimiento.view.php';
    }

    public function eliminarMantenimiento() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if ($this->model->eliminarMantenimiento($id)) {
                header("Location: index.php?vista=mantenimiento&mensaje=eliminado");
                exit;
            } else {
                echo "Error al eliminar el mantenimiento.";
            }
        }
    }
}
