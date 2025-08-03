<?php 

// Controladores principales
require_once 'controller/login.controller.php';
require_once 'controller/register.controller.php';

$vista = $_GET['vista'] ?? 'login';
$accion = $_GET['accion'] ?? null;

$auth = new AuthController();

// LOGIN
if ($vista === 'login' && $accion === 'validar') {
    $auth->login();

} elseif ($vista === 'login') {
    $auth->mostrarLogin();

// LOGOUT
} elseif ($vista === 'logout') {
    require_once 'controller/logout.controller.php';
    $logout = new LogoutController();
    $logout->cerrarSesion();

// REGISTRO
} elseif ($vista === 'register' && $accion === 'registrar') {
    $registerController = new RegisterController();
    $registerController->procesarRegistro();

} elseif ($vista === 'register') {
    $registerController = new RegisterController();
    $registerController->mostrarFormulario();

// HOME
} elseif ($vista === 'home') {
    require_once 'controller/home.controller.php';
    $controller = new HomeController();
    $controller->mostrarHome();

// INVENTARIO
} elseif ($vista === 'inventario') {
    require_once 'controller/inventario.controller.php';
    $inventarioController = new inventarioController();

    if ($accion === 'editar' && isset($_GET['id'])) {
        $inventarioController->mostrarEditarEquipo($_GET['id']);  // Muestra formulario edición
    } elseif ($accion === 'actualizar') {
        $inventarioController->actualizarEquipo();                 // Procesa actualización
    } elseif ($accion === 'eliminar' && isset($_GET['id'])) {
        $inventarioController->eliminarEquipo($_GET['id']);        // Elimina equipo
    } else {
        $inventarioController->mostrarInventario();                // Muestra lista inventario
    }

// NUEVO DISPOSITIVO
} elseif ($vista === 'nuevo_dispositivo') {
    require_once 'controller/nuevo_dispositivo.controller.php';
    $controller = new NuevoDispositivoController();

    if ($accion === 'guardar') {
        $controller->procesarFormulario();  // Procesa el POST y guarda
    } else {
        $controller->mostrarFormulario();   // Muestra el formulario
    }

// ERROR SI NO EXISTE VISTA
} else {
    echo "Vista no encontrada";
}

?>
