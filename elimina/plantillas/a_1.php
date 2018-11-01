<?php
include_once '../../app/ControlSesion.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/cn_casa.php';
include_once '../../app/config.inc.php';

if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="../../resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        echo "<title>$titulo</title>"; //titulo de la pagina
        ?>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
    </head>
    <body>