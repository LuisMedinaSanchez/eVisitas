<?php
$titulo = 'Visitas registradas';
include_once '../app/Conexion.inc.php';
include_once '../app/ValidadorLogin.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/config.inc.php';
include_once '../app/cn.php';
include_once '../plantillas/a.php';
include_once '../plantillas/navbar.php';
include_once '../plantillas/navbar_opciones.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Visitas registradas.
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="app/registrar.php">
                        <div id="collapseOne" class="">
                            <div class="panel-body">
                                <table class="table table-responsive text-left">
                                    <thead>
                                        <tr>
                                            <th>Nombre de visita</th>
                                            <th>Cuenta de correo</th>
                                            <th>Persona a quien visita</th>
                                            <th>Asunto</th>
                                            <th>Hora de visita:</th>
                                            <th>Tipo de visita</th>
                                            <th>Gafete</th>
                                            <th>Foto</th>
                                            <th>Edicion</th>
                                            <th>Salida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT
                                                id_visitas,
                                                fec_visita,
                                                nom_visitas,
                                                mail_visita,
                                                per_visita,
                                                asunto,
                                                CASE tip_visita WHEN 1 THEN 'Proveedor' WHEN 2 THEN 'Visita' END as tip_visita,
                                                num_gafete,
                                                fot_visita,
                                                fot_ide_visita
                                                FROM visitas WHERE activo = 1";
                                        $resultado = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($resultado)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $mostrar['nom_visitas'] ?></td>
                                                <td><?php echo $mostrar['mail_visita'] ?></td>
                                                <td><?php echo $mostrar['per_visita'] ?></td>
                                                <td><?php echo $mostrar['asunto'] ?></td>
                                                <td><?php echo $mostrar['fec_visita'] ?></td>
                                                <td><?php echo $mostrar['tip_visita'] ?></td>
                                                <td><?php echo $mostrar['num_gafete'] ?></td>
                                                <td><a href="<?php echo $mostrar['fot_visita'] ?>" target=”_blank”><img width="75" src="<?php echo $mostrar['fot_visita'] ?>"/></a></td>
                                                <?php
                                                if (!empty($mostrar['num_gafete'])) {
                                                    ?>
                                                    <td><a href="modificar_2?id_visitas=<?php echo $mostrar['id_visitas']; ?>">Modificar</a></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><a href="modificar?id_visitas=<?php echo $mostrar['id_visitas']; ?>">Modificar</a></td>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if (!empty($mostrar['num_gafete'])) {
                                                    ?>
                                                    <td><a href='salida_visita?id_visitas=<?php echo $mostrar['id_visitas']; ?>'>Salida</a></td>
                                                    <?php
                                                } else {
                                                    echo "<td>faltan datos</td>";
                                                }
                                                ?>
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
include_once '../plantillas/z.php';
?>