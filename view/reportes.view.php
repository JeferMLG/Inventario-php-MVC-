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
            <input type="text" name="busqueda" placeholder="Buscar por nombre" value="<?= htmlspecialchars($_GET['busqueda'] ?? '') ?>">
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
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row['nombre']) . "</td>
                                        <td>" . htmlspecialchars($row['descripcion']) . "</td>
                                        <td>" . htmlspecialchars($row['cantidad']) . "</td>
                                        <td>" . number_format($row['precio'], 2) . "</td>
                                        <td>" . number_format($row['precio_total'], 2) . "</td> <!-- Mostrar precio total -->
                                        <td>" . htmlspecialchars($row['proveedor']) . "</td>
                                        <td>" . htmlspecialchars($row['categoria']) . "</td>
                                        <td>" . htmlspecialchars($row['marca']) . "</td>
                                        <td>" . htmlspecialchars($row['estado']) . "</td> <!-- Mostrar estado -->
                                        <td>" . htmlspecialchars($row['fecha_compra']) . "</td> <!-- Mostrar fecha de compra -->
                                        </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>No hay dispositivos registrados</td></tr>"; 
                        }
                        ?>
                    </tbody>
                </table>

            
            <button type="button" class="btn" onclick="window.location.href='home.php';">Regresar al Home</button>
        </div>
    </body>
</html>