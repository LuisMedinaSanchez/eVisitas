<?php
$titulo = 'Previos';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
//include_once 'app/Usuario.inc.php';
//include_once 'app/RepositorioUsuario.inc.php';
//include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
//include_once 'app/cn.php';
include_once 'app/cn_casa.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_reportes.inc.php';
?>

<br>



<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Reporte de previos
                    </h1>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <form role="form" method="post" action="#">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Fecha de inicio</label>
                                <input required="required" type="date" required="required" value=''  class="form-control" id="hor_visita" name="hor_visita">
                            </div>
                            <div class="col-md-2">
                                <label>Fecha de inicio</label>
                                <input required="required" type="date" value='' class="form-control" id="hor_atencion" name="hor_atencion">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-default btn-primary" name="Consultar">Consultar</button>
                            </div>
                            <div class="col-md-1">
                                <a href="#"><img src="resources/xls-icon.png" onclick="tableToExcel('previos', 'Facturacion FedEx')" value="Export to Excel" style="width:40px;height:40px"></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="app/registrar.php">
                        <div id="collapseOne" class="">
                            <div class="panel-body">
                                <table class="table table-responsive" id="previos">
                                    <thead>
                                        <tr>
                                            <th>REFERENCIA</th>
                                            <th>PARTIDAS</th>
                                            <th>TRAMITADOR</th>
                                            <th>FECHA Y HORA DE INICIO</th>
<!--                                            <th>HORA INICIO</th>-->
                                            <th>FECHA Y HORA DE FIN</th>
<!--                                            <th>HORA FIN</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "
SELECT
      h.num_refe  AS REFERENCIA,
      (SELECT COUNT(cons_part) FROM ctrao_prevpar WHERE (num_refe = t.num_refe)) AS PARTIDAS,
      t.cve_usua  AS TRAMITADOR,
      h.hori_inic AS FECHA_INICIO,
      h.hori_inic AS HORA_INICIO,  
      h.hor_fina  AS FECHA_FIN,
      h.hor_fina  AS HORA_FIN
FROM ctrao_recoage h
RIGHT OUTER JOIN ctrao_prevpar t ON t.num_refe = h.num_refe
WHERE h.hori_inic BETWEEN '08/02/2018' AND '08/03/2018' 
ORDER BY partidas";
                                        $resultado = ibase_query($conexion_casa, $sql);

                                        while ($mostrar = ibase_fetch_object($resultado)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $mostrar->REFERENCIA ?></td>
                                                <td><?php echo $mostrar->PARTIDAS ?></td>
                                                <td><?php echo $mostrar->TRAMITADOR ?></td>
                                                <td><?php echo $mostrar->FECHA_INICIO ?></td>
<!--                                                <td><?php echo $mostrar->HORA_INICIO ?></td>-->
                                                <td><?php echo $mostrar->FECHA_FIN ?></td>
<!--                                                <td><?php echo $mostrar->HORA_FIN ?></td>-->
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


