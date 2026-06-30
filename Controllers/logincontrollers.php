<?php
// ÚNICO session_start al principio del archivo
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Cambiamos la ruta para que suba una carpeta y busque en Config
    require_once "../Config/conexion.php";

    // Recibir los datos directamente del formulario
    $usuario = $_POST['usuario'] ?? '';
    $clave   = $_POST['clave'] ?? '';

    try {
        // Con PDO usamos consultas preparadas, lo que hace el sistema súper seguro
        $query = "SELECT * FROM usuarios WHERE Nombre_usuario = :usuario AND Clave_acceso = :clave";
        $stmt = $conexion->prepare($query);
        
        // Enlazamos los datos de las cajitas de texto
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':clave', $clave);
        $stmt->execute();

        // Buscamos si existe la fila en la base de datos
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Guardamos el usuario en la sesión
            $_SESSION['usuario'] = $row['Nombre_usuario'];
            
            // Redirección limpia al dashboard (Nota la V mayúscula de Views)
            header("Location: ../Views/Dashboard.php");
            exit();
        } else {
            // Mensaje controlado si los datos fallan
            header("Location: ../Views/login.php?error=1");
            exit();
        }

    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}
?>