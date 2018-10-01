<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'plantillas/navbar.inc.php';
?>


<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center"
                     <h4>Iniciar seción</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                          
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input tipe="email" name="email" id="email" class="form-control" placeholder="Introduce tu correo">
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <input type='password' name="clave" id="clave" class="form-control" placeholder="Contraseña">
                        <br>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Iniciar seción</button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center" >
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
    
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>