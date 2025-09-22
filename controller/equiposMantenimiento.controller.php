<?php

require_once __DIR__ . '/../config/sesion.php';
require_once __DIR__ . '/../model/equiposMantenimiento.model.php';

class equiposMantenimientoController {
    private $model;

    public function __construct() {
        $this->model = new equiposMantenimientoModel();
    }

    public function MostrarEquiposMantenimiento() {
        // Si hay búsqueda, filtrar
        if (isset($_GET['busqueda']) && !empty(trim($_GET['busqueda']))) {
            $nombre = trim($_GET['busqueda']);
            $reportes = $this->model->buscarReportePorNombre($nombre);
        } else {
            $reportes = $this->model->obtenerReportes();
        }

        require __DIR__ . '/../view/equiposMantenimiento.view.php';
    }



}