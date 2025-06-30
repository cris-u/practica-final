<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $asistencia->id ? 'Editar' : 'Registrar'; ?> Asistencia</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>

<div class="container">
    <header class="header">
        <h1><?php echo $asistencia->id ? 'Editar' : 'Registrar'; ?> Asistencia</h1>
        <a href="index.php" class="btn btn-primary">Volver al Listado</a>
    </header>

    <div class="form-container">
        <form action="?a=crud" method="post">
            <!-- Campo oculto para el ID -->
            <input type="hidden" name="id" value="<?php echo $asistencia->id; ?>">

            <div class="form-group">
                <label for="estudiante">Nombre del Estudiante</label>
                <input type="text" name="estudiante" id="estudiante" class="form-control" 
                       value="<?php echo $asistencia->estudiante; ?>" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" 
                       value="<?php echo $asistencia->fecha; ?>" required>
            </div>

            <div class="form-group">
                <label for="hora">Hora de llegada (opcional)</label>
                <input type="time" name="hora" id="hora" class="form-control"
                       value="<?php echo $asistencia->hora; ?>">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="PRESENTE" <?php echo $asistencia->estado == 'PRESENTE' ? 'selected' : ''; ?>>PRESENTE</option>
                    <option value="AUSENTE" <?php echo $asistencia->estado == 'AUSENTE' ? 'selected' : ''; ?>>AUSENTE</option>
                    <option value="TARDE" <?php echo $asistencia->estado == 'TARDE' ? 'selected' : ''; ?>>TARDE</option>
                    <option value="JUSTIFICADO" <?php echo $asistencia->estado == 'JUSTIFICADO' ? 'selected' : ''; ?>>JUSTIFICADO</option>
                </select>
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control"><?php echo $asistencia->observaciones; ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <?php echo $asistencia->id ? 'Actualizar' : 'Registrar'; ?>
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>