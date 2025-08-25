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






}




