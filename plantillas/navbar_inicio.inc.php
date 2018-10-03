<?php
//Esta hoja es para mostrar una barra de navegacion diferene a la del index
// Abrir conexion usando el metodo abrir_conexion dentro del archivo Conexion.inc.php
Conexion::abrir_conexion();
$usuarios = RepositorioUsuario :: obtener_todos(Conexion::obtener_conexion());
Conexion:: cerrar_conexion();
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
                <span class="sr-only">Este boton despliega la barra de nabegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="http://transpheric.com/dd/public/frontend/img/logo.png">
        </div>
        <div id="navbar" class="navbar-collapse collapse" >

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo RUTA_SESION_INICIADA ?>">Regresar</a></li>
                <li><a href="<?php echo RUTA_LOGIN_CIERRE ?>">Cerrar sesión</a></li>
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span><li>Visitas activas: </li><?php echo count($usuarios); ?>
            </ul>
        </div>
    </div>
</nav>
