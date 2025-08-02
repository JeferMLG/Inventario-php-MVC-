<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/inventario44.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <header class="topbar">
                <h1>Gestión de Inventario</h1>
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
                            <th></th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): 
                                $precioTotal = $row['precio'] * $row['cantidad']; 
                                $totalPrecio += $precioTotal; 
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                                <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                <td><?php echo htmlspecialchars($row['precio']); ?></td>
                                <td><?php echo number_format($precioTotal, 2); ?> USD</td>
                                <td><?php echo htmlspecialchars($row['estado_nombre']); ?></td>
                                <th></th>
                                <td>
                                    <div class="action-buttons">
                                        <a href="edit_device.php?id=<?php echo $row['id']; ?>" class="edit-btn" title="Editar">
                                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>

                                        <a href="inventario.php?delete_id=<?php echo $row['id']; ?>" class="delete-btn" title="Eliminar" onclick="return confirm('¿Está seguro de que desea eliminar este dispositivo?');">
                                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7">No hay dispositivos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="total-value">
                    <p>Precio Total General: <span class="highlight"><?php echo number_format($totalPrecio, 2); ?> USD</span></p>
                </div>
                

                
            </div>
            <div class="Linea"></div>
        </div>
    </div>

    
       
    </script>
</body>
</html>