<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistroVisitas.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/visita.inc.php';
//Para evitar registrar usuarios sin autorizacion
if(ControlSesion::sesion_iniciada()){
}else{
    Redireccion::redirigir(SERVIDOR);
}
if (isset($_POST['registrar'])) {
    //Hacemos conexion a la BD
    conexion::abrir_conexion();
    //Insertamos registros
        $visita = new visita('', $visita->obtener_fec_visita(), $visita->obtener_nom_visita(),$validador->Obtener_ide_oficial(),Obtener_per_visita(),obtener_asunto(),obtener_hor_visita(),obtener_observaciones(),obtener_hor_atencion(),obtener_tip_visita(),obtener_num_gafete(),obtener_fot_visita(),obtener_fot_ide_visita(),obtener_hor_salida());
        $visita_insertado = repositoriousuario::insertar_visita(conexion::obtener_conexion(), $visita);
        if ($visita_insertado) {
            //Redirigir a registro correcto
                Redireccion::redirigir(REGISTRO_CORRECTO . '?nombre='. $visita ->obtener_nom_visita());
        }
        conexion:: cerrar_conexion();
    }
    
    


//if (isset($_POST['registrar'])) {
//    //Hacemos conexion a la BD
//    conexion::abrir_conexion();
//    //Validamos con el validador de visitas
//    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'],
//            $_POST['clave1'], $_POST['clave2'], conexion::obtener_conexion());
//
//    if ($validador->registro_valido()) {
//        $usuario = new usuario('', $validador->obtener_nombre(),
//                $validador->obtener_email(),
//                password_hash($validador->obtener_clave(), PASSWORD_DEFAULT),
//                '',
//                '');
//        $usuario_insertado = repositoriousuario::insertar_usuario(conexion::obtener_conexion(), $usuario);
//        if ($usuario_insertado) {
//            //Redirigir a registro correcto
//            Redireccion::redirigir(REGISTRO_CORRECTO . '?nombre='. $usuario ->obtener_nombre());
//        }
//    }
//    
//    conexion:: cerrar_conexion();
//}





$titulo = 'Registro de visitas';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_inicio.inc.php';
?>

<div class="container">
    <h4 class="text-center">Registro de visitas</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce los datos de la visita
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
if (isset($_POST['registrar'])) {
    include_once 'plantillas/registro_visitas_validado.inc.php';
} else {
    include_once 'plantillas/registro_visitas_vacio.inc.php';
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