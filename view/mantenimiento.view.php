<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Mantenimiento</title>
    <link rel="stylesheet" href="../view/css/mantenimiento.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <header class="topbar">
                <h1>Gestión de Mantenimiento</h1>
            </header>

            <div class="content">
                <a href="index.php?vista=mantenimiento&accion=nuevo" class="btn">Crear Mantenimiento</a>
                <table class="doc-table">
                    <thead>
                        <tr>
                            <th>Dispositivo</th>
                            <th>Último Mantenimiento</th>
                            <th>Próximo Mantenimiento</th>
                            <th>Tipo de Mantenimiento</th>
                            <th>Técnico</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mantenimientos)): ?>
                            <?php foreach ($mantenimientos as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['dispositivo']) ?></td>
                                    <td><?= htmlspecialchars($row['ultimo_mantenimiento']) ?></td>
                                    <td><?= htmlspecialchars($row['proximo_mantenimiento']) ?></td>
                                    <td><?= htmlspecialchars($row['tipo_mantenimiento']) ?></td>
                                    <td><?= htmlspecialchars($row['tecnico']) ?></td>
                                    <td><?= htmlspecialchars($row['descripcion']) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <!-- Botón Editar -->
                                            <a href="index.php?vista=mantenimiento&accion=editar&id=<?= $row['id'] ?>" 
                                            class="edit-btn" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Botón Eliminar -->
                                            <a href="index.php?vista=mantenimiento&accion=eliminar&id=<?= $row['id'] ?>" 
                                            class="delete-btn" 
                                            title="Eliminar" 
                                            onclick="return confirm('¿Está seguro de que desea eliminar este mantenimiento?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5">No hay mantenimientos registrados</td></tr>
                        <?php endif; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
