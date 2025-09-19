<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Dispositivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../view/Css/nuevo_dispositivo.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Añadir Nuevo Dispositivo</h2>

            <form action="index.php?vista=nuevo_dispositivo&accion=guardar" method="post" class="row g-3 needs-validation" novalidate>

                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                    <div class="invalid-feedback">Ingresa el nombre del dispositivo.</div>
                </div>

                <div class="col-md-6">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" required>
                    <div class="invalid-feedback">Ingresa la cantidad.</div>
                </div>

                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="2" required></textarea>
                    <div class="invalid-feedback">Ingresa una descripción.</div>
                </div>

                <div class="col-md-4">
                    <label for="proveedor" class="form-label">Proveedor:</label>
                    <select class="form-select" name="proveedor" id="proveedor" required>
                        <?php foreach ($proveedores as $proveedor): ?>
                            <option value="<?= $proveedor['id'] ?>">
                                <?= htmlspecialchars($proveedor['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Selecciona un proveedor.</div>
                </div>

                <div class="col-md-4">
                    <label for="categoria" class="form-label">Categoría:</label>
                    <select class="form-select" name="categoria" id="categoria" required>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria['id'] ?>">
                                <?= htmlspecialchars($categoria['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Selecciona una categoría.</div>
                </div>

                <div class="col-md-4">
                    <label for="marca" class="form-label">Marca:</label>
                    <select class="form-select" name="marca" id="marca" required>
                        <?php foreach ($marcas as $marca): ?>
                            <option value="<?= $marca['id'] ?>">
                                <?= htmlspecialchars($marca['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Selecciona una marca.</div>
                </div>

                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" step="0.01" class="form-control" name="precio" id="precio" required>
                    <div class="invalid-feedback">Ingresa un precio válido.</div>
                </div>

                <div class="col-md-6">
                    <label for="caracteristicas" class="form-label">Características:</label>
                    <textarea class="form-control" name="caracteristicas" id="caracteristicas" rows="2"></textarea>
                </div>

                <div class="col-md-4">
                    <label for="fecha_compra" class="form-label">Fecha de Compra:</label>
                    <input type="date" class="form-control" name="fecha_compra" id="fecha_compra" required>
                    <div class="invalid-feedback">Ingresa la fecha de compra.</div>
                </div>

                <div class="col-md-4">
                    <label for="fecha_garantia" class="form-label">Fecha de Garantía:</label>
                    <input type="date" class="form-control" name="fecha_garantia" id="fecha_garantia" required>
                    <div class="invalid-feedback">Ingresa la fecha de garantía.</div>
                </div>

                <div class="col-md-4">
                    <label for="fecha_vida_util" class="form-label">Fecha de Vida Útil:</label>
                    <input type="date" class="form-control" name="fecha_vida_util" id="fecha_vida_util" required>
                    <div class="invalid-feedback">Ingresa la fecha de vida útil.</div>
                </div>

                <div class="col-12 d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Añadir Dispositivo
                    </button>
                    <a href="index.php?vista=home" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Regresar al Home
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        // Validación de Bootstrap
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
