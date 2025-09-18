<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - Aulapp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="view/Css/perfiluser.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <!-- Encabezado -->
            <div class="header">
                <h2 class="Perfil-user"><i class="fas fa-user-circle"></i> Peerfil de Usuario</h2>
                <div>
                    <a href="index.php?vista=perfil&accion=editar_usuario" class="btn btn-custom">
                    <i class="fas fa-pencil-alt"></i> Editar Perfil
                    </a>
                    </a>
                    <a href="../index.php?vista=logout" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                </div>
            </div>
            <!-- Contenido principal -->
            <div class="row g-4">
                <!-- Información del usuario -->
                <div class="col-8">
                    <div class="card">
                        <?php if ($usuario): ?>
                            <h4 class="fw-bold mb-3">👋 Bienvenido, 
                                <span class="text-primary">
                                    <?php echo htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?>
                                </span>
                            </h4>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-envelope text-primary"></i> 
                                    <strong>Correo:</strong> <?php echo htmlspecialchars($usuario['email']); ?>
                                </li>
                                <li><i class="fas fa-phone text-success"></i> 
                                    <strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?>
                                </li>
                                <li><i class="fas fa-map-marker-alt text-danger"></i> 
                                    <strong>Dirección:</strong> <?php echo htmlspecialchars($usuario['direccion']); ?>
                                </li>
                                <li><i class="fas fa-calendar-alt text-info"></i> 
                                    <strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>
                                </li>
                                <li><i class="fas fa-user-tag text-dark"></i> 
                                    <strong>Rol:</strong> <?php echo htmlspecialchars($usuario['rol_nombre']); ?>
                                </li>
                            </ul>
                        <?php else: ?>
                            <p>No se encontraron datos del usuario.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Foto de perfil -->
                <div class="col-4">
                    <div class="card text-center">
                        <?php 
                            $foto = !empty($usuario['foto_perfil']) 
                                ? "../uploads/" . htmlspecialchars($usuario['foto_perfil']) 
                                : "../uploads/default.png";
                        ?>
                        <img src="<?php echo $foto; ?>" alt="Foto de Perfil"
                            class="img-profile rounded-circle mx-auto d-block mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        <form action="../index.php?vista=perfil&accion=actualizar_foto" 
                              method="post" enctype="multipart/form-data" class="mt-3">
                            <div class="mb-2">
                                <label for="foto" class="btn-outline-secondary">
                                    <i class="fas fa-upload"></i> Seleccionar archivo
                                </label>
                                <input type="file" name="foto" id="foto" accept="image/*" required hidden>
                            </div>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-check-circle"></i> Actualizar Foto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sección opcional: estadísticas o actividad -->
            <div class="row g-3">
                <div class="col-4">
                    <div class="card text-center">
                        <h5 class="fw-bold text-primary">📦 Inventario</h5>
                        <p class="fs-4 fw-bold">120 items</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <h5 class="fw-bold text-success">📊 Reportes</h5>
                        <p class="fs-4 fw-bold">15 generados</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <h5 class="fw-bold text-danger">🕒 Último acceso</h5>
                        <p class="fs-6">17/09/2025 - 10:45am</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>