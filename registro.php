<?php
// Conexión con la base de datos
$host = "localhost";
$usuario = "root";          // Usuario por defecto en XAMPP
$contrasena = "";           // Contraseña vacía por defecto
$basedatos = "sistem";      // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

// Revisar si la conexión funcionó
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir los datos que se escribieron en el formulario
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$telefono = $_POST['telefono'];
$num_control = $_POST['num_control'];

// Aquí revisamos si ya hay un registro igual (mismo nombre, mismo número de control y misma hora)
$consulta = "SELECT * FROM registro 
    WHERE nombre = ? 
    AND num_control = ?
    AND DATE(fecha_hora) = CURDATE()
    AND HOUR(fecha_hora) = HOUR(NOW())";  // Verifica que sea en la misma hora

// Preparamos la consulta y le colocamos los datos
$stmt = $conn->prepare($consulta);
$stmt->bind_param("ss", $nombre, $num_control);
$stmt->execute();
$resultado = $stmt->get_result();

// Si se encontró un registro igual, se muestra un mensaje
if ($resultado->num_rows > 0) {
    echo " Ya hay un registro con ese nombre y número de control en esta hora.";
} else {
    // Si no existe, se guarda el nuevo registro
    $sql = "INSERT INTO registro (nombre, apellido_paterno, apellido_materno, telefono, num_control)
            VALUES (?, ?, ?, ?, ?)";

    // Preparamos la consulta para guardar y colocamos los datos
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido_paterno, $apellido_materno, $telefono, $num_control);

    // Revisamos si se guardó bien
    if ($stmt->execute()) {
        echo " Registro guardado correctamente.";
    } else {
        echo " Hubo un error al guardar: " . $stmt->error;
    }
}

// Cerramos la conexión con la base de datos
$conn->close();
?>

 
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRO</title>
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
    <br>    <a href="registro.html">Volver al registro</a>
     <br>    <a href="panel.html">Volver al inicio</a>
    </body>
    </html>
    
