<?php
require_once __DIR__ . '/../model/home.model.php';

class HomeController {
    public function mostrarHome() {
        $model = new HomeModel(); 
        $totales = $model->getAll();

        // Variables individuales
        $totalUsuarios = $totales['totalUsuarios'];
        $totalEquipos = $totales['totalEquipos'];
        $totalProveedores = $totales['totalProveedores'];
        // Datos para la gráfica
        $graficaData = [
            'usuarios' => $totalUsuarios,
            'equipos' => $totalEquipos,
            'proveedores' => $totalProveedores
        ];

        include __DIR__ . '/../view/home.view.php'; 
    }
}