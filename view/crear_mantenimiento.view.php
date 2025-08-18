<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mantenimiento</title>
    <link rel="stylesheet" href="../view/Css/crear_mantenimiento.css">
</head>
<body>
    <form method="POST" action="index.php?vista=mantenimiento&accion=guardar">
        <h1>Crear Mantenimiento</h1>

        <label for="equipo_id">Equipo:</label>
        <select name="equipo_id" id="equipo_id" required>
            <option value="">Seleccione un equipo</option>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo['id']) ?>">
                    <?= htmlspecialchars($equipo['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="tipo_mantenimiento_id">Tipo de Mantenimiento:</label>
        <select name="tipo_mantenimiento_id" id="tipo_mantenimiento_id" required>
            <option value="">Seleccione un tipo de mantenimiento</option>
            <?php foreach ($tipos_mantenimiento as $tipo): ?>
                <option value="<?= htmlspecialchars($tipo['id']) ?>">
                    <?= htmlspecialchars($tipo['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="fecha_mantenimiento">Fecha de Mantenimiento:</label>
        <input type="date" name="fecha_mantenimiento" id="fecha_mantenimiento" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <label for="tecnico_id">Técnico:</label>
        <select name="tecnico_id" id="tecnico_id" required>
            <option value="">Seleccione un técnico</option>
            <?php foreach ($tecnicos as $tecnico): ?>
                <option value="<?= htmlspecialchars($tecnico['id']) ?>">
                    <?= htmlspecialchars($tecnico['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="estado_id">Estado:</label>
        <select name="estado_id" id="estado_id" required>
            <option value="">Seleccione un estado</option>
            <?php foreach ($estados as $estado): ?>
                <option value="<?= htmlspecialchars($estado['id']) ?>">
                    <?= htmlspecialchars($estado['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="proximo_mantenimiento">Próximo Mantenimiento:</label>
        <input type="date" name="proximo_mantenimiento" id="proximo_mantenimiento" required>

        <div class="button-container">
            <button type="submit">Crear Mantenimiento</button>
            <button type="button" onclick="location.href='index.php?vista=mantenimiento'">Volver</button>
        </div>
    </form>
</body>
</html>