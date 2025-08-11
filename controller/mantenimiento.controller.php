<?php

require_once __DIR__  . '/../config/sesion.php';
require_once __DIR__ . '/../model/mantenimiento.model.php';

class mantenimientoController {
    private $model;
    public function __construct() {
        $this->model = new MantenimientoModel();
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

        public function actualizarMostrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $data = [
                'equipo_id' => $_POST['equipo_id'],
                'tipo_mantenimiento_id' => $_POST['tipo_mantenimiento_id'],
                'descripcion' => $_POST['descripcion'],
                'tecnico_id' => $_POST['tecnico_id'],
                'estado_id' => $_POST['estado_id'],
                'ultimo_mantenimiento' => $_POST['ultimo_mantenimiento'],
                'proximo_mantenimiento' => $_POST['proximo_mantenimiento']
            ];

            if ($this->model->actualizarMantenimiento($id, $data)) {
                header("Location: index.php?vista=mantenimientos&mensaje=actualizado");
                exit;
            } else {
                echo "Error al actualizar el mantenimiento.";
            }
        }
    }



}
    