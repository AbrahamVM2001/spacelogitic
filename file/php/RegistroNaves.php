<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombreRepresentante = $_POST['Representante'];
$distancia = $_POST['Distancia'];
$combustible = $_POST['Combustible'];
$correo = $_POST['Correo'];
$contrasena = $_POST['Pass'];
$contrasenaConfirmar = $_POST['PassC'];

// Validación de la contraseña
if (strlen($contrasena) < 8 || !preg_match("/[A-Z]/", $contrasena) || !preg_match("/[0-9]/", $contrasena) || !preg_match("/[!@#$%^&*()_+]/", $contrasena)) {
    echo '<script>';
    echo 'alert("La contraseña debe tener al menos 8 caracteres, incluir al menos una mayúscula, un número y un carácter especial.");';
    echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/index.html");';
    echo '</script>';
    exit(); // Sale del script si la contraseña no cumple con los requisitos
}

// Verificar si la contraseña y la confirmación coinciden
if ($contrasena != $contrasenaConfirmar) {
    echo '<script>';
    echo 'alert("La contraseña y la confirmación de contraseña no coinciden.");';
    echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/index.html/");';
    echo '</script>';
    exit(); // Sale del script si las contraseñas no coinciden
}

// Ruta para almacenar la imagen
$directorioImagenes = __DIR__ . "/file/imagenes/img-db/";

// Verifica si el directorio existe, si no, créalo
if (!file_exists($directorioImagenes)) {
    mkdir($directorioImagenes, 0777, true);
    chmod($directorioImagenes, 0777);
}

// Nombre de la imagen y ruta completa
$imagenNombre = $_FILES['Imagen']['name'];
$rutaImagenCompleta = $directorioImagenes . $imagenNombre;

// Mueve la imagen al directorio de imágenes
if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $rutaImagenCompleta)) {
    chmod($rutaImagenCompleta, 0777);

    // Prepara la consulta SQL
    $sql = "INSERT INTO naves (NombreRepresentante, Distancia, Combustible, Imagen, correo, contrasena) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Lee la imagen como binario
    $imagenBinaria = file_get_contents($rutaImagenCompleta);

    // Vincula los parámetros
    $stmt->bind_param("siiiss", $nombreRepresentante, $distancia, $combustible, $imagenBinaria, $correo, $contrasena);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Registro exitoso.");';
        echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/login.html");';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Registro fallido");';
        echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/index.html");';
        echo '</script>';
    }

    $stmt->close();
} else {
    echo '<script>';
    echo 'alert("Error al mover la imagen");';
    echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/index.html");';
    echo '</script>';
}

$conn->close();
?>
