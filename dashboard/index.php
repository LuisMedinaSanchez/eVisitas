<?php
include_once '../app/config.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/Conexion.inc.php';
include_once '../plantillas/navbar_index.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
        
        <?php 
        include_once '../plantillas/navbar_opciones.php';
        ?>


        <script src="../js/jquery.min.js"></script>       
        <script src="../js/bootstrap.min.js"></script> 
        <script src="../js/tableToExcel.js"></script>
        <br>
        <br>
        <footer>
            <div class="container">
                <div >
                    <div class="text-center" class="jumbotron">
                        TC-F-BV-01, Octubre 2018, Rev. 1    
                    </div>
                    <div class="text-center" class="copyright"> 2018 &copy; Luis Medina. </div>
                </div>
            </div>
        </footer>

    </body>
</html>