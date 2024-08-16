<?php
$servername = "217.21.76.167";
$username = "u547745900_spacelogistics";
$password = "1W>am/Ow";
$dbname = "u547745900_spacelogistics";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión correcta";
?>