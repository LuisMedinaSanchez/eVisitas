<?php
$titulo = 'Registro de visitas';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/cn.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_inicio.inc.php';


    $id_visitas = $_REQUEST['id_visitas'];
    $sql = "SELECT * FROM visitas WHERE id_visitas = '$id_visitas' ";
    $resultado = mysqli_query($conexion, $sql);

    $mostrar = $resultado->fetch_assoc();
?>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center"></div>
            <div class="col-md-6 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Salida de visitante
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data" action="app/despedida.php?id_visitas=<?php echo $mostrar['id_visitas'];?>">
                            <div id="collapseOne" class="">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Nombre de visita</label>
                                                <input disabled type="text" value='<?php echo $mostrar['nom_visitas']; ?>' class="form-control" name="nom_visita">
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
                                        <button type="submit" class="btn btn-default btn-primary btn-lg" name="registrar">Despedir visita</button>
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
include_once 'plantillas/documento-cierre.inc.php';
?>