<?php 
require_once __DIR__ . '/basededatos.php';

class HomeModel {

    private $conn;

    public function __construct() {
        $this->conn = BaseDatos::Conectar();
    }

    public function getAll() {
        $usuarios = $this->conn->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
        $equipos = $this->conn->query("SELECT COUNT(*) FROM equipos")->fetchColumn();
        $proveedores = $this->conn->query("SELECT COUNT(*) FROM proveedores")->fetchColumn();

        return [
            'totalUsuarios' => $usuarios,
            'totalEquipos' => $equipos,
            'totalProveedores' => $proveedores
        ];
    }
}
?>
