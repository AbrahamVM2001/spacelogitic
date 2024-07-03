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

    <div class="encabezado">
        <div class="encabezado-logo">
            <img src="file/imagenes/logo.png" class="imagen-encabezado">
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
                        <input type="text" class="form-control" name="Matricula" id="Matricula1"  style="background-color: #001f3f3d;;">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre Completo</label>
                        <input type="text" class="form-control" name="NomCom" id="NomCom1"  style="background-color: #001f3f3d;;">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Número celular</label>
                        <input type="number" class="form-control" name="celular" id="celular1" style="background-color: #001f3f3d;;">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Peso del paquete</label>
                        <input type="number" class="form-control" name="Peso" id="Peso1" style="background-color: #001f3f3d;;">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Planeta Envío</label>
                        <input type="text" class="form-control" name="PlanetaEnvio" id="PlanetaEnvio1" style="background-color: #001f3f3d;">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Planeta Destino</label>
                        <input type="text" class="form-control" name="PlanetaEnvio" id="PlanetaEnvio1" style="background-color: #001f3f3d;">
                    </div>
                
                    <div class="form-group">
                        <label for="inputState">Distancia</label>
                        <input type="text" class="form-control" id="Distancia" name="Distancia1" style="background-color: #001f3f3d;" readonly>
                    </div>
                    <button type="button" class="btn btn-form" onclick="imprimirPantalla()">Imprimir</button>
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
    <script src="file/js/proloader.js"></script>
    <script src="file/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="file/bootstrap/js/bootstrap.min.js"></script>
    <script src="file/bootstrap/js/popper.min.js"></script>
    <script src="file/js/animation.js"></script>
    <script src="file/js/imprimir.js"></script>
</body>
</html>
