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
            <a title="Inicio" href="http://www.transpheric.com"><img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="http://transpheric.com/dd/public/frontend/img/logo.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" >
            
            <ul class="nav navbar-nav navbar-right">
              
            </ul>
        </div>
    </div>
</nav>
