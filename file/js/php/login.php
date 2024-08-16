<?php
require_once("config.php");
$email = $_POST['email'];
$password = $_POST['password'];

// Preparar la consulta SQL
$sql = "SELECT * FROM usuario WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontró un usuario
if ($result->num_rows > 0) {
    // Usuario encontrado
    $response = array('status' => 'success');
} else {
    // Usuario no encontrado
    $response = array('status' => 'error', 'message' => 'Correo electrónico o contraseña incorrectos.');
}

// Cerrar la conexión
$stmt->close();
$conn->close();

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>