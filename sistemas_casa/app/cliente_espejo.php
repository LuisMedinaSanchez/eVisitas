<?php

include_once '../../app/config.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';
include_once '../../app/cn_casa.php';

if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable

$sql = "
update saaio_pedime p set p.cve_impo='GA743' where p.cve_impo='I03206'
";
$resultado = ibase_query($conexion_casa, $sql);

if (!$resultado) {
    echo 'Error al reparar en SAAI I03206';
} else {
    
}

$sql1 = "
update ctrao_embar t set t.cve_impo='GA743' where t.cve_impo='I03206'
";
$resultado1 = ibase_query($conexion_casa, $sql1);

if (!$resultado1) {
    echo 'Error al reparar en CTRA I03206';
} else {
    
}



$sql2 = "
update saaio_pedime p set p.cve_impo='GA745' where p.cve_impo='I03257'
";
$resultado2 = ibase_query($conexion_casa, $sql2);

if (!$resultado2) {
    echo 'Error al reparar en SAAI I03257';
} else {
    
}

$sql3 = "
update ctrao_embar t set t.cve_impo='GA745' where t.cve_impo='I03257'
";
$resultado3 = ibase_query($conexion_casa, $sql3);

if (!$resultado3) {
    echo 'Error al reparar en CTRA I03257';
} else {
    
}


    Redireccion::redirigir(RUTA_DASHBOARD);

?>
