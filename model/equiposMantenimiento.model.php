<?php 
require_once __DIR__ . '/basededatos.php';

class equiposMantenimientoModel {

    private $conn; 

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }


    public function obtenerReportes() {
            $sql = "SELECT e.nombre, e.descripcion, e.cantidad, e.precio, 
                (e.cantidad * e.precio) AS precio_total,  
                    p.nombre AS proveedor, c.nombre AS categoria, m.nombre AS marca, 
                    es.nombre AS estado, fp.fecha_compra  
            FROM equipos e
            JOIN proveedores p ON e.proveedor_id = p.id
            JOIN categorias c ON e.categoria_id = c.id
            JOIN marcas m ON e.marca_id = m.id
            LEFT JOIN mantenimientos mt ON e.id = mt.equipo_id  
            LEFT JOIN estados_equipos es ON mt.estado_id = es.id  
            LEFT JOIN fechas_productos fp ON e.id = fp.producto_equipo_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function buscarReportePorNombre($nombre) {
        $sql = "SELECT e.nombre, e.descripcion, e.cantidad, e.precio, 
                    (e.cantidad * e.precio) AS precio_total,  
                    p.nombre AS proveedor, c.nombre AS categoria, m.nombre AS marca, 
                    es.nombre AS estado, fp.fecha_compra  
                FROM equipos e
                JOIN proveedores p ON e.proveedor_id = p.id
                JOIN categorias c ON e.categoria_id = c.id
                JOIN marcas m ON e.marca_id = m.id
                LEFT JOIN mantenimientos mt ON e.id = mt.equipo_id  
                LEFT JOIN estados_equipos es ON mt.estado_id = es.id  
                LEFT JOIN fechas_productos fp ON e.id = fp.producto_equipo_id
                WHERE e.nombre LIKE :nombre";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', "%$nombre%", PDO::PARAM_STR); 
        $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }









}