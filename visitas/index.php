<?php
$titulo = 'Visitas';
include_once '../app/Conexion.inc.php';
include_once '../app/ValidadorLogin.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/config.inc.php';
include_once '../plantillas/a.php';
include_once '../plantillas/navbar.php';
Conexion::abrir_conexion();
//Array de pesonas activas
$visitas = RepositorioUsuario :: obtener_todos(Conexion::obtener_conexion());
//Array de registros sin terminar
$visitas_falta = RepositorioUsuario :: obtener_falta_registro(Conexion::obtener_conexion());
//Array de todas las visitas
$visitas_historico = RepositorioUsuario :: obtener_todos_historico(Conexion::obtener_conexion());
Conexion:: cerrar_conexion();
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
?>
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
include_once '../plantillas/z.php';
?>