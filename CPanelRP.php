<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Renta de salones y oficinas en la ciudad de México">
    <meta name="keywords" content="nubox, renta, salones, oficinas, renta de salones, renta de oficinas">
    <meta name="Abraham" content="Abraham">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="file/bootstrap/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" href="file/imagenes/favicon.ico">
    
    <!-- Título -->
    <title>SPACE LOGITICS</title>

    <!-- CSS propio -->
    <link rel="stylesheet" href="file/css/style-vr.css">

    <!-- Importación de iconos -->
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

    <!-- Menu -->

    <section id="menu">
        <div class="container my3">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-xl-4" style="width: 100%;">
                    <h1>Reporte de planetas</h1>
                    <p>
                        En la siguiente tabla detallada, se proporcionarán las características específicas 
                        de los planetas que actualmente residen en nuestra base de datos. Cada entrada 
                        incluirá información esencial, como la distancia desde la estrella principal, 
                        el nombre del planeta, el tipo de combustible necesario para explorar o colonizar, 
                        y la clave única asignada a cada planeta para facilitar su identificación y seguimiento. 
                        Esta presentación estructurada permitirá a los usuarios obtener una visión completa y 
                        precisa de los datos relevantes para cada cuerpo celeste registrado, facilitando así 
                        la toma de decisiones informadas en sus exploraciones y actividades interplanetarias
                    </p>

                    <table id="tablaNaves" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id del planeta</th>
                                <th>Nombre del planeta</th>
                                <th>Distancia</th>
                                <th>Combustible</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "id21214233_abraham";
                            $password = "Abraham#15";
                            $dbname = "id21214233_spacelogitics";

                            // Crear conexión
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar conexión
                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }

                            // Consulta SQL para obtener los datos de la tabla
                            $sql = "SELECT * FROM planetas"; // Reemplaza "nombre_de_tu_tabla" con el nombre real de tu tabla
                            $result = $conn->query($sql);

                            // Verificar si hay resultados
                            if ($result->num_rows > 0) {
                                // Iterar sobre los resultados y generar las filas de la tabla
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["IdPlaneta"] . "</td>";
                                    echo "<td>" . $row["NombrePlaneta"] . "</td>";
                                    echo "<td>" . $row["Distancia"] . "</td>";
                                    echo "<td>" . $row["Combustible"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay datos disponibles</td></tr>";
                            }

                            // Cerrar la conexión
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- fooster -->
    

    <!-- Librerías de js -->
    <script src="file/js/proloader.js"></script>
    <script src="file/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="file/bootstrap/js/bootstrap.min.js"></script>
    <script src="file/bootstrap/js/popper.min.js"></script>
    <script src="file/js/animation.js"></script>
</body>
</html>
