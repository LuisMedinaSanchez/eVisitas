<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
//Para evitar registrar usuarios sin autorizacion
if(ControlSesion::sesion_iniciada()){
}else{
    Redireccion::redirigir(SERVIDOR);
}

$titulo = 'Salida de visitas';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_inicio.inc.php';
?>

<div class="container">
    <h4 class="text-center">Pagina en contruccion</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Pagina en contruccion
                    </h3>
                </div>
                <div class="panel-body">
                    

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
//incluimos la parte para cerrar el cuerpo de la pagina para no tener que volver a meter codigo
include_once 'plantillas/documento-cierre.inc.php';
?>
