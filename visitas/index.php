<?php
$titulo = 'Visitas';
//Esta hoja es para mostrar una barra de navegacion diferene a la del index y es para el menú principal
include_once 'plantillas/declaracion.php';
include_once '../plantillas/navbar_index.php';
include_once '../plantillas/navbar_opciones.php';
//Funciones de la pagina
Conexion::abrir_conexion();
$visitas = RepositorioUsuario :: obtener_todos(Conexion::obtener_conexion());
$visitas_falta = RepositorioUsuario :: obtener_falta_registro(Conexion::obtener_conexion());
$visitas_historico = RepositorioUsuario :: obtener_todos_historico(Conexion::obtener_conexion());
Conexion:: cerrar_conexion();
?>
<!--INICIO DE CODIGO HTML-->
<div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center" id="encabezado">
                <h3><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Visitas</h3> 
            </div>
            <div class="panel-body">
                <table class="table table-responsive text-center">
                    <thead>
                        <tr>
                            <th>Visitas activas</th>
                            <th>Registros incompletos</th>
                            <th>Total de visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo count($visitas); ?></td>
                            <td><?php echo count($visitas_falta); ?></td>
                            <td><?php echo count($visitas_historico); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    <div class="col-md-5"></div>
</div>
<?php
include_once 'plantillas/cierre.php';
?>