<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Mantenimiento</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../view/Css/crear_mantenimientoBoo.css">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4 w-100" style="max-width: 800px;">
      <h2 class="card-title text-center mb-4">Crear Mantenimiento</h2>
      <form method="POST" action="index.php?vista=mantenimiento&accion=guardar" class="row g-3">

        <!-- Primera fila -->
        <div class="col-md-6">
          <label for="equipo_id" class="form-label">Equipo:</label>
          <select name="equipo_id" id="equipo_id" class="form-select" required>
            <option value="">Seleccione un equipo</option>
            <?php foreach ($equipos as $equipo): ?>
              <option value="<?= htmlspecialchars($equipo['id']) ?>">
                <?= htmlspecialchars($equipo['nombre']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <label for="tipo_mantenimiento_id" class="form-label">Tipo de Mantenimiento:</label>
          <select name="tipo_mantenimiento_id" id="tipo_mantenimiento_id" class="form-select" required>
            <option value="">Seleccione un tipo de mantenimiento</option>
            <?php foreach ($tipos_mantenimiento as $tipo): ?>
              <option value="<?= htmlspecialchars($tipo['id']) ?>">
                <?= htmlspecialchars($tipo['nombre']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Segunda fila -->
        <div class="col-md-6">
          <label for="fecha_mantenimiento" class="form-label">Fecha de Mantenimiento:</label>
          <input type="date" name="fecha_mantenimiento" id="fecha_mantenimiento" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label for="proximo_mantenimiento" class="form-label">Próximo Mantenimiento:</label>
          <input type="date" name="proximo_mantenimiento" id="proximo_mantenimiento" class="form-control" required>
        </div>

        <!-- Descripción ocupa toda la fila -->
        <div class="col-12">
          <label for="descripcion" class="form-label">Descripción:</label>
          <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Tercera fila -->
        <div class="col-md-6">
          <label for="tecnico_id" class="form-label">Técnico:</label>
          <select name="tecnico_id" id="tecnico_id" class="form-select" required>
            <option value="">Seleccione un técnico</option>
            <?php foreach ($tecnicos as $tecnico): ?>
              <option value="<?= htmlspecialchars($tecnico['id']) ?>">
                <?= htmlspecialchars($tecnico['nombre']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-6">
          <label for="estado_id" class="form-label">Estado:</label>
          <select name="estado_id" id="estado_id" class="form-select" required>
            <option value="">Seleccione un estado</option>
            <?php foreach ($estados as $estado): ?>
              <option value="<?= htmlspecialchars($estado['id']) ?>">
                <?= htmlspecialchars($estado['nombre']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Botones -->
        <div class="col-12 d-flex justify-content-between mt-4">
          <button type="submit" class="btn btn-primary">Crear Mantenimiento</button>
          <a href="index.php?vista=mantenimiento" class="btn btn-outline-secondary">Volver</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
