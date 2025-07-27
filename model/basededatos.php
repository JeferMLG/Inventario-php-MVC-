<?php
class BaseDatos {
    public static function Conectar(){
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=empresa_inventario", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }
}
?>
