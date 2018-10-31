<?php
$titulo = '¡Nos vemos!';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/redireccion.inc.php';
//con este if, cerramos secion al cargar la pagina de sesioncerrada.php
if (ControlSesion::sesion_iniciada()) {
    ControlSesion::cerrar_sesion();
}
include_once 'plantillas/declaracion_index.php';
include_once 'plantillas/navbar_index.php';
?>
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
<?php
include_once 'plantillas/cierre_index.php';
?>