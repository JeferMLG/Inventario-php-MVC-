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

//Mantenimiento
} elseif ($vista === 'mantenimiento') {
    require_once 'controller/mantenimiento.controller.php';
    $controller = new MantenimientoController();

    if ($accion === 'guardar') {
        $controller->guardarMantenimiento();
    } elseif ($accion === 'actualizar') {
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->guardarMantenimiento();
        } else {
            $controller->mostrarFormulario($id, 'actualizar'); // Muestra el form de actualización
        }
    } elseif ($accion === 'nuevo') {
        $controller->mostrarFormulario(null, 'crear'); // Muestra el form de creación
    } elseif ($accion === 'eliminar') {
        $controller->eliminarMantenimiento();
    } else {
        $controller->mostrarMantenimientos();
    }

    // INFORMACION
} elseif ($vista== 'informacion'){
    require 'view/informacion.view.php';


    // EQUIPOS Y MANTENIMIENTO
}elseif ($vista === 'equipos_mantenimiento') {
    require_once 'controller/equiposMantenimiento.controller.php';
    $equiposMantenimientoController = new equiposMantenimientoController();
    $equiposMantenimientoController->MostrarEquiposMantenimiento();

    
    // PERFIL USUARIO
}elseif ($vista === 'perfil') {
    require_once 'controller/perfiluser.controller.php';
    $perfilController = new perfilController();

    if ($accion === "actualizar_foto") {
        $perfilController->actualizarFoto();

    } elseif ($accion === "actualizar_usuario") {
        // Procesar la actualización del usuario (POST)
        $perfilController->actualizarUsuario();

    } elseif ($accion === "editar_usuario") {
        // Mostrar el formulario de edición con los datos del usuario
        $id = $_SESSION['usuario_id'] ?? null;
        $perfilController->mostrarFormularioEditar($id);

    } else {
        // Mostrar perfil normal
        $id = $_SESSION['usuario_id'] ?? null;
        $perfilController->mostrarUsuario($id);
    }
}elseif ($vista == "prueba") {
   require 'view/prueba.view.php';



// ERROR SI NO EXISTE VISTA
}else {
    echo "Vista no encontrada";
}

?>
