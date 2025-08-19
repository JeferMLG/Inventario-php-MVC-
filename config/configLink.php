<?php
// Detectar si estamos en local o en producción
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    // 🔹 Configuración LOCAL (XAMPP)
    define("DB_HOST", "localhost");
    define("DB_NAME", "empresa_inventario");
    define("DB_USER", "root");
    define("DB_PASS", "");
} else {
    // 🔹 Configuración PRODUCCIÓN (Hosting page.gd)
    define("DB_HOST", "ql201.infinityfree.com"); // <- pon el host de MySQL real
    define("DB_NAME", "if0_39730339_XXX");     // <- pon el nombre real de la BD
    define("DB_USER", "if0_39730339");           // <- pon el usuario real
    define("DB_PASS", "znJ1uhNOryf");         // <- pon la contraseña real
}
