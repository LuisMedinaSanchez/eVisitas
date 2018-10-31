<?php

include_once '../../app/cn.php';
include_once '../../app/config.inc.php';
include_once '../../app/Usuario.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';

$nom_visita = $_POST['nom_visita'];
$ide_oficial = $_POST['ide_oficial'];
$per_visita = $_POST['per_visita'];
$asunto = $_POST['asunto'];
$observaciones = $_POST['observaciones'];
$hor_atencion = $_POST['hor_atencion'];
$tip_visita = $_POST['tip_visita'];
$num_gafete = $_POST['num_gafete'];

$nom_fot_visita = $_FILES['fot_visita']['name'];
$tip_fot_imagen = $_FILES['fot_visita']['type'];
$tam_fot_imagen = $_FILES['fot_visita']['size'];
$carpeta_destino= $_SERVER['DOCUMENT_ROOT']. '/transpheric/visitas/fotos/';
$carpeta_remoto= 'fotos/';
move_uploaded_file($_FILES['fot_visita']['tmp_name'],$carpeta_destino.$nom_fot_visita);
$fot_visita = $carpeta_remoto.$nom_fot_visita;




$nom_fot_ide_visita = $_FILES['fot_ide_visita']['name'];
$tip_fot_ide_imagen = $_FILES['fot_ide_visita']['type'];
$tam_fot_ide_imagen = $_FILES['fot_ide_visita']['size'];
//$fot_ide_visita = $_POST['fot_ide_visita'];
$carpeta_destino= $_SERVER['DOCUMENT_ROOT']. '/transpheric/visitas/fotos/';
$carpeta_remoto= 'fotos/';
move_uploaded_file($_FILES['fot_ide_visita']['tmp_name'],$carpeta_destino.$nom_fot_ide_visita);
//$fot_visita = $carpeta_destino.$nom_fot_ide_visita;
$fot_ide_visita= $carpeta_remoto.$nom_fot_ide_visita;

$insertar = "INSERT INTO visitas (fec_visita,nom_visitas,ide_oficial,per_visita,asunto,observaciones,hor_atencion,tip_visita,num_gafete,fot_visita,fot_ide_visita,activo)
             VALUES              (NOW(),'$nom_visita','$ide_oficial','$per_visita','$asunto','$observaciones','$hor_atencion','$tip_visita','$num_gafete','$fot_visita','$fot_ide_visita',1)";
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    Redireccion::redirigir(RUTA_REGISTRADAS);
}
mysqli_close($conexion);
?>