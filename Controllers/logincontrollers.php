<?php
// ÚNICO session_start al principio del archivo
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once dirname(__DIR__) . "/Config/conexion.php";
    
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $clave   = mysqli_real_escape_string($conexion, $_POST['clave']);
    
    $query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
    $resultado = mysqli_query($conexion , $query);
    
    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $_SESSION['usuario'] = $usuario;
        
        // Redirección limpia al dashboard
        header("Location: ../views/Dashboard.php");
        exit();
    } else {
        // Mensaje controlado si los datos fallan
        header("Location: ../views/login.php?error=1");
        exit();
    }
}
?>