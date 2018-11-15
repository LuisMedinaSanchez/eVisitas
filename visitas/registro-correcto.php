<?php
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/config.inc.php';
//Vamos a comprobar que la variable nombre este iniciada, y que no este vacia
if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    echo '';
}
?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="/Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="10;url=http://192.168.1.1:81/visitas/nueva_visita" />
        <title>¡Bienvenido a Transpheric!</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
                        <span class="sr-only">Este boton despliega la barra de navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="/resources/logo_TP.png">
                </div>
                <div id="navbar" class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro correcto
                        </div>
                        <div class="panel-body text-center">
                            <p>¡<b><?php echo $nombre; ?></b> Bienvenido a la familia Transpheric! Esperamos tengas una grata visita...</p>
                            <br>
                            <p>Redireccionando en 10 segundos para <a href="<?php echo RUTA_VISITAS1 ?>">añadir otra visita</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <script src="../js/jquery.min.js"></script>       
        <script src="../js/bootstrap.min.js"></script> 
        <script src="../js/tableToExcel.js"></script>
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
        <br>
    </body>
</html>
<?php
//sleep(5);
//Redireccion :: redirigir(RUTA_VISITAS1);
?>