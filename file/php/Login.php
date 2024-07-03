<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Prepare and execute SQL query
$sql = "SELECT * FROM naves WHERE correo = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $correo, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

// Check if login was successful
if ($result->num_rows > 0) {
    // Login successful
    session_start();
    $_SESSION['correo'] = $correo;
    echo '<script>';
        echo 'alert("Bienvenido");';
        echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/CPanel.html");';
        echo '</script>';
} else {
    // Login failed
    echo "Correo o contraseña incorrectos.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
