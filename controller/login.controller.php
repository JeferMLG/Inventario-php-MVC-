<?php
require_once __DIR__ . '/../model/login.model.php';

class AuthController {
    public function mostrarLogin() {
        include __DIR__ . '/../view/login.view.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $loginModel = new LoginModel();
            $result = $loginModel->verificarCredenciales($username, $password);

            if ($result) {
                session_start();
                $_SESSION['usuario'] = $result['nombre'];
                header("Location: index.php?vista=prueba"); // Redirigir a dashboard
                exit();
            } else {
                echo "Credenciales incorrectas. <a href='index.php?vista=login'>Intentar de nuevo</a>";
            }
        } else {
            header("Location: index.php?vista=login");
        }
    }
}
