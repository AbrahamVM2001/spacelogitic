<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$matriculaEnvio = $_GET['matricula'];
if (empty($matriculaEnvio)) {
    $sql = "SELECT * FROM envios";
} else {
    $sql = "SELECT * FROM envios WHERE Matricula = '$matriculaEnvio'";
}

$result = $conn->query($sql);
$envios = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $envios[] = $row;
    }
}
echo json_encode($envios);
$conn->close();
?>
