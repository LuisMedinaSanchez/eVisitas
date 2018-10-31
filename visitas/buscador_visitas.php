<?php
$titulo = 'Busqueda de visitas';
include_once '../app/config.inc.php';
include_once '../app/Conexion.inc.php';
include_once '../app/Usuario.inc.php';
include_once '../app/RepositorioUsuario.inc.php';
include_once '../app/ValidadorRegistro.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/cn.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
include_once 'plantillas/declaracion.php';
include_once '../plantillas/navbar_index.php';
include_once '../plantillas/navbar_opciones.php';


?>


        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-center"></div>
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Buscador de visitantes
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" enctype="multipart/form-data" action="buscar_visita?nom_visita">
                                    <div id="collapseOne" class="">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input required="required" type="text" value='' class="form-control" name="nom_visita" placeholder="Nombre de visita">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <br>                            
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-default btn-primary btn-lg" name="registrar">Buscar visita</button>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <h4><a href="<?php echo RUTA_VISITAS ?>">Cancelar</a> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center"></div>
                </div>
            </div>
        </div>
<?php
//incluimos la parte para cerrar el cuerpo de la pagina para no tener que volver a meter codigo
include_once 'plantillas/cierre.php';
?>


