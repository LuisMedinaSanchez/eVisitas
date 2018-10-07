<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/redireccion.inc.php';
//include_once 'app/redireccion.inc.php';
//Vamos a comprobar que la variable nombre este iniciada, y que no este vacia
if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion :: redirigir(SERVIDOR);
}
$titulo = '¡Bienvenido!';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"></div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro correcto
            </div>
            <div class="panel-body text-center">
                <p>¡Gracias por registrarte <b><?php echo $nombre; ?></b>!</p>
                <br>
                <p><a href="<?php echo SERVIDOR?>">Inicia secion</a> Para comenzar a usar tu cuenta.</p>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>