<?php 
session_start(); // Inicia sesión

// Verifica los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Aquí haces la verificación con la base de datos
if ($usuario == "paco" && $contrasena == "123456789") {
    $_SESSION['usuario'] = $usuario; // Guarda el usuario en la sesión
    header("Location: panel.html");
    exit();
} else {
    // Muestra mensaje de error con estilo
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Error de inicio de sesión</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin-top: 100px;
            }
            h2 {
                color: red;
            }
            a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            a:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <h2>Usuario o contraseña incorrectos</h2>
        <a href="index.html">Volver al inicio de sesión</a>
    </body>
    </html>
    ';
}
?>
