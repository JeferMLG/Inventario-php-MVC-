<?php
class BaseDatos {
    public static function Conectar(){
        try {
            // Cargar la configuración desde configLink.php
            $config = require __DIR__ . '/../config/configLink.php';

            $conexion = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
                $config['username'],
                $config['password']
            );
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }
}
?>
