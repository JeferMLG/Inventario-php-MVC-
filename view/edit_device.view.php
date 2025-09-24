<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dispositivo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/Css/edit_deviceBoo.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="max-width: 700px; width: 100%;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Editar Equipo</h2>

                <form method="POST" action="index.php?vista=equipos&accion=actualizar">
                    <input type="hidden" name="edit_id" value="<?php echo $equipo['id']; ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" 
                            class="form-control" 
                            value="<?php echo htmlspecialchars($equipo['nombre']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" 
                            class="form-control" rows="3" required><?php echo htmlspecialchars($equipo['descripcion']); ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" 
                                class="form-control" 
                                value="<?php echo htmlspecialchars($equipo['cantidad']); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" step="0.01" id="precio" name="precio" 
                                class="form-control" 
                                value="<?php echo htmlspecialchars($equipo['precio']); ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            Guardar Cambios
                        </button>
                        <a href="index.php?vista=equipos" class="btn btn-outline-secondary">
                            Regresar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
