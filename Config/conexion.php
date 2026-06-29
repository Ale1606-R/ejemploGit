<?php
$host     = "localhost";
$db_name  = "farmacia"; // <- Ponemos "farmacia" porque así se llama en tu phpMyAdmin
$username = "root";
$password = ""; // En XAMPP por defecto va vacío

try {
    // Esta es la "URL interna" o DSN que usa PHP para conectarse
    $conexion = new PDO("mysql:host=" . $host . ";dbname=" . $db_name . ";charset=utf8", $username, $password);
    
    // Activar el manejo de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $exception) {
    echo "Error de conexión: " . $exception->getMessage();
}
?>