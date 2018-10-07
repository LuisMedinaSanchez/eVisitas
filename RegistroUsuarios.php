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
if (isset($_POST['enviar'])) {
    //al escribir :: decimos que vamos a usar un metodo dentro del archivo
    conexion::abrir_conexion();
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'],
            $_POST['clave1'], $_POST['clave2'], conexion::obtener_conexion());

    if ($validador->registro_valido()) {
        $usuario = new usuario('', $validador->obtener_nombre(),
                $validador->obtener_email(),
                password_hash($validador->obtener_clave(), PASSWORD_DEFAULT),
                '',
                '');
        $usuario_insertado = repositoriousuario::insertar_usuario(conexion::obtener_conexion(), $usuario);
        if ($usuario_insertado) {
            //Redirigir a registro correcto
            Redireccion::redirigir(REGISTRO_CORRECTO . '?nombre='. $usuario ->obtener_nombre());
        }
    }
    
    conexion:: cerrar_conexion();
}
$titulo = 'Registro de usuarios';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_inicio.inc.php';
?>

<div class="container">
    <h4 class="text-center">Registro de usuarios</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce los datos del nuevo usuario
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
if (isset($_POST['enviar'])) {
    include_once 'plantillas/registro_validado.inc.php';
} else {
    include_once 'plantillas/registro_vacio.inc.php';
}
?>

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