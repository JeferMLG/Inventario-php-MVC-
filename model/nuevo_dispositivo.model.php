<?php
require_once __DIR__ . '/basededatos.php';

class NuevoDispositivoModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function obtenerProveedores() {
        $sql = "SELECT id, nombre FROM proveedores";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCategorias() {
        $sql = "SELECT id, nombre FROM categorias";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerMarcas() {
        $sql = "SELECT id, nombre FROM marcas";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarDispositivo($data) {
        $precio_total = $data['precio'] * $data['cantidad'];
        $codigo_unico = uniqid('eq_');
        $estado_id = 2; // Libre por defecto

        // Insertar equipo
        $sql = "INSERT INTO equipos (nombre, descripcion, cantidad, proveedor_id, categoria_id, marca_id, precio, precio_total, caracteristicas)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $data['nombre'],
            $data['descripcion'],
            $data['cantidad'],
            $data['proveedor'],
            $data['categoria'],
            $data['marca'],
            $data['precio'],
            $precio_total,
            $data['caracteristicas']
        ]);

        $producto_equipo_id = $this->conn->lastInsertId();

        // Insertar fechas
        $sql_fecha = "INSERT INTO fechas_productos (producto_equipo_id, fecha_compra, fecha_garantia, fecha_vida_util, codigo_unico_del_equipo)
                      VALUES (?, ?, ?, ?, ?)";
        $stmt_fecha = $this->conn->prepare($sql_fecha);
        $stmt_fecha->execute([
            $producto_equipo_id,
            $data['fecha_compra'],
            $data['fecha_garantia'],
            $data['fecha_vida_util'],
            $codigo_unico
        ]);

        // Insertar mantenimiento
        $sql_mantenimiento = "INSERT INTO mantenimientos (equipo_id, estado_id) VALUES (?, ?)";
        $stmt_mantenimiento = $this->conn->prepare($sql_mantenimiento);
        $stmt_mantenimiento->execute([$producto_equipo_id, $estado_id]);

        return true;
    }
}
