<?php
require_once __DIR__ . '/basededatos.php';

class LoginModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function verificarCredenciales($username, $password) {
        try {
            // Consultar credenciales en tabla login
            $sql = "SELECT login.password, usuarios.*
                    FROM login
                    INNER JOIN usuarios ON login.usuario_id = usuarios.id
                    WHERE login.username = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$username]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si existe el usuario y la contraseña es correcta
            if ($usuario && password_verify($password, $usuario['password'])) {
                return $usuario; // Retorna datos del usuario
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }
}
?>

