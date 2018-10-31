<?php
$titulo = 'Salida de visitas';
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
//Para colocar el titulo en la pagina

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
                        Visitas del día.
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
                                            <th>Hora de visita:</th>
                                            <th>Tipo de visita</th>
                                            <th>Gafete</th>
                                            <th>Foto</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="SELECT 	id_visitas, fec_visita, nom_visitas, per_visita, asunto, hor_visita, tip_visita, num_gafete, fot_visita, fot_ide_visita FROM visitas WHERE activo = 1";
                                        $resultado= mysqli_query($conexion,$sql);
                                        
                                        while ($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td><?php echo $mostrar['nom_visitas']?></td>
                                            <td><?php echo $mostrar['per_visita']?></td>
                                            <td><?php echo $mostrar['asunto']?></td>
                                            <td><?php echo $mostrar['hor_visita']?></td>
                                            <td><?php echo $mostrar['tip_visita']?></td>
                                            <td><?php echo $mostrar['num_gafete']?></td>
                                            <td><a href="<?php echo $mostrar['fot_visita']?>" target=”_blank”><img width="75" src="<?php echo $mostrar['fot_visita']?>"/></a></td>
                                            <td><a href="modificar?id_visitas=<?php echo $mostrar['id_visitas'];?>">Modificar</a></td>
                                            <td><a href="salida?id_visitas=<?php echo $mostrar['id_visitas'];?>">Salida</a></td>
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
