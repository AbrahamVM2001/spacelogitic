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

    // Enviar JSON solo si hay datos
    header('Content-Type: application/json');
    echo json_encode($envios);
} else {
    // Enviar mensaje de error
    http_response_code(404); // Not Found
    echo json_encode(array('error' => 'No se encontró ningún envío con esa matrícula.'));
}

$conn->close();
?>
