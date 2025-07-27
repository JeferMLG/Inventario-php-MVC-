<?php
require_once __DIR__ . '/basededatos.php';

class RegisterModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function registrarUsuario($data) {
        try {
            // Validar contraseñas
            if ($data['password'] !== $data['confirm_password']) {
                return ["error" => "Las contraseñas no coinciden"];
            }

            // Determinar rol
            $rol = match ($data['rol'] ?? null) {
                109 => 1,
                619 => 2,
                226 => 3,
                610 => 4,
                default => 5
            };

            // Hashear contraseña
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            // Iniciar transacción
            $this->conn->beginTransaction();

            // 1. Insertar en usuarios
            $sqlUsuarios = "INSERT INTO usuarios (email, nombre, apellido, telefono, direccion, fecha_nacimiento, rol_id)
                            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtUsuarios = $this->conn->prepare($sqlUsuarios);
            $stmtUsuarios->execute([
                $data['email'],
                $data['nombre'],
                $data['apellido'],
                $data['telefono'],
                $data['direccion'],
                $data['fecha_nacimiento'],
                $rol
            ]);

            // Obtener ID insertado
            $usuario_id = $this->conn->lastInsertId();

            // 2. Insertar en login
            $sqlLogin = "INSERT INTO login (usuario_id, username, password)
                         VALUES (?, ?, ?)";
            $stmtLogin = $this->conn->prepare($sqlLogin);
            $stmtLogin->execute([
                $usuario_id,
                $data['username'],
                $hashed_password
            ]);

            // Confirmar transacción
            $this->conn->commit();

            return ["success" => true];

        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ["error" => "Error de BD: " . $e->getMessage()];
        }
    }
}
?>
