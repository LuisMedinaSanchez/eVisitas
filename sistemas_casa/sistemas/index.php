<?php
$titulo = 'Reporte de remesas';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/cn_casa.php';
//Para evitar registrar usuarios sin autorizacion


include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_reportes.inc.php';
?>

    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Referencias con cliente erroneo
                    </h1>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        
                        <div class="col-md-5"></div>
                        <div class="col-md-1">
                            <a href="app/cliente_espejo">Reparar</a>
                        </div>
                        <div class="col-md-5">
                        <a href="#"><img src="resources/xls-icon.png" onclick="tableToExcel('cliente', 'Facturacion FedEx')" value="Export to Excel" style="width:40px;height:40px"></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div id="collapseOne" class="">
                            <div class="panel-body">
                                <table id="cliente" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Importador</th>
                                            <th>Referencia</th>
                                            <th>Operacion</th>
                                            <th>Clave de cliente</th>
                                            <th>Aduana</th>
                                            <th>Patente</th>
                                            <th>Documento</th>
                                            <th>Fecha de entrada</th>
<!--                                            <th>IGI</th>
                                            <th>DTA</th>
                                            <th>IVA</th>
                                            <th>Prevalidación</th>
                                            <th>Total</th>
                                            <th>Guía</th>
                                            <th>Bultos</th>
                                            <th>Peso</th>
                                            <th>Entrada</th>
                                            <th>Pago</th>
                                            <th>Liberación</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "
select 
c.nom_imp   AS  IMPORTADOR,
p.NUM_REFE  AS  REFERENCIA,
p.IMP_EXPO  AS  OPERACION,
p.CVE_IMPO  AS  CLAVE,
p.ADU_DESP  AS  ADUANA,
p.PAT_AGEN  AS  PATENTE,
p.CVE_PEDI  AS  DOCUMENTO,
p.FEC_ENTR  AS  FECHA
from saaio_pedime p
left outer join ctrac_client c ON p.cve_impo = c.cve_imp
where cve_impo in ('I03206','I03206','I03257');
";
                                        $resultado = ibase_query($conexion_casa, $sql);

                                        while ($mostrar = ibase_fetch_object($resultado)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $mostrar->IMPORTADOR ?></td>
                                                <td><?php echo $mostrar->REFERENCIA ?></td>
                                                <td><?php echo $mostrar->OPERACION ?></td>
                                                <td><?php echo $mostrar->CLAVE ?></td>
                                                <td><?php echo $mostrar->ADUANA ?></td>
                                                <td><?php echo $mostrar->PATENTE ?></td>
                                                <td><?php echo $mostrar->DOCUMENTO ?></td>
                                                <td><?php echo $mostrar->FECHA ?></td>
<!--                                                <td>$<?php echo $mostrar->CVE_IMP ?></td>
                                                <td>$<?php echo $mostrar->DTA ?></td>
                                                <td>$<?php echo $mostrar->IVA ?></td>
                                                <td>$<?php echo $mostrar->PREV ?></td>
                                                <td>$<?php echo $mostrar->TOTAL ?></td>
                                                <td><?php echo $mostrar->GUIA ?></td>
                                                <td><?php echo $mostrar->BULTOS ?></td>
                                                <td><?php echo $mostrar->PESO ?></td>
                                                <td><?php echo $mostrar->ENTRADA ?></td>
                                                <td><?php echo $mostrar->PAGO ?></td>
                                                <td><?php echo $mostrar->LIBERACION ?></td>-->
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


<?php
//incluimos la parte para cerrar el cuerpo de la pagina para no tener que volver a meter codigo
include_once 'plantillas/documento-cierre.inc.php';
?>




