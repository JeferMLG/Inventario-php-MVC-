<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aulapp - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../view/Css/register.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="card shadow-sm p-4" style="max-width: 800px; width: 100%;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Registro</h2>
                <form action="index.php?vista=register&accion=registrar" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Introduce tu correo" required>
                            <div class="invalid-feedback">Ingresa un correo válido.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Introduce tu nombre" required>
                            <div class="invalid-feedback">Ingresa tu nombre.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" class="form-control" name="apellido" placeholder="Introduce tu apellido" required>
                            <div class="invalid-feedback">Ingresa tu apellido.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control" pattern="[0-9]{10}" title="Por favor, introduce un número de teléfono válido (10 dígitos)" placeholder="10 dígitos" required>
                            <div class="invalid-feedback">Ingresa un teléfono válido.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Introduce tu dirección"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" required>
                            <div class="invalid-feedback">Ingresa tu fecha de nacimiento.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Nombre de usuario:</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Crea tu nombre de usuario" required>
                            <div class="invalid-feedback">Crea un nombre de usuario.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Crea tu contraseña" required>
                            <div class="invalid-feedback">Crea una contraseña.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirm_password" class="form-label">Confirmar contraseña:</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirma tu contraseña" class="form-control" required>
                            <div class="invalid-feedback">Confirma tu contraseña.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol (opcional):</label>
                        <input type="number" class="form-control" id="rol" name="rol" placeholder="Por ejemplo, 1 para admin">
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                    </div>
                </form>
                <p class="mt-3 text-center">
                    ¿Ya tienes una cuenta? <a href="../index.php?vista=login" class="text-decoration-none">Inicia sesión aquí</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Lógica de validación de formularios de Bootstrap
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>