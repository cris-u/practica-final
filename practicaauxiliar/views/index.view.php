<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Asistencia</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>

<div class="container">
    <header class="header">
        <h1>Control de Asistencia</h1>
        <a href="?a=form" class="btn btn-primary">+ Registrar Asistencia</a>
    </header>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($asistencias as $asistencia): ?>
                <tr>
                    <td><?php echo $asistencia->id; ?></td>
                    <td><?php echo $asistencia->estudiante; ?></td>
                    <td><?php echo $asistencia->hora ? date('H:i', strtotime($asistencia->hora)) : '-'; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($asistencia->fecha)); ?></td>
                    <td>
                        <?php 
                            $estado = strtolower($asistencia->estado);
                            echo "<span class='badge badge-{$estado}'>{$asistencia->estado}</span>";
                        ?>
                    </td>
                    <td><?php echo $asistencia->observaciones; ?></td>
                    <td class="actions">
                        <a href="?a=form&id=<?php echo $asistencia->id; ?>" class="btn btn-edit">✎</a>
                        <a href="?a=eliminar&id=<?php echo $asistencia->id; ?>" 
                           class="btn btn-delete" 
                           onclick="return confirm('¿Está seguro de eliminar este registro?');">🗑</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer class="footer">
        <div>Mostrando <?php echo count($asistencias); ?> registros de asistencia</div>
        <div>Fecha: <?php echo date("d-m-Y"); ?></div>
    </footer>
</div>

</body>
</html>