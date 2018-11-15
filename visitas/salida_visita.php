<?php
$titulo = 'Salida de visitas';
include_once '../app/Conexion.inc.php';
include_once '../app/ValidadorLogin.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/config.inc.php';
include_once '../app/cn.php';
include_once '../plantillas/a.php';
include_once '../plantillas/navbar.php';
include_once '../plantillas/navbar_opciones.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
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
                                <form role="form" method="post" enctype="multipart/form-data" action="app/despedida.php?id_visitas=<?php echo $mostrar['id_visitas']; ?>">
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
                                            <br>
                                            <div class="col-md-12">
                                                <h4><a href="<?php echo RUTA_REGISTRADAS ?>">Cancelar</a> </h4>
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
include_once '../plantillas/z.php';
?>