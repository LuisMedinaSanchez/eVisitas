<?php
$titulo = 'Sesión iniciada';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/nanbar_sesion_iniciada.inc.php';
include_once 'app/config.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" id="encabezado">
                <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Registro de visitas 
            </div>
            <div class="panel-body">
                <ul>
                    <li class="itemIndice">
                        <a class="enlace" href="<?php echo RUTA_REGISTRO_VISITAS ?>" >Registro de visitas</a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_SALIDA_VISITAS ?>">Salida de visitas</a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_HISTORICO_VISITAS ?>">Historico</a>
                    </li>
                </ul>
            </div>
        </div>    
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" id="encabezado">
                <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Reportes  
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <a href="<?php echo RUTA_PREVIOS ?>">Reporte de previos</a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_REMESAS ?>">Remesas Toluca</a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_CLIENTE_ESPEJO ?>">Reparar claves de cliente</a>
                    </li>
                </ul>
            </div>
        </div>    
    </div>
    <div class="col-md-3"></div>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>