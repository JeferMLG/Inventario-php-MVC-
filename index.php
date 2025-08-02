<?php 

require_once 'controller/login.controller.php';
require_once 'controller/register.controller.php'; 

$vista = $_GET['vista'] ?? 'login';
$accion = $_GET['accion'] ?? null;

$auth = new AuthController();

if ($vista === 'login' && $accion === 'validar') {
    $auth->login();
} elseif ($vista === 'login') {
    $auth->mostrarLogin();
} elseif ($vista === 'logout') {
    require_once 'controller/logout.controller.php';
    $logout = new LogoutController();
    $logout->cerrarSesion();
} elseif ($vista === 'register' && $accion === 'registrar') {
    $registerController = new RegisterController();
    $registerController->procesarRegistro();
} elseif ($vista === 'register') {
    $registerController = new RegisterController();
    $registerController->mostrarFormulario();
} elseif ($vista === 'home') {
    require_once 'controller/home.controller.php';
    $controller = new HomeController();
    $controller->mostrarHome();
}

?>
