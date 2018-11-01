<?php
$titulo = "Inicio de sesión";
include_once './app/Conexion.inc.php';
include_once './app/ValidadorLogin.inc.php';
include_once './app/ControlSesion.inc.php';
include_once './app/redireccion.inc.php';
include_once './app/config.inc.php';
include_once './plantillas/a.php';
include_once './plantillas/navbar.php';
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
<?php
include_once './plantillas/z.php';
?>