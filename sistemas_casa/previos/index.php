<?php
$titulo = 'Previos';
include_once '../../app/config.inc.php';
include_once '../../app/Conexion.inc.php';
//include_once 'app/Usuario.inc.php';
//include_once 'app/RepositorioUsuario.inc.php';
//include_once 'app/ValidadorRegistro.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';
//include_once 'app/cn.php';
include_once '../../app/cn_casa.php';
//Para evitar registrar usuarios sin autorizacion
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
        <?php
        // Con este echo, colocamos el nombre de la pagina dentro del cuerpo de la misma, con ayuda de la 
        //variable $titulo
        echo "<title>$titulo</title>";
        ?>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
    </head>
    <body>
<?php
include_once '../../plantillas/navbar_index.php'; ?>
<!--
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
                        <li><a href="<?php echo RUTA_VISITAS ?>">Inicio visitas</a></li>
                        <li><a href="<?php echo RUTA_REGISTRADAS ?>">Visitas registradas</a></li>
                        <li><a href="<?php echo RUTA_HISTORICO ?>">Historico</a></li>
                        <li><a href="<?php echo RUTA_LOGIN_CIERRE ?>">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>-->


        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">
                                Reporte de previos
                            </h1>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <form role="form" method="post" action="previo_buscado?hori_inic&hor_fina">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <label>Fecha de inicio</label>
                                        <input required="required" type="date" required="required" value=''  class="form-control" id="hori_inic" name="hori_inic">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Fecha de inicio</label>
                                        <input required="required" type="date" value='' class="form-control" id="hor_atencion" id="hor_fina" name="hor_fina">
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-default btn-primary" name="Consultar">Consultar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" enctype="multipart/form-data" action="/previo_buscado.php">
                                <div id="collapseOne" class="">
                                    <div class="panel-body">
                                        <table class="table table-responsive" id="previos">
                                            <thead>
                                                <tr>
                                                    <th>REFERENCIA</th>
                                                    <th>PARTIDAS</th>
                                                    <th>TRAMITADOR</th>
                                                    <th>FECHA Y HORA DE INICIO</th>
                                                    <th>FECHA Y HORA DE FIN</th>
                                                    <th>TIEMPO USADO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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


