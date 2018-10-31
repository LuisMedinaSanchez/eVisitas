<?php
$titulo = "Inicio de sesión";
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/config.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/cn.php';
?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        echo "<title>$titulo</title>";
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
        <?php
        if (isset($_POST['login'])) {
            conexion::abrir_conexion();

            $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], conexion::obtener_conexion());
            //Con esto validamos que el usuario y contraseña esten correctos
            if ($validador->obtener_error() === '' &&
                    !is_null($validador->obtener_usuario())) {
                //si son correctos el login, se controla la sesion
                ControlSesion::iniciar_sesion(
                        $validador->obtener_usuario()->obtener_id_usuario(), $validador->obtener_usuario()->obtener_nombre());
                Redireccion::redirigir(RUTA_DASHBOARD);
            }
            Conexion::cerrar_conexion();
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Ingresa a tu cuenta</h4>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                <?php
                                if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                                    echo 'value="' . $_POST['email'] . '"';
                                }
                                ?>required autofocus>
                                <br>
                                <label for="clave" class="sr-only">Contraseña</label>
                                <input type='password' name="clave" id="clave" class="form-control" placeholder="Contraseña">
                                <br>
                                <?php
                                if (isset($_POST['login'])) {
                                    $validador->mostrar_error();
                                }
                                ?>
                                <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
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