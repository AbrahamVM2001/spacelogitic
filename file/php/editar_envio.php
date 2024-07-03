<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$matricula = $_POST['matricula'];
$nuevoEstado = $_POST['estado'];

// Realiza la actualización en la base de datos
$sql = "UPDATE envios SET Estado = ? WHERE Matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $nuevoEstado, $matricula);
$stmt->execute();
$stmt->close();

$conn->close();
?>
