<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Aulapp</title>
    <link rel="stylesheet" href="../view/Css/perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Iconos -->
</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <header class="topbar">
                <h1>Perfil de Usuario</h1>
                <div class="actions">
                    <a href="editar_perfil.php" class="btn">Editar Perfil</a> 
                    <a href="logout.php" class="btn">Salir</a>
                </div>
            </header>

            <div class="contentmadre">
                <div class="content">
                    <?php if ($userData): ?>
                        <h2>Bienvenido, <?php echo htmlspecialchars($userData['nombre'] . ' ' . $userData['apellido']); ?></h2>
                        <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
                        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($userData['telefono']); ?></p>
                        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($userData['direccion']); ?></p>
                        <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($userData['fecha_nacimiento']); ?></p>
                        <p><strong>Rol:</strong> <?php echo htmlspecialchars($userData['rol_nombre']); ?></p>
                    <?php else: ?>
                        <p>No se encontraron datos del usuario.</p>
                    <?php endif; ?>
                </div>

                <div class="content2">
                    <?php 
                        // Si no hay foto, mostramos una imagen por defecto
                        $foto = !empty($userData['foto_perfil']) 
                            ? "uploads/" . htmlspecialchars($userData['foto_perfil']) 
                            : "uploads/default.png";
                    ?>
                    <img src="<?php echo $foto; ?>" alt="Foto de Perfil" style="width:250px; height:auto; border-radius:10px;">

                    <form action="perfil.php" method="post" enctype="multipart/form-data">
                        <label for="foto" class="custom-file-upload">
                            <i class="fas fa-upload"></i> Seleccionar archivo
                        </label>
                        <input type="file" name="foto" id="foto" accept="image/*" required>
                        <button type="submit">Actualizar Foto</button>
                    </form>
                </div>
            </div>

            <div class="menu"></div>
        </div>
    </div>
</body>
</html>
