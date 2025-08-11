<?php

require_once __DIR__ . '/basededatos.php';

class mantenimientoModel {
    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    //Mnatenimiento
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

    public function eliminarMantenimiento($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM mantenimientos WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            return false;
        }
    }
}
