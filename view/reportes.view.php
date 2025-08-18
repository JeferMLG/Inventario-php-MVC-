<!DOCTYPE html>
<html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Generar Reporte</title>
            <link rel="stylesheet" href="../view/css/reportes.css">
        </head>
    <body>
        
        <div class="overlay"></div>

        
        <div class="container">
            <h2>Reporte de Dispositivos</h2>
            
        <form method="GET" action="index.php">
            <input type="hidden" name="vista" value="reportes">
            <input type="text" name="busqueda" placeholder="Buscar Dispositivos por nombre" value="<?= htmlspecialchars($_GET['busqueda'] ?? '') ?>">
            <button type="submit">Buscar</button>
        </form>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Precio Total</th> 
                            <th>Proveedor</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Estado</th> 
                            <th>Fecha de Compra</th> 
                        </tr>
                    </thead>
                        <tbody>
                            <?php if (!empty($reportes)): ?>
                                <?php foreach ($reportes as $r): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($r['nombre']) ?></td>
                                        <td><?= htmlspecialchars($r['descripcion']) ?></td>
                                        <td><?= htmlspecialchars($r['cantidad']) ?></td>
                                        <td><?= htmlspecialchars($r['precio']) ?></td>
                                        <td><?= htmlspecialchars($r['precio_total']) ?></td>
                                        <td><?= htmlspecialchars($r['proveedor']) ?></td>
                                        <td><?= htmlspecialchars($r['categoria']) ?></td>
                                        <td><?= htmlspecialchars($r['marca']) ?></td>
                                        <td><?= htmlspecialchars($r['estado']) ?></td>
                                        <td><?= htmlspecialchars($r['fecha_compra']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10">No se encontraron resultados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                </table>


            <button type="button" class="btn" onclick="window.location.href='index.php?vista=home'">Regresar al Home</button>
        </div>
    </body>
</html>