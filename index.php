<?php 

require_once 'controller/AuthController.php';

$vista = $_GET['vista'] ?? 'login';
$accion = $_GET['accion'] ?? null;

$auth = new AuthController();

if ($vista === 'login' && $accion === 'validar') {
    $auth->login();
} elseif ($vista === 'login') {
    $auth->mostrarLogin();
} elseif ($vista === 'prueba') {
    include 'view/prueba.view.php';
} else {
    echo "Vista no encontrada";
}

?>