<?php
require_once __DIR__ . '/../model/home.model.php';
require_once __DIR__  . '/../config/sesion.php';
class HomeController {
    public function mostrarHome() {
        $model = new HomeModel(); 
        $totales = $model->getAll();



        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?vista=login");
            exit();
        }

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