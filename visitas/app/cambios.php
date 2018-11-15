<?php

include_once '../../app/cn.php';
include_once '../../app/config.inc.php';
include_once '../../app/Usuario.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';

$id_visitas = $_REQUEST['id_visitas'];
$nom_visita = $_POST['nom_visita'];
$mail_visita = $_POST['mail_visita'];
$ide_oficial = $_POST['ide_oficial'];
$per_visita = $_POST['per_visita'];
$asunto = $_POST['asunto'];
$observaciones = $_POST['observaciones'];
$hor_atencion = $_POST['hor_atencion'];
$tip_visita = $_POST['tip_visita'];
$num_gafete = $_POST['num_gafete'];


$nom_fot_ide_visita = $_FILES['fot_ide_visita']['name'];
$tip_fot_ide_visita = $_FILES['fot_ide_visita']['type'];
$tam_fot_ide_visita = $_FILES['fot_ide_visita']['size'];
$carpeta_destino= $_SERVER['DOCUMENT_ROOT']. '/visitas/fotos/';
$carpeta_remoto= 'fotos/';
move_uploaded_file($_FILES['fot_ide_visita']['tmp_name'],$carpeta_destino.$nom_fot_ide_visita);
$fot_ide_visita = $carpeta_remoto.$nom_fot_ide_visita;


$insertar = "
        UPDATE      visitas
        SET nom_visitas=    '$nom_visita',
        mail_visita=        '$mail_visita',
        ide_oficial=        '$ide_oficial',
        per_visita=         '$per_visita',
        asunto=             '$asunto',
        observaciones=      '$observaciones',
        hor_atencion=       '$hor_atencion',
        tip_visita=         '$tip_visita',
        num_gafete=         '$num_gafete',
        fot_ide_visita=     '$fot_ide_visita'
        WHERE id_visitas = '$id_visitas'";

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo "Error al registrarse";
} else {
    Redireccion::redirigir(RUTA_REGISTRADAS);
}
mysqli_close($conexion);
?>