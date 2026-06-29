<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoGest - Iniciar Sesión</title>
    </head>
<body>
    <div style="max-width: 400px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
        <h2 style="text-align: center;">AutoGest - Login</h2>
        
        <form action="../controllers/loginController.php" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="clave">Contraseña:</label>
                <input type="password" id="clave" name="clave" required style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;">
            </div>
            
            <button type="submit" style="width: 100%; padding: 10px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Ingresar
            </button>
        </form>
    </div>
</body>
</html>