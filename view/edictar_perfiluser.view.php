<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../view/css/perfil.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <header class="topbar">
                <h1>Editar Perfil</h1>
                <div class="actions">
                    <a href="index.php?vista=perfil" class="btn">Volver</a>
                </div>
            </header>

            <div class="content">
                <?php if (isset($_GET['msg'])): ?>
                    <div class="alert">
                        <?php
                        switch ($_GET['msg']) {
                            case 'campos_obligatorios': echo "⚠️ Nombre y email son obligatorios."; break;
                            case 'email_invalido': echo "⚠️ El email no es válido."; break;
                            case 'telefono_invalido': echo "⚠️ El teléfono debe tener entre 7 y 15 dígitos."; break;
                            case 'error_bd': echo "❌ Error al actualizar el usuario."; break;
                            case 'success': echo "✅ Perfil actualizado con éxito."; break;
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <form action="index.php?vista=perfil&accion=actualizar_usuario" method="POST">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" 
                        value="<?= htmlspecialchars($usuario['nombre'] ?? '') ?>" required>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" 
                        value="<?= htmlspecialchars($usuario['email'] ?? '') ?>" required>

                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" 
                        value="<?= htmlspecialchars($usuario['fecha_nacimiento'] ?? '') ?>">

                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" 
                        value="<?= htmlspecialchars($usuario['telefono'] ?? '') ?>">

                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" 
                        value="<?= htmlspecialchars($usuario['direccion'] ?? '') ?>">

                    <div class="button-container">
                        <button type="submit">Actualizar</button>
                        <button type="button" onclick="location.href='index.php?vista=perfil'">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
