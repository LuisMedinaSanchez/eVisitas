<?php
$titulo = 'Previos';
include_once '../../app/ControlSesion.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/cn_casa.php';
include_once '../../app/config.inc.php';
include_once '../../plantillas/a.php';
include_once '../../plantillas/navbar.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
$hori_inic = $_REQUEST['hori_inic'];
$hor_fina = $_REQUEST['hor_fina'];
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
                        <form role="form" method="post" action="previo_buscado?hori_inic&hor_fina">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Fecha de inicio</label>
                                <input required="required" type="date" required="required" value='<?php echo $_REQUEST['hori_inic']; ?>'  class="form-control" id="hori_inic" name="hori_inic">
                            </div>
                            <div class="col-md-2">
                                <label>Fecha de inicio</label>
                                <input required="required" type="date" value='<?php echo $_REQUEST['hor_fina']; ?>' class="form-control" id="hor_atencion" id="hor_fina" name="hor_fina">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-default btn-primary" name="Consultar">Consultar</button>
                            </div>
                            <div class="col-md-1">
                                <a href="#"><img src="../../resources/xls-icon.png" onclick="tableToExcel('previos', 'Rendimiento de previos')" value="Export to Excel" style="width:40px;height:40px"></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="/previo_buscado.php">
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
                                            <th>TIEMPO USADO</th>
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
                                        h.hor_fina  AS HORA_FIN,
                                        DATEDIFF(minute, h.hori_inic, h.hor_fina) AS TIEMPO
                                        FROM ctrao_recoage h
                                        RIGHT OUTER JOIN ctrao_prevpar t ON t.num_refe = h.num_refe
                                        WHERE h.hori_inic BETWEEN '$hori_inic 00:00:01' AND '$hor_fina 23:59:59' 
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
                                                <td><?php echo $mostrar->TIEMPO ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ibase_close();
                                        if (!$conexion_casa)
                                            echo 'conexion a BD no cerrada';
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
 include_once '../../plantillas/z.php';
 ?>