<?php

$titulo = 'Despedida de visitas';
include_once 'config.inc.php';
include_once 'Conexion.inc.php';
include_once 'RepositorioUsuario.inc.php';
include_once 'redireccion.inc.php';
include_once 'ControlSesion.inc.php';
include_once 'Usuario.inc.php';
include_once 'cn.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
$id_visitas = $_REQUEST['id_visitas'];

$salir = "UPDATE visitas SET activo = 0 WHERE id_visitas = '$id_visitas'";
$resultado = mysqli_query($conexion, $salir);
if (!$resultado) {
    echo 'Error al registrar hora de salida';
} else {
    $salir_fecha = "UPDATE visitas SET hor_salida = Now() WHERE id_visitas = '$id_visitas'";
    $resultado_fecha = mysqli_query($conexion, $salir_fecha);
    if (!$resultado_fecha) {
    echo 'Error al registrar fecha de salida';
} else {
    echo 'Salida de visita';
}
    Redireccion::redirigir(RUTA_SESION_INICIADA);
}
mysqli_close($conexion);
?>