<?php
$titulo = '¡Nos vemos!';
include_once 'app/config.inc.php';
include_once 'app/ControlSesion.inc.php';
//con este if, cerramos secion al cargar la pagina de sesioncerrada.php
if (ControlSesion::sesion_iniciada()) {
    ControlSesion::cerrar_sesion();
}

?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="http://transpheric.com/Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        echo "<title>$titulo</title>"; //titulo de la pagina
        ?>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
                        <span class="sr-only">Este boton despliega la barra de nabegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="http://transpheric.com/dd/public/frontend/img/logo.png">
                </div>
                <div id="navbar" class="navbar-collapse collapse" >

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo SERVIDOR ?>">Iniciar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" class="text-center">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> ¡Sesión cerrada!
                        </div>
                        <div class="panel-body text-center">
                            <br>
                            <p>volver al <a href="http://transpheric.com">Inicio</a> o <a href="<?php echo SERVIDOR ?>">Inicia sesión</a> para usar tu cuenta.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>       
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/tableToExcel.js"></script>
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