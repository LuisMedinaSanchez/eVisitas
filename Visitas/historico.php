<?php
$titulo = 'Historico de visitas';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/cn.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_inicio.inc.php';
?>

<br>



<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Visitas a Transpheric Logistics
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="app/registrar.php">
                        <div id="collapseOne" class="">
                            <div class="panel-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Nombre de visita</th>
                                            <th>Persona a quien visita</th>
                                            <th>Asunto</th>
                                            <th>Fecha</th>
                                            <th>Hora de visita:</th>
                                            <th>Hora de atencion:</th>
                                            <th>Fecha y hora de salida:</th>
                                            <th>Tipo de visita</th>
                                            <td>Gafete</td>
                                            <td>Foto</td>
                                            <td>Credencial</td>
                                            <td>Volver a registrar</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="SELECT * FROM visitas WHERE activo = 0 ";
                                        $resultado= mysqli_query($conexion,$sql);
                                        
                                        while ($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td><?php echo $mostrar['nom_visitas']?></td>
                                            <td><?php echo $mostrar['per_visita']?></td>
                                            <td><?php echo $mostrar['asunto']?></td>
                                            <td><?php echo $mostrar['fec_visita']?></td>
                                            <td><?php echo $mostrar['hor_visita']?></td>
                                            <td><?php echo $mostrar['hor_atencion']?></td>
                                            <td><?php echo $mostrar['hor_salida']?></td>
                                            <td><?php echo $mostrar['tip_visita']?></td>
                                            <td><?php echo $mostrar['num_gafete']?></td>
                                            <td><a href="<?php echo $mostrar['fot_visita']?>" target=”_blank”><img width="75" src="<?php echo $mostrar['fot_visita']?>"/></a></td>
                                            <td><a href="<?php echo $mostrar['fot_ide_visita']?>" target=”_blank”><img width="75" src="<?php echo $mostrar['fot_ide_visita']?>"/></a></td>
                                            <td><a href="volver_registrar?id_visitas=<?php echo $mostrar['id_visitas'];?>">Registrar</a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//incluimos la parte para cerrar el cuerpo de la pagina para no tener que volver a meter codigo
include_once 'plantillas/documento-cierre.inc.php';
?>

