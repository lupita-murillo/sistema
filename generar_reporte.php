<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión con la base de datos
$conexion = new mysqli("localhost", "root", "", "sistem"); // usa el nombre correcto

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

require('fpdf/fpdf.php');

$mes = $_GET['mes'] ?? '';

$meses = array(
    "Enero" => "01", "Febrero" => "02", "Marzo" => "03",
    "Abril" => "04", "Mayo" => "05", "Junio" => "06",
    "Julio" => "07", "Agosto" => "08", "Septiembre" => "09",
    "Octubre" => "10", "Noviembre" => "11", "Diciembre" => "12"
);

if (!isset($meses[$mes])) {
    die("Mes inválido");
}

$mes_numero = $meses[$mes];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Reporte de Visitantes - $mes", 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'No. Control', 1);
$pdf->Cell(60, 10, 'Nombre', 1);
$pdf->Cell(45, 10, 'Fecha', 1);
$pdf->Cell(35, 10, 'Hora', 1);
$pdf->Ln();

$sql = "SELECT num_control, nombre, fecha_hora FROM registro WHERE MONTH(fecha_hora) = '$mes_numero'";
$resultado = $conexion->query($sql);

$pdf->SetFont('Arial', '', 11);
if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(40, 10, $fila['num_control'], 1);
        $pdf->Cell(60, 10, $fila['nombre'], 1);
        $pdf->Cell(45, 10, date('Y-m-d', strtotime($fila['fecha_hora'])), 1);
        $pdf->Cell(35, 10, date('H:i:s', strtotime($fila['fecha_hora'])), 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No hay registros para este mes.', 1, 1, 'C');
}

$pdf->Output('I', "reporte_$mes.pdf");

$conexion->close();
?>
