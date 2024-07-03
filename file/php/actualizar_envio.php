<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "+HuEca7h";
$dbname = "id21214233_spacelogitics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$matricula = $_POST['matricula'];
$nuevoEstado = $_POST['nuevoEstado'];
$sql = "UPDATE envios SET Estado = '$nuevoEstado' WHERE Matricula = '$matricula'";
$conn->query($sql);
$conn->close();
?>
