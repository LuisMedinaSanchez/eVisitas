<?php

include_once 'cn.php';
include_once 'config.inc.php';
include_once 'Usuario.inc.php';
include_once 'redireccion.inc.php';
include_once 'ControlSesion.inc.php';

$nom_visita = $_POST['nom_visita'];
$ide_oficial = $_POST['ide_oficial'];
$per_visita = $_POST['per_visita'];
$asunto = $_POST['asunto'];
$hor_visita = $_POST['hor_visita'];
$observaciones = $_POST['observaciones'];
$hor_atencion = $_POST['hor_atencion'];
$tip_visita = $_POST['tip_visita'];
$num_gafete = $_POST['num_gafete'];
$fot_visita = $_POST['fot_visita'];
$fot_ide_visita = $_POST['fot_ide_visita'];
//$hor_salida = $_POST['hor_salida'];


$insertar = "INSERT INTO visitas (fec_visita,nom_visitas,ide_oficial,per_visita,asunto,hor_visita,observaciones,hor_atencion,tip_visita,num_gafete,fot_visita,fot_ide_visita,hor_salida,activo)
             VALUES              (NOW(),'$nom_visita','$ide_oficial','$per_visita','$asunto','$hor_visita','$observaciones','$hor_atencion','$tip_visita','$num_gafete','$fot_visita','$fot_ide_visita','00:00:00',1)";
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    Redireccion::redirigir(REGISTRO_CORRECTO . '?nombre=' . $nom_visita);
}
mysqli_close($conexion);
?>