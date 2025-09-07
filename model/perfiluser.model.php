<?php 
require_once __DIR__ . "/basededatos.php";

class perfilModel {
    
    private $conn; 

        public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }


    public function obtenerIdUser($userId) {
        $sql ="SELECT u.*, r.nombre AS rol_nombre 
            FROM usuarios u 
            JOIN roles r ON u.rol_id = r.id 
            WHERE u.id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function actualizarFoto($userId, $fotoNombre){
        $sql = "UPDATE usuarios SET foto_perfil = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$fotoNombre, $userId]);
        
    }

    public function actualizarUsuario($userId, $nombre, $email,$fecha_nacimiento,$telefono,$direccion) {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, fecha_nacimiento = ?, telefono = ?, direccion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $email, $fecha_nacimiento, $telefono, $direccion, $userId]);
    }

    

}  








 

