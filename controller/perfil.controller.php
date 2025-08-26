<?php 

require_once __DIR__ . "/../model/perfil.model.php";
require_once __DIR__ . '/../config/sesion.php';


class perfilController {
    private $model; 

    public function __construct() {
        $this->model = new PerfilModel();
    }


    public function mostrarUsuario($id){
        $usuario = $this->model->obtenerUsuario($id);

        if (!$usuario) {
            echo "Usuario no encontrado";
        }

        include __DIR__ . '/../view/perfil.view.php';

    }



    public function actualizarFoto() {
        $userId = $_SESSION['user_id']; // usuario logueado

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = time() . "_" . basename($_FILES['foto']['name']);
            $rutaDestino = __DIR__ . '/../uploads/' . $nombreArchivo; // guardar físicamente

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                $this->model->actualizarFoto($userId, $nombreArchivo);
                echo "Foto actualizada correctamente.";
            } else {
                echo "Error al subir la foto.";
            }
        }
    }
}




