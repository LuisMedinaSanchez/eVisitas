<?php
include_once '../app/Conexion.inc.php';
include_once '../app/RepositorioUsuario.inc.php';
include_once '../app/config.inc.php';
include_once '../app/RepositorioUsuario.inc.php';
include_once '../app/ValidadorLogin.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/Usuario.inc.php';
include_once '../app/ValidadorRegistro.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/cn.php';

if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="http://transpheric.com/Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        echo "<title>$titulo</title>"; //titulo de la pagina
        ?>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>