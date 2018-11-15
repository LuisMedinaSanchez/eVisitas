<?php

include_once '../../app/cn.php';
include_once '../../app/config.inc.php';
include_once '../../app/Usuario.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';

$nom_visita = $_POST['nom_visita'];
$mail_visita = $_POST['mail_visita'];
$per_visita = $_POST['per_visita'];
$asunto = $_POST['asunto'];

$nom_fot_visita = $_FILES['fot_visita']['name'];
$tip_fot_imagen = $_FILES['fot_visita']['type'];
$tam_fot_imagen = $_FILES['fot_visita']['size'];
$carpeta_destino= $_SERVER['DOCUMENT_ROOT']. '/visitas/fotos/';
$carpeta_remoto= 'fotos/';
move_uploaded_file($_FILES['fot_visita']['tmp_name'],$carpeta_destino.$nom_fot_visita);
$fot_visita = $carpeta_remoto.$nom_fot_visita;

$insertar = "INSERT INTO visitas (fec_visita,nom_visitas,mail_visita,per_visita,asunto,fot_visita,activo)
             VALUES              (NOW(),'$nom_visita','$mail_visita','$per_visita','$asunto','$fot_visita',1)";
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    Redireccion::redirigir(REGISTRO_CORRECTO . '?nombre=' . $nom_visita);
}
mysqli_close($conexion);
?>