<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../view/Css/equipos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        
        <div class="main-content">
            <header class="topbar">
                <h1>Gestión de Equipos</h1>
            </header>
            
            <div class="content">
                <table class="doc-table">
                    <thead>
                        <tr>
                            <th>Dispositivo</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio (UNI)</th>
                            <th>Precio Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($equipos)): ?>
                            <?php foreach ($equipos as $row): 
                                $precioTotal = $row['precio'] * $row['cantidad'];
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nombre']) ?></td>
                                <td><?= htmlspecialchars($row['descripcion']) ?></td>
                                <td><?= htmlspecialchars($row['cantidad']) ?></td>
                                <td><?= htmlspecialchars($row['precio']) ?></td>
                                <td><?= number_format($precioTotal, 2) ?> USD</td>
                                <td><?= htmlspecialchars($row['estado_nombre']) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <!-- Botón Editar -->
                                        <a href="index.php?vista=equipos&accion=editar&id=<?= $row['id'] ?>" 
                                           class="edit-btn" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Botón Eliminar -->
                                        <a href="index.php?vista=equipos&accion=eliminar&id=<?= $row['id'] ?>" 
                                           class="delete-btn" title="Eliminar" 
                                           onclick="return confirm('¿Está seguro de que desea eliminar este dispositivo?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No hay dispositivos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Total del inventario -->
                <div class="total-value">
                    <p>Precio Total General: 
                        <span class="highlight">
                            <?= number_format($totalPrecio, 2) ?> USD
                        </span>
                    </p>
                </div>
            </div>
            
            <div class="Linea"></div>
        </div>
    </div>
</body>
</html>
