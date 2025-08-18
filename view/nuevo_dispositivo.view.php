<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Dispositivo</title>
    <link rel="stylesheet" href="../view/Css/nuevo_dispositivo.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>Añadir Nuevo Dispositivo</h2>

        <form action="index.php?vista=nuevo_dispositivo&accion=guardar" method="post">
   
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

       
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required></textarea><br>

            
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required><br>

          
            <label for="proveedor">Proveedor:</label>
            <select name="proveedor" required>
                <?php foreach ($proveedores as $proveedor): ?>
                    <option value="<?= $proveedor['id'] ?>">
                        <?= htmlspecialchars($proveedor['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>


            <label for="categoria">Categoría:</label>
            <select name="categoria" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= htmlspecialchars($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="marca">Marca:</label>
            <select name="marca" required>
                <?php foreach ($marcas as $marca): ?>
                    <option value="<?= $marca['id'] ?>">
                        <?= htmlspecialchars($marca['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>


            <label for="precio">Precio:</label>
            <input type="number" name="precio" step="0.01" required><br>


            <label for="caracteristicas">Características:</label>
            <textarea name="caracteristicas"></textarea><br>

   
            <label for="fecha_compra">Fecha de Compra:</label>
            <input type="date" name="fecha_compra" required><br>

            <label for="fecha_garantia">Fecha de Garantía:</label>
            <input type="date" name="fecha_garantia" required><br>

            <label for="fecha_vida_util">Fecha de Vida Útil:</label>
            <input type="date" name="fecha_vida_util" required><br>

            <input type="submit" value="Añadir Dispositivo">
            <button type="button" class="btn" onclick="window.location.href='index.php?vista=inventario';">Regresar al Inventario</button>
        </form>
    </div>
</body>
</html>
