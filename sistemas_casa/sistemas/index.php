<?php
$titulo = 'Espejos';
include_once '../plantillas/a.php';
include_once '../../plantillas/navbar.php';
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
                        <a href="../app/cliente_espejo">Reparar</a>
                    </div>
                    <div class="col-md-5">
                        <a href="#"><img src="../../resources/xls-icon.png" onclick="tableToExcel('cliente', 'Facturacion FedEx')" value="Export to Excel" style="width:40px;height:40px"></a>
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
<?php
include_once '../plantillas/z.php';
?>