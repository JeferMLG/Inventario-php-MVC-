<?php
require_once __DIR__ . '/../config/configLink.php';

class BaseDatos {
    public static function Conectar() {
        try {
            // Construir la conexión usando las constantes
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $conexion = new PDO($dsn, DB_USER, DB_PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }
}