<?php
require_once __DIR__ . '/../basededatos.php';

class RegisterModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function registrarUsuario($data) {
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

        // Insertar en usuarios
        $sql = "INSERT INTO usuarios (email, nombre, apellido, telefono, direccion, fecha_nacimiento, username, password, rol_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssi",
            $data['email'],
            $data['nombre'],
            $data['apellido'],
            $data['telefono'],
            $data['direccion'],
            $data['fecha_nacimiento'],
            $data['username'],
            $hashed_password,
            $rol
        );

        if ($stmt->execute()) {
            return ["success" => true];
        } else {
            return ["error" => "Error al registrar: " . $this->conn->error];
        }
    }
}
?> 