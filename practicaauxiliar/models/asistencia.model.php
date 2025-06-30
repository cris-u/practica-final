<?php
require_once 'conexion.php';

class AsistenciaModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::Conectar();
    }

    // Método para listar todos los registros
    public function listar() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM asistencias ORDER BY fecha DESC, estudiante ASC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para obtener un registro por su ID
    public function obtener($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM asistencias WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para eliminar un registro
    public function eliminar($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM asistencias WHERE id = ?");
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para actualizar un registro
    public function actualizar($data) {
        try {
            $sql = "UPDATE asistencias SET 
                        estudiante = ?, 
                        hora = ?, 
                        fecha = ?, 
                        estado = ?, 
                        observaciones = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute([
                    $data['estudiante'],
                    empty($data['hora']) ? null : $data['hora'],
                    $data['fecha'],
                    $data['estado'],
                    $data['observaciones'],
                    $data['id']
                 ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para crear un nuevo registro
    public function registrar($data) {
        try {
            $sql = "INSERT INTO asistencias (estudiante, hora, fecha, estado, observaciones) 
                    VALUES (?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                 ->execute([
                    $data['estudiante'],
                    empty($data['hora']) ? null : $data['hora'],
                    $data['fecha'],
                    $data['estado'],
                    $data['observaciones']
                 ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>