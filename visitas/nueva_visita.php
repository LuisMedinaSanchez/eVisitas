<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="/Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>¡Bienvenido!</title>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Introduce tus datos.
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" enctype="multipart/form-data" action="app/registrar.php">
                                    <div id="collapseOne" class="">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-4">
                                                        <input type="text" required="required" value='' class="form-control" id="nom_visita" name="nom_visita" placeholder="Nombre completo *">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="email" required="required" value='' class="form-control" id="mail_visita" name="mail_visita" placeholder="Cuenta de correo *">
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-4">
                                                        <input type="text" required="required" value='' class="form-control" id="per_visita" name="per_visita" placeholder="Persona a quien visitas *">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" required="required" value='' class="form-control" id="asunto" name="asunto" placeholder="Asunto *">
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <br>
                                                <div class="form-group">
                                                    <div class="col-md-2" ></div>
                                                    <div class="col-md-8">
                                                        <label type="button" class="btn btn-danger">
                                                            <input required="required" id="fot_visita" capture="camera" accept="image/*" name='fot_visita' type="file" title="Foto" style="display:none">
                                                            <span class="glyphicon glyphicon-camera" aria-hidden="true"></span> ¡Regalanos una foto tuya! *
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2" ></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <br>
                                                <div class="form-group">
                                                    <div class="col-sm-4" ></div>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="opciona" id="opta" required> 
                                                    </div>
                                                    <div class="col-sm-4" >
                                                        Acepto las <a href="http://transpheric.com/aviso_privacidad.html" target="_blank"><strong>Politicas de privacidad</strong></a>
                                                    </div>
                                                    <div class="col-sm-3" ></div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-default btn-primary btn-lg" name="registrar">Enviar</button>
                                                        <br>
                                                        <h4><a href="/visitas/nueva_visita">Limpiar formulario</a> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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