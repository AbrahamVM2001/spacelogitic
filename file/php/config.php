<?php
$servername = "217.21.76.167";
$username = "u547745900_Space";
$password = "6Wnn#0wTP=h";
$dbname = "u547745900_spacelogitic";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
