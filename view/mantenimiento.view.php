<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Mantenimiento</title>
    <link rel="stylesheet" href="../view/css/mantenimiento.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <header class="topbar">
                <h1>Gestión de Mantenimiento</h1>
            </header>

            <div class="content">
                <a href="index.php?vista=mantenimiento&accion=crear" class="btn">Crear Mantenimiento</a>
                <table class="doc-table">
                    <thead>
                        <tr>
                            <th>Dispositivo</th>
                            <th>Último Mantenimiento</th>
                            <th>Próximo Mantenimiento</th>
                            <th>Tipo de Mantenimiento</th>
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
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4">No hay mantenimientos registrados</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
