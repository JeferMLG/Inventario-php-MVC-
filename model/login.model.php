<?php
require_once __DIR__ . '/../basededatos.php';

class LoginModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function verificarCredenciales($username, $password) {
        $sql = "SELECT login.password, usuarios.id, usuarios.nombre 
                FROM login 
                JOIN usuarios ON login.usuario_id = usuarios.id 
                WHERE login.username = ?";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error en la consulta: " . $this->conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                return [
                    'id' => $user['id'],
                    'nombre' => $user['nombre'],
                    'username' => $username
                ];
            }
        }

        return false;
    }
}
