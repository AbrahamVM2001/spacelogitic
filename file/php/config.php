<?php
$servername = "localhost";
$username = "u547745900_spacelogistics";
$password = "dmR0BOfjG7:";
$dbname = "u547745900_spacelogistics";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión correcta";
?>