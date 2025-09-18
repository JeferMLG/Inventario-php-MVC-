<?php 

require_once __DIR__ . "/../model/perfiluser.model.php";
require_once __DIR__ . '/../config/sesion.php';


class perfilController {
    private $model; 

    public function __construct() {
        $this->model = new perfilModel();
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

        include __DIR__ . '/../view/perfiluser.view.php';

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

    public function actualizarUsuario() {
        $userId = $_SESSION['usuario_id']; // usuario logueado

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
            $telefono = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';

            // Validaciones básicas
            if (empty($nombre) || empty($email)) {
                header("Location: index.php?vista=perfil&msg=error");
                exit;
            }

            // Actualizar en la base de datos
            $this->model->actualizarUsuario($userId, $nombre, $email, $fecha_nacimiento, $telefono, $direccion);

            // Redirigir con mensaje de éxito
            header("Location: index.php?vista=perfil&msg=success");
            exit;
        } else {
            // Si no es POST, redirigir al perfil
            header("Location: index.php?vista=perfil");
            exit;
        }
    }

    public function mostrarFormularioEditar($userId) {
        $usuario = $this->model->obtenerIdUser($userId);
        if ($usuario) {
            require_once __DIR__ . '/../view/editar_perfiluser.view.php';
        } else {
            echo "Usuario no encontrado";
        }
    }
}



