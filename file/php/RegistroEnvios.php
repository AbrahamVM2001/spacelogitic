<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombreCompleto = $_POST['NomCom'];
$numeroCelular = $_POST['celular'];
$peso = $_POST['Peso'];
$planetaEnvio = $_POST['inputState'];
$planetaDestino = $_POST['inputStates'];

// Obtener la nave disponible
$sqlBuscarNave = "SELECT ClaveNave, Combustible FROM naves WHERE Distancia >= (SELECT Distancia FROM planetas WHERE NombrePlaneta = '$planetaDestino') ORDER BY Combustible DESC LIMIT 1";
$resultBuscarNave = $conn->query($sqlBuscarNave);

if ($resultBuscarNave->num_rows > 0) {
    $rowNave = $resultBuscarNave->fetch_assoc();
    $claveNave = $rowNave['ClaveNave'];
    $combustibleNave = $rowNave['Combustible'];
    $distanciaPlaneta = obtenerDistanciaEntrePlanetas($planetaEnvio, $planetaDestino);

    if ($combustibleNave >= $distanciaPlaneta) {
        // Verificar disponibilidad de la nave en el rango de fechas
        $sqlVerificarDisponibilidad = "SELECT * FROM envios
                                        WHERE ClaveNave = '$claveNave'
                                        AND ((fechaEnvio BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 MONTH))
                                        OR (fechaEntrega BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 MONTH)))";
        $resultVerificarDisponibilidad = $conn->query($sqlVerificarDisponibilidad);

        if ($resultVerificarDisponibilidad->num_rows == 0) {
            // Nave disponible, realizar el registro del envío
            $fechaEnvio = date('Y-m-d');
            $fechaEntrega = $_POST['fecha'];

            $sqlInsertarEnvio = "INSERT INTO envios (IdPlaneta, ClaveNave, NombreCompleto, NumeroCelular, Peso, PlanetaEnvio, PlanetaDestino, Distancia, Estado, fechaEnvio, fechaEntrega)
                                VALUES ((SELECT IdPlaneta FROM planetas WHERE NombrePlaneta = '$planetaEnvio'), '$claveNave', '$nombreCompleto', '$numeroCelular', '$peso', '$planetaEnvio', '$planetaDestino', '$distanciaPlaneta', 'En espera', '$fechaEnvio', '$fechaEntrega')";

            if ($conn->query($sqlInsertarEnvio) === TRUE) {
                // Envío registrado correctamente
                echo '<script>';
                echo 'alert("Envio almacenado correctamente");';

                // Obtener datos usando el número de celular
                $sqlObtenerDatos = "SELECT * FROM envios WHERE NumeroCelular = '$numeroCelular' ORDER BY fechaEnvio DESC LIMIT 1";
                $resultObtenerDatos = $conn->query($sqlObtenerDatos);

                if ($resultObtenerDatos->num_rows > 0) {
                    $rowDatos = $resultObtenerDatos->fetch_assoc();
                    $matriculaEnvio = $rowDatos['Matricula'];  // Matricula generada automáticamente

                    // Imprimir los datos en el formulario
                    // Imprimir los datos en el formulario
                    echo 'document.getElementById("m").value = "' . $matriculaEnvio . '";';
                    echo 'document.getElementById("nc").value = "' . $rowDatos['NombreCompleto'] . '";';
                    echo 'document.getElementById("c").value = "' . $rowDatos['NumeroCelular'] . '";';
                    echo 'document.getElementById("P").value = "' . $rowDatos['Peso'] . '";';
                    echo 'document.getElementById("PlanetaEnvio1").value = "' . $rowDatos['PlanetaEnvio'] . '";';
                    echo 'document.getElementById("PlanetaDestino1").value = "' . $rowDatos['PlanetaDestino'] . '";';  // Cambié el ID aquí
                    echo 'document.getElementById("d").value = "' . $rowDatos['Distancia'] . '";';


                    // Continuar con otros campos según sea necesario
                }

                echo '</script>';
            } else {
                // Error al registrar el envío
                echo '<script>';
                echo 'alert("Error con el envío, si pasa más veces llamar a 5547599600");';
                echo 'window.location.replace("https://desarrolladorjrabraham.000webhostapp.com/space/index.html");';
                echo '</script>';
            }
        } else {
            // Nave ocupada en ese rango de fechas
            echo '<script>';
            echo 'alert("La nave está ocupada en ese rango de fechas");';
            echo '</script>';
        }
    } else {
        // Nave necesita recargarse
        echo '<script>';
        echo 'alert("La nave necesita recargarse");';
        echo '</script>';
    }
} else {
    // No hay naves disponibles
    echo '<script>';
    echo 'alert("No hay naves disponibles");';
    echo '</script>';
}

