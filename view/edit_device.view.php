<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dispositivo</title>
    <link rel="stylesheet" href="view/css/edit_device.css">
</head>
<body>
    <div class="edit-device-container">
        <h2>Editar Dispositivo</h2>
        <form method="POST" action="index.php?vista=inventario&accion=actualizar">
            <input type="hidden" name="edit_id" value="<?php echo $equipo['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($equipo['nombre']); ?>" required><br><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($equipo['descripcion']); ?></textarea><br><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($equipo['cantidad']); ?>" required><br><br>

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" value="<?php echo htmlspecialchars($equipo['precio']); ?>" required><br><br>

            <input type="submit" value="Guardar Cambios">
            <button type="button" onclick="location.href='index.php?vista=inventario'">Regresar</button>
        </form>
    </div>
</body>
</html>
