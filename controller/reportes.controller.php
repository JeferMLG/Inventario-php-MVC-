<?php

require_once __DIR__ . '/../config/sesion.php';
require_once __DIR__ . '/../model/reportes.model.php';

class reportesController {
    private $model;

    public function __construct() {
        $this->model = new reportesModel();
    }

    public function mostrarReportes() {
        // Si hay búsqueda, filtrar
        if (isset($_GET['busqueda']) && !empty(trim($_GET['busqueda']))) {
            $nombre = trim($_GET['busqueda']);
            $reportes = $this->model->buscarReportePorNombre($nombre);
        } else {
            $reportes = $this->model->obtenerReportes();
        }

        require __DIR__ . '/../view/reportes.view.php';
    }



}