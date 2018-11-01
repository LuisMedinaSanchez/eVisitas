<?php

include_once '../../app/cn.php';
include_once '../../app/config.inc.php';
include_once '../../app/Usuario.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';
$id_visitas = $_REQUEST['id_visitas'];
$nom_visita = $_POST['hor_salida'];

$salir ="
        UPDATE visitas SET hor_salida='$hor_salida'
        WHERE id_visitas = '$id_visitas'";
$resultado = mysqli_query($conexion, $salir);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    echo 'registrarse';
    Redireccion::redirigir(REGISTRO_CORRECTO . '?nombre=' . $nom_visita);
}
mysqli_close($conexion);
?>