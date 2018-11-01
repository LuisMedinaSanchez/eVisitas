<?php
$titulo = '¡Bienvenido a Transpheric!';
include_once '../app/Conexion.inc.php';
include_once '../app/ValidadorLogin.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/config.inc.php';
include_once '../app/cn.php';
include_once '../plantillas/a.php';
include_once '../plantillas/navbar.php';
//Vamos a comprobar que la variable nombre este iniciada, y que no este vacia
if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion :: redirigir(SERVIDOR);
}
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro correcto
                        </div>
                        <div class="panel-body text-center">
                            <p>¡<b><?php echo $nombre; ?></b> te has registrado correctamente!</p>
                            <br>
                            <p><a href="<?php echo RUTA_VISITAS1 ?>">Añadir otra visita</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include_once '../plantillas/z.php';
?>