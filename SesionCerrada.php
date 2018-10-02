<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/redireccion.inc.php';
if (ControlSesion::sesion_iniciada()) {
    ControlSesion::cerrar_sesion();
}
$titulo = '¡Nos vemos!';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"></div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sesión Cerrada !
            </div>
            <div class="panel-body text-center">
                <br>
                <p>volver al <a href="<?php echo SERVIDOR ?>">Inicio</a> o <a href="<?php echo RUTA_LOGIN ?>">Inicia secion</a> para usar tu cuenta.</p>
            </div>
        </div>
    </div>
</div>     
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>