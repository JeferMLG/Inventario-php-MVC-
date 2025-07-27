<?php
require_once __DIR__ . '/../model/register.model.php';

class RegisterController {
    public function mostrarFormulario() {
        include __DIR__ . '/../view/register.view.php';
    }

    public function procesarRegistro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new RegisterModel();
            $resultado = $model->registrarUsuario($_POST);

            if (isset($resultado['success'])) {
                header("Location: index.php?vista=login");
                exit;
            } else {
                echo "Error: " . $resultado['error'];
            }
        }
    }
}