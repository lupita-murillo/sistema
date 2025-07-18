<?php
$mes = $_GET['mes'];

$conexion = new mysqli("localhost", "root", "", "sistem");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$query = "SELECT * FROM empleados WHERE mes = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $mes);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead><tr><th>#</th><th>Número de control</th><th>Nombre</th><th>Hora</th><th>Fecha</th></tr></thead><tbody>";
    $contador = 1;
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $contador++ . "</td>";
        echo "<td>" . htmlspecialchars($fila['num_control']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['hora']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['fecha']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No hay registros para este mes.</p>";
}

$stmt->close();
$conexion->close();
?>
