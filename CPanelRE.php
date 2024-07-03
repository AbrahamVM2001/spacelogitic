<?php
$servername = "localhost";
$username = "id21214233_abraham";
$password = "Abraham#15";
$dbname = "id21214233_spacelogitics";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function buscarEnvio($mysqli, $matricula) {
    $sql = "SELECT * FROM envios WHERE Matricula = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $matricula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $envio = $result->fetch_assoc();
    } else {
        $envio = null;
    }
    $stmt->close();
    return $envio;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar'])) {
    $matricula = $_POST['matricula'];
    $nuevoEstado = $_POST['nuevo_estado'];
    $sql = "UPDATE envios SET Estado = ? WHERE Matricula = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $nuevoEstado, $matricula);
    $stmt->execute();
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $matricula = $_POST['matricula'];
    $envio = buscarEnvio($mysqli, $matricula);
}
$mysqli->close();
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
    <link rel="stylesheet" href="file/bootstrap/css/bootstrap.min.css">

    <!--Favicon-->
    <link rel="icon" href="file/imagenes/favicon.ico">
    
    <!--Titulo-->
    <title>SPACE LOGITICS</title>

    <!--Css propio-->
    <link rel="stylesheet" href="file/css/style-vr.css">

    <!-- Importacion de iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <!-- Proloader -->

    <div id="preloader-container">
        <img src="file/imagenes/cohete.gif" alt="Loading...">
    </div>

    <!-- Encabezado -->
    <section id="inicio">    
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="file/imagenes/logo.png" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="CPanel.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CPanelRE.php">Reporte Envíos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CPanelRP.php">Reporte Planetas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CPanelRN.html">Reporte Naves</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html"><img src="file/imagenes/icono-cerrar.svg" class="login"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div div class="col-sm-12 col-md-4 col-xl-4" style="width: 100%;">
                    <h2>REPORTE ENVÍO</h2>
                    <p>Para acceder y visualizar la información detallada de un envío, simplemente necesitas la clave de 
                        identificación única asociada a dicho paquete. Esta clave sirve como una llave virtual que 
                        desbloquea una completa descripción de la carga, desde su contenido específico hasta su historial 
                        de movimientos y ubicaciones. Además, te permite conocer en tiempo real el estatus actualizado del 
                        envío, brindando una experiencia transparente y eficiente en el seguimiento de paquetes. Este 
                        sistema de identificación asegura la privacidad y seguridad de la información, garantizando que 
                        solo los usuarios autorizados puedan acceder a los detalles completos de cada envío.</p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Matricula de envio</label>
                            <input type="text" class="form-control" name="matricula" id="formGroupExampleInput" placeholder="Ejem. 1" style="background-color: #001f3f3d;">
                        </div>
                        <center>
                            <button type="submit" class="btn btn-form" name="buscar">Buscar</button>
                        </center>
                    </form>
                    <?php if (!empty($envio)) : ?>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <table id="tablaNaves" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id Planeta</th>
                                    <th>Clave Nave</th>
                                    <th>Nombre completo</th>
                                    <th>Numero celular</th>
                                    <th>Peso</th>
                                    <th>Planeta Envio</th>
                                    <th>Planeta Entrega</th>
                                    <th>Distancia</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $envio["IdPlaneta"]; ?></td>
                                    <td><?php echo $envio["ClaveNave"]; ?></td>
                                    <td><?php echo $envio["NombreCompleto"]; ?></td>
                                    <td><?php echo $envio["NumeroCelular"]; ?></td>
                                    <td><?php echo $envio["Peso"]; ?></td>
                                    <td><?php echo $envio["PlanetaEnvio"]; ?></td>
                                    <td><?php echo $envio["PlanetaDestino"]; ?></td>
                                    <td><?php echo $envio["Distancia"]; ?></td>
                                    <td><input type="text" class="form-control" id="estado" name="nuevo_estado" value="<?php echo $envio["Estado"]; ?>" style="background-color: #001f3f3d;"></td>
                                    <td>
                                        <input type="hidden" name="matricula" value="<?php echo $envio["Matricula"]; ?>">
                                        <button type="submit" class="btn btn-form" name="editar">Guardar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) : ?>
                        <p>No se encontraron envíos con la matrícula especificada.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <script src="file/js/proloader.js"></script> 
    <script src="file/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="file/bootstrap/js/bootstrap.min.js"></script>
    <script src="file/bootstrap/js/popper.min.js"></script>
    <script src="file/js/animation.js"></script>
</body>

</html>
