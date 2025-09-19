<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Mantenimiento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../view/Css/actualizar_mantenimientoBoo.css">
</head>
<body>

  <div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 w-100" style="max-width: 800px;">
      <div class="card-body">
        <h2 class="card-title text-center mb-4">Actualizar Mantenimiento</h2>

        <form method="POST" action="index.php?vista=mantenimiento&accion=actualizar&id=<?= $mantenimiento['id'] ?>" class="row g-3 needs-validation" novalidate>
          
          <!-- Campo oculto con el ID del mantenimiento -->
          <input type="hidden" name="id" value="<?= htmlspecialchars($mantenimiento['id']) ?>">

          <!-- Equipo (bloqueado) -->
          <div class="col-md-6">
            <label for="equipo_id" class="form-label">Equipo:</label>
            <select class="form-select" id="equipo_id" name="equipo_id" disabled>
              <option value="">Seleccione un equipo</option>
              <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo['id']) ?>"
                  <?= $equipo['id'] == $mantenimiento['equipo_id'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($equipo['nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Tipo de mantenimiento -->
          <div class="col-md-6">
            <label for="tipo_mantenimiento_id" class="form-label">Tipo de Mantenimiento:</label>
            <select class="form-select" id="tipo_mantenimiento_id" name="tipo_mantenimiento_id" required>
              <option value="">Seleccione un tipo de mantenimiento</option>
              <?php foreach ($tipos_mantenimiento as $tipo): ?>
                <option value="<?= htmlspecialchars($tipo['id']) ?>"
                  <?= $tipo['id'] == $mantenimiento['tipo_mantenimiento_id'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($tipo['nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Fecha de mantenimiento -->
          <div class="col-md-6">
            <label for="fecha_mantenimiento" class="form-label">Fecha de Mantenimiento:</label>
            <input type="date" class="form-control" id="fecha_mantenimiento" name="ultimo_mantenimiento"
              value="<?= htmlspecialchars($mantenimiento['ultimo_mantenimiento']) ?>" required>
          </div>

          <!-- Próximo mantenimiento -->
          <div class="col-md-6">
            <label for="proximo_mantenimiento" class="form-label">Próximo Mantenimiento:</label>
            <input type="date" class="form-control" id="proximo_mantenimiento" name="proximo_mantenimiento"
              value="<?= htmlspecialchars($mantenimiento['proximo_mantenimiento']) ?>" required>
          </div>

          <!-- Descripción -->
          <div class="col-12">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= htmlspecialchars($mantenimiento['descripcion']) ?></textarea>
          </div>

          <!-- Técnico -->
          <div class="col-md-6">
            <label for="tecnico_id" class="form-label">Técnico:</label>
            <select class="form-select" id="tecnico_id" name="tecnico_id" required>
              <option value="">Seleccione un técnico</option>
              <?php foreach ($tecnicos as $tecnico): ?>
                <option value="<?= htmlspecialchars($tecnico['id']) ?>"
                  <?= $tecnico['id'] == $mantenimiento['tecnico_id'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($tecnico['nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Estado -->
          <div class="col-md-6">
            <label for="estado_id" class="form-label">Estado:</label>
            <select class="form-select" id="estado_id" name="estado_id" required>
              <option value="">Seleccione un estado</option>
              <?php foreach ($estados as $estado): ?>
                <option value="<?= htmlspecialchars($estado['id']) ?>"
                  <?= $estado['id'] == $mantenimiento['estado_id'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($estado['nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Botones -->
          <div class="col-12 d-flex justify-content-end gap-2 mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php?vista=mantenimiento" class="btn btn-outline-secondary">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
