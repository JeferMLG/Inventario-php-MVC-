<?php 
require_once __DIR__ . '/basededatos.php';

class Reportes1Model {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function crearReportes($usuarioId, $equipoId, $titulo, $descripcion ) {
        $sql = "INSERT INTO reportes (usuario_id, equipo_id, titulo, descripcion ) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$usuarioId, $equipoId, $titulo, $descripcion]);

    }

    public function obtenerReportes() {
        $sql = "SELECT r.*, u.nombre AS usuario, e.nombre AS equipo
                FROM reportes r
                JOIN usuarios u ON r.usuario_id = u.id
                LEFT JOIN equipos e ON r.equipo_id = e.id
                ORDER BY r.fecha_reporte DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerReportesPorUsuario($usuarioId) {
        $sql = "SELECT r.*, e.nombre AS equipo
                FROM reportes r
                LEFT JOIN equipos e ON r.equipo_id = e.id
                WHERE r.usuario_id = ?
                ORDER BY r.fecha_reporte DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarEstado($reporteId, $estado) {
        $sql = "UPDATE reportes 
                SET estado = ?, fecha_resuelto = (CASE WHEN ? = 'resuelto' THEN NOW() ELSE NULL END) 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$estado, $estado, $reporteId]);
    }

}
