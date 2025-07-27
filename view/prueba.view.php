<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini Menú de Prueba</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .menu {
            background: #2c3e50;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        .menu li {
            list-style: none;
            margin: 0 15px;
        }
        .menu a {
            display: block;
            padding: 15px 20px;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
            border-radius: 4px;
        }
        .menu a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <ul class="menu">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Usuarios</a></li>
        <li><a href="#">Salir</a></li>
    </ul>
    <div style="text-align:center; margin-top:40px;">
        <h2>Bienvenido al menú de prueba</h2>
    </div>
</body>
</html>