<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/Css/edictar_perfiluser.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <!-- Encabezado -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
            <h1 class="fw-bold"><i class="bi bi-pencil-square"></i> Editar Perfil</h1>
            <a href="index.php?vista=perfil" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>

        <!-- Mensajes -->
        <?php if (isset($_GET['msg'])): ?>
            <div class="alert 
                <?php 
                    echo ($_GET['msg'] === 'success') ? 'alert-success' : 'alert-warning'; 
                ?> alert-dismissible fade show" role="alert">
                <?php
                    switch ($_GET['msg']) {
                        case 'campos_obligatorios': echo "⚠️ Nombre y email son obligatorios."; break;
                        case 'email_invalido': echo "⚠️ El email no es válido."; break;
                        case 'telefono_invalido': echo "⚠️ El teléfono debe tener entre 7 y 15 dígitos."; break;
                        case 'error_bd': echo "❌ Error al actualizar el usuario."; break;
                        case 'success': echo "✅ Perfil actualizado con éxito."; break;
                    }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?vista=perfil&accion=actualizar_usuario" method="POST" class="row g-3">

                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" 
                               value="<?= htmlspecialchars($usuario['nombre'] ?? '') ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input type="email" class="form-control" name="email" id="email" 
                               value="<?= htmlspecialchars($usuario['email'] ?? '') ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" 
                               value="<?= htmlspecialchars($usuario['fecha_nacimiento'] ?? '') ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" 
                               value="<?= htmlspecialchars($usuario['telefono'] ?? '') ?>">
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" 
                               value="<?= htmlspecialchars($usuario['direccion'] ?? '') ?>">
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Actualizar
                        </button>
                        <a href="index.php?vista=perfil" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
