<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulapp - Configuración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../view/Css/informacion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Contenido principal -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            <header class="topbar">
                <h1 class="h3 mb-0"><i class="fas fa-info-circle me-2"></i> Información del Sistema</h1>
            </header>

            <!-- Contenido -->
            <div class="container">
                <!-- Bloque grande Terminos -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Términos y Usos de la Aplicación</h2>
                        <p>La presente aplicación web tiene como objetivo optimizar la gestión de inventarios y el mantenimiento de dispositivos electrónicos, facilitando el control, seguimiento y mantenimiento de los equipos en las empresas.</p>
                    </div>
                </div>

                <!-- Grid de 2 columnas -->
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h3>1. Uso de la Aplicación</h3>
                                <p>Esta plataforma está diseñada para gestionar de manera eficiente los siguientes aspectos:</p>
                                <ul>
                                    <li>Registro y control de inventarios de dispositivos electrónicos.</li>
                                    <li>Programación de mantenimientos preventivos y correctivos.</li>
                                    <li>Generación de reportes detallados sobre el estado y mantenimiento de los dispositivos.</li>
                                    <li>Notificaciones automáticas para tareas de mantenimiento programadas.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h3>2. Gestión de Inventarios</h3>
                                <p>La aplicación permite un control detallado del inventario de equipos electrónicos, almacenando información clave como:</p>
                                <ul>
                                    <li>Marca, modelo y número de serie del dispositivo.</li>
                                    <li>Fecha de adquisición y estado actual.</li>
                                    <li>Historial de mantenimientos realizados.</li>
                                    <li>Proveedor y fecha de garantía del equipo.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h3>3. Mantenimiento de Dispositivos</h3>
                                <p>El módulo de mantenimiento facilita la planificación y ejecución de tareas preventivas y correctivas, incluyendo:</p>
                                <ul>
                                    <li>Programación automática de mantenimientos según la vida útil del equipo.</li>
                                    <li>Asignación de responsables para cada tarea de mantenimiento.</li>
                                    <li>Generación de alertas para equipos que requieran atención urgente.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h3>4. Términos de Uso</h3>
                                <p>Al utilizar esta aplicación, los usuarios aceptan los siguientes términos:</p>
                                <ul>
                                    <li>Responsabilidad en la veracidad de los datos registrados en el sistema.</li>
                                    <li>Compromiso con el uso adecuado de la plataforma para evitar el mal uso de los recursos.</li>
                                    <li>El equipo de mantenimiento debe registrar oportunamente los trabajos realizados para garantizar el correcto seguimiento de los dispositivos.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h3>5. Seguridad de los Datos</h3>
                                <p>La aplicación garantiza la seguridad de los datos almacenados, implementando medidas de protección como:</p>
                                <ul>
                                    <li>Encriptación de datos sensibles.</li>
                                    <li>Acceso restringido por roles de usuario.</li>
                                    <li>Copias de seguridad regulares para prevenir la pérdida de información.</li>
                                </ul>
                                <p class="mt-2">El uso de la aplicación está orientado a mejorar la eficiencia y la organización en la gestión de los dispositivos electrónicos y su mantenimiento.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- Fin row -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