function obtenerDistanciaEntrePlanetas($planetaEnvio, $planetaDestino) {
    return 0;  // ¡Asegúrate de implementar esta función correctamente!
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Renta de salones y oficinas en la ciudad de México">
    <meta name="keywords" content="nubox, renta, salones, oficinas, renta de salones, renta de oficinas">
    <meta name="Abraham" content="Abraham">

    <!--Bootstrap-->
    <link rel="stylesheet" href="../../file/bootstrap/css/bootstrap.min.css">

    <!--Favicon-->
    <link rel="icon" href="../../file/imagenes/favicon.ico">
    
    <!--Titulo-->
    <title>SPACE LOGITICS</title>

    <!--Css propio-->
    <link rel="stylesheet" href="../../file/css/style-vr.css">

    <!-- Importacion de iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <!-- Proloader -->

    <div id="preloader-container">
        <img src="../../file/imagenes/cohete.gif" alt="Loading...">
    </div>

    <!-- Encabezado -->

    <div class="encabezado">
        <div class="encabezado-logo">
            <img src="../../file/imagenes/logo.png" class="imagen-encabezado">
        </div>
        <div class="encabezado-titulo">
            <h1>Hoja de Reporte</h1>
        </div>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-xl-4" style="width: 100%;">
                <p class="description">En el detallado informe de tu paquete interplanetario, encontrarás 
                    una presentación exhaustiva de su viaje más allá de nuestras fronteras 
                    terrestres. La hoja de reporte exhibe de manera clara y organizada la 
                    ruta específica que ha seguido tu envío, destacando hitos cruciales y 
                    ofreciendo un seguimiento en tiempo real de su ubicación actual. Podrás 
                    acceder a información clave sobre el estado del contenido de tu paquete, 
                    así como eventos significativos que hayan ocurrido durante su travesía interplanetaria.<br><br>

                    En particular, el informe revelará los detalles del combustible empleado, 
                    asegurando una administración eficiente de recursos y garantizando la seguridad 
                    en la entrega. La asignación de una clave única a tu paquete facilita el 
                    seguimiento meticuloso de cada fase, brindándote una comprensión completa 
                    de su progreso y situación. Esta herramienta avanzada de seguimiento no 
                    solo garantiza transparencia logística, sino que también te proporciona 
                    una experiencia personalizada, permitiéndote monitorizar cada aspecto del 
                    viaje de tu paquete con confianza y tranquilidad.</p>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-xl-4" style="width: 100%;">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Matricula de envío</label>
                        <input type="text" class="form-control" name="Matricula" id="m" style="background-color: #001f3f3d;;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre Completo</label>
                        <input type="text" class="form-control" name="NomCom" id="nc" style="background-color: #001f3f3d;;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Número celular</label>
                        <input type="number" class="form-control" name="celular" id="c" style="background-color: #001f3f3d;;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Peso del paquete</label>
                        <input type="number" class="form-control" name="Peso" id="P" style="background-color: #001f3f3d;;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Planeta Envío</label>
                        <input type="text" class="form-control" name="pe" id="PlanetaEnvio1" style="background-color: #001f3f3d;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Planeta Destino</label>
                        <input type="text" class="form-control" name="pr" id="PlanetaDestino1" style="background-color: #001f3f3d;" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Distancia</label>
                        <input type="text" class="form-control" id="d" name="Distancia1" style="background-color: #001f3f3d;" readonly>
                    </div>
                    <button type="button" class="btn btn-form" onclick="imprimirPantalla()">Imprimir</button>
                    <a href="../../index.html" class="btn btnButton">REGRESAR AL MENU</a>
                </form>
            </div>
        </div>
    </div>

    <!-- fooster -->

    <footer class="bg-light text-center text-lg-start" style="padding-top: 10px;">
        <div class="text-center p-3" style="background-color: #001F3F; color: #fff;">
          © 2023 Copyright: Ing. Abraham Vera Martinez 
        </div>
    </footer>

    <!--Librerias de js-->
    <script src="../../file/js/proloader.js"></script>
    <script src="../../file/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../file/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../file/bootstrap/js/popper.min.js"></script>
    <script src="../..file/js/animation.js"></script>
    <script>
        function imprimirPantalla() {
    window.print();
}
    </script>

    <!-- Llenar campos del formulario con datos PHP -->
    <script>
        document.getElementById("m").value = "<?php echo $matriculaEnvio; ?>";
        document.getElementById("nc").value = "<?php echo $nombreCompleto; ?>";
        document.getElementById("c").value = "<?php echo $numeroCelular; ?>";
        document.getElementById("P").value = "<?php echo $peso; ?>";
        document.getElementById("PlanetaEnvio1").value = "<?php echo $planetaEnvio; ?>";
        document.getElementById("PlanetaEnvio1").value = "<?php echo $planetaDestino; ?>";
        document.getElementById("d").value = "<?php echo $distanciaPlaneta; ?>";
    </script>
</body>
</html>
