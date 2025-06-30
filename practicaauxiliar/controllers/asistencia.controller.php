<?php
require_once 'models/asistencia.model.php';

class AsistenciaController {
    private $model;

    public function __construct() {
        $this->model = new AsistenciaModel();
    }

    // Acción principal: Muestra la lista de asistencias
    public function index() {
        $asistencias = $this->model->listar();
        require_once 'views/index.view.php';
    }


    // Muestra el formulario para crear o editar
    public function form() {
        $asistencia = new stdClass(); // Objeto vacío para el formulario de registro
        $asistencia->id = null;
        $asistencia->estudiante = '';
        $asistencia->fecha = date('Y-m-d');
        $asistencia->hora = '';
        $asistencia->estado = 'PRESENTE';
        $asistencia->observaciones = '';

        if(isset($_REQUEST['id'])){
            $asistencia = $this->model->obtener($_REQUEST['id']);
        }
        
        require_once 'views/form.view.php';
    }

    // Guarda los datos del formulario (ya sea para crear o actualizar)
    public function crud() {
        $data = [
            'id'            => $_REQUEST['id'],
            'estudiante'    => $_REQUEST['estudiante'],
            'fecha'         => $_REQUEST['fecha'],
            'hora'          => $_REQUEST['hora'],
            'estado'        => $_REQUEST['estado'],
            'observaciones' => $_REQUEST['observaciones'],
        ];

        // Si hay un ID, actualiza. Si no, registra.
        if (!empty($data['id'])) {
            $this->model->actualizar($data);
        } else {
            $this->model->registrar($data);
        }
        
        header('Location: index.php');
    }

    // Elimina un registro
    public function eliminar() {
        if(isset($_REQUEST['id'])){
            $this->model->eliminar($_REQUEST['id']);
            header('Location: index.php');
        }
    }
}
?>