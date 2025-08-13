<?php

require_once __DIR__ . '/basededatos.php';

class mantenimientoModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    //Mantenimiento
    public function mostrarMantenimientos() {
        $sql = "SELECT 
                    m.id, 
                    e.nombre AS dispositivo, 
                    m.ultimo_mantenimiento,
                    m.proximo_mantenimiento,
                    t.nombre AS tipo_mantenimiento,
                    m.descripcion,
                    te.nombre AS tecnico
                FROM mantenimientos m
                JOIN equipos e ON m.equipo_id = e.id
                JOIN tipos_mantenimiento t ON m.tipo_mantenimiento_id = t.id
                JOIN tecnicos te ON m.tecnico_id = te.id";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
// Obtener datos para los selects
    public function obtenerDatosMantenimiento() {
        $datos = [];

        $datos['equipos'] = $this->conn->query("SELECT id, nombre FROM equipos")->fetchAll(PDO::FETCH_ASSOC);
        $datos['tipos_mantenimiento'] = $this->conn->query("SELECT id, nombre FROM tipos_mantenimiento")->fetchAll(PDO::FETCH_ASSOC);
        $datos['tecnicos'] = $this->conn->query("SELECT id, nombre FROM tecnicos")->fetchAll(PDO::FETCH_ASSOC);
        $datos['estados'] = $this->conn->query("SELECT id, nombre FROM estados_equipos")->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

// Crear mantenimiento
    public function crearMantenimiento($data) {
        $sql = "INSERT INTO mantenimientos 
                (equipo_id, tipo_mantenimiento_id, descripcion, tecnico_id, estado_id, ultimo_mantenimiento, proximo_mantenimiento)
                VALUES (:equipo_id, :tipo_mantenimiento_id, :descripcion, :tecnico_id, :estado_id, :ultimo_mantenimiento, :proximo_mantenimiento)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':equipo_id' => $data['equipo_id'],
            ':tipo_mantenimiento_id' => $data['tipo_mantenimiento_id'],
            ':descripcion' => $data['descripcion'],
            ':tecnico_id' => $data['tecnico_id'],
            ':estado_id' => $data['estado_id'],
            ':ultimo_mantenimiento' => $data['ultimo_mantenimiento'],
            ':proximo_mantenimiento' => $data['proximo_mantenimiento']
        ]);
    }

    //Actualizar mantenimiento
    public function actualizarMantenimiento($id, $data) {
    $sql = "UPDATE mantenimientos 
            SET equipo_id = :equipo_id,
                tipo_mantenimiento_id = :tipo_mantenimiento_id,
                descripcion = :descripcion,
                tecnico_id = :tecnico_id,
                estado_id = :estado_id,
                ultimo_mantenimiento = :ultimo_mantenimiento,
                proximo_mantenimiento = :proximo_mantenimiento
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        ':equipo_id' => $data['equipo_id'],
        ':tipo_mantenimiento_id' => $data['tipo_mantenimiento_id'],
        ':descripcion' => $data['descripcion'],
        ':tecnico_id' => $data['tecnico_id'],
        ':estado_id' => $data['estado_id'],
        ':ultimo_mantenimiento' => $data['ultimo_mantenimiento'],
        ':proximo_mantenimiento' => $data['proximo_mantenimiento'],
        ':id' => $id
    ]);
    }

    public function eliminarMantenimiento($id) {
        try {
            $this->conn->beginTransaction();

            // Aquí podrías eliminar registros relacionados si tienes tablas dependientes
            // Ejemplo: eliminar repuestos usados, historial, etc.
            // $stmt = $this->conn->prepare("DELETE FROM repuestos_mantenimiento WHERE mantenimiento_id = ?");
            // $stmt->execute([$id]);

            // Eliminar el mantenimiento
            $stmt = $this->conn->prepare("DELETE FROM mantenimientos WHERE id = ?");
            $stmt->execute([$id]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

        public function obtenerMantenimientos() {
            $sql = "SELECT 
                        m.id,
                        e.nombre AS dispositivo,
                        tm.nombre AS tipo_mantenimiento,
                        m.fecha_mantenimiento,
                        m.descripcion,
                        CONCAT(t.nombre, ' ', t.apellido) AS tecnico,
                        ee.nombre AS estado,
                        m.ultimo_mantenimiento,
                        m.proximo_mantenimiento
                    FROM mantenimientos m
                    INNER JOIN equipos e ON m.equipo_id = e.id
                    INNER JOIN tipos_mantenimiento tm ON m.tipo_mantenimiento_id = tm.id
                    INNER JOIN tecnicos t ON m.tecnico_id = t.id
                    INNER JOIN estados_equipos ee ON m.estado_id = ee.id
                    ORDER BY m.id DESC";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}
