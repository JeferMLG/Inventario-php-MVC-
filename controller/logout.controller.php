<?php 

class LogoutController { // <-- Corrige aquí la mayúscula
    public function cerrarSesion() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?vista=login");
        exit();
    }
}