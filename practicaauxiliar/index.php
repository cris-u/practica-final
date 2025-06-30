<?php
require_once 'controllers/asistencia.controller.php';

// Creamos una instancia del controlador
$controller = new AsistenciaController();

// Determinamos la acción a realizar
// Si no se especifica una acción, se llamará al método 'index' por defecto
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

// Llamamos al método correspondiente del controlador
call_user_func([$controller, $action]);
?>