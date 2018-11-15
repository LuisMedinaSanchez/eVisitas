<?php

include_once '../../app/cn.php';
include_once '../../app/config.inc.php';
include_once '../../app/Usuario.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';

$nom_visita = $_POST['nom_visita'];
$mail_visita = $_POST['mail_visita'];
$ide_oficial = $_POST['ide_oficial'];
$per_visita = $_POST['per_visita'];
$asunto = $_POST['asunto'];
$observaciones = $_POST['observaciones'];
$hor_atencion = $_POST['hor_atencion'];
$tip_visita = $_POST['tip_visita'];
$num_gafete = $_POST['num_gafete'];
$fot_visita = $_POST['fot_visita'];
$fot_ide_visita= $_POST['fot_ide_visita'];

$insertar = "INSERT INTO visitas (fec_visita,nom_visitas,mail_visita,ide_oficial,per_visita,asunto,observaciones,hor_atencion,tip_visita,num_gafete,fot_visita,fot_ide_visita,activo)
             VALUES              (NOW(),'$nom_visita','$mail_visita','$ide_oficial','$per_visita','$asunto','$observaciones','$hor_atencion','$tip_visita','$num_gafete','$fot_visita','$fot_ide_visita',1)";
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    Redireccion::redirigir(RUTA_REGISTRADAS);
}
mysqli_close($conexion);
?>
