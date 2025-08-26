<?php 

require_once __DIR__ . "/../model/perfil.model.php";
require_once __DIR__ . '/../config/sesion.php';


class perfilController {
    private $model; 

    public function __construct() {
        $this->model = new PerfilModel();
    }


    public function mostrarUsuario($id = null){
        // Usa el ID de la sesión si no se pasa por parámetro
        if (!$id) {
            $id = $_SESSION['usuario_id'] ?? null;
        }
        if (!$id) {
            echo "ID de usuario no especificado.";
            return;
        }
        $usuario = $this->model->obtenerIdUser($id); 

        if (!$usuario) {
            echo "Usuario no encontrado";
            return;
        }

        include __DIR__ . '/../view/perfil.view.php';

    }

    public function actualizarFoto() {
        $userId = $_SESSION['usuario_id']; // usuario logueado

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = time() . "_" . basename($_FILES['foto']['name']);
            $rutaDestino = __DIR__ . '/../uploads/' . $nombreArchivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                // actualizar en la base de datos
                $this->model->actualizarFoto($userId, $nombreArchivo);

                // redirigir con mensaje de éxito
                header("Location: index.php?vista=perfil&msg=success");
                exit;
            } else {
                // error al mover archivo
                header("Location: index.php?vista=perfil&msg=error");
                exit;
            }
        } else {
            // no se subió archivo
            header("Location: index.php?vista=perfil&msg=nofile");
            exit;
        }
    }
}



