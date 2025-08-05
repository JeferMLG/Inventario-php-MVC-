<?php

require_once __DIR__ . '/basededatos.php';

class InventarioModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    /**
     * Obtener todos los equipos con su estado
     */
    public function obtenerEquipos() {
        $sql = "
            SELECT e.*, 
                   COALESCE(m.estado_id, NULL) AS estado_id, 
                   COALESCE(es.nombre, 'Sin estado') AS estado_nombre
            FROM equipos e
            LEFT JOIN (
                SELECT equipo_id, estado_id 
                FROM mantenimientos 
                WHERE id IN (SELECT MAX(id) FROM mantenimientos GROUP BY equipo_id)
            ) m ON e.id = m.equipo_id
            LEFT JOIN estados_equipos es ON m.estado_id = es.id
        ";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un equipo por ID
     */
    public function obtenerEquipoPorId($id) {
        $sql = "SELECT * FROM equipos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Eliminar equipo y relaciones
     */
    public function eliminarEquipo($id) {
        try {
            $this->conn->beginTransaction();

            // Eliminar fechas relacionadas
            $stmt = $this->conn->prepare("DELETE FROM fechas_productos WHERE producto_equipo_id = ?");
            $stmt->execute([$id]);

            // Eliminar mantenimientos relacionados
            $stmt = $this->conn->prepare("DELETE FROM mantenimientos WHERE equipo_id = ?");
            $stmt->execute([$id]);

            // Eliminar equipo
            $stmt = $this->conn->prepare("DELETE FROM equipos WHERE id = ?");
            $stmt->execute([$id]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    /**
     * Editar equipo
     */
    public function editarEquipo($id, $nombre, $descripcion, $cantidad, $precio) {
        $sql = "UPDATE equipos 
                SET nombre = ?, descripcion = ?, cantidad = ?, precio = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $cantidad, $precio, $id]);
    }

    public function mostrarMantenimientos() {

        $sql = "SELECT m.id, e.nombre AS dispositivo, 
            m.ultimo_mantenimiento,
            m.proximo_mantenimiento,
            t.nombre AS tipo_mantenimiento
        FROM mantenimientos m
        JOIN equipos e ON m.equipo_id = e.id
        JOIN tipos_mantenimiento t ON m.tipo_mantenimiento_id = t.id";


        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

