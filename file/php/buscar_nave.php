<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$claveNave = $_GET['clave'];

if (empty($claveNave)) {
    $sql = "SELECT * FROM naves";
} else {
    $sql = "SELECT * FROM naves WHERE ClaveNave = '$claveNave'";
}

$result = $conn->query($sql);
$naves = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imgPath = __DIR__ . 'C:\xampp\htdocs\examen tecnico\file\php\file\imagenes\img-db' . $row['Imagen'];
        // Agregamos la ruta completa de la imagen al array
        $row['Imagen'] = $imgPath;

        $naves[] = $row;
    }
}

echo json_encode($naves);
$conn->close();
?>
