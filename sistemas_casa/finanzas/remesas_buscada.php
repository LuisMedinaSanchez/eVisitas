﻿<?php
$titulo = 'Reporte de remesas';
include_once '../../app/ControlSesion.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/cn_casa.php';
include_once '../../app/config.inc.php';
include_once '../../plantillas/a.php';
include_once '../../plantillas/navbar.php';
include_once '../../plantillas/navbar_opciones.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
$hori_inic = $_REQUEST['hori_inic'];
$hor_fina = $_REQUEST['hor_fina'];
$cve_impo = $_REQUEST['cve_impo'];
?>
<br>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">
                    Reporte de facturaciòn
                </h1>
            </div>
            <br>
            <div class="row">
                <div class="form-group">
                    <form role="form" method="post" action="remesas_buscada?hori_inic&hor_fina">
                        <div class="col-md-1">Fechas de pago</div>
                        <div class="col-md-2">
                            <label>Fecha de inicio</label>
                            <input required="required" type="date" required="required" value='<?php echo $_REQUEST['hori_inic']; ?>'  class="form-control" id="hori_inic" name="hori_inic">
                        </div>
                        <div class="col-md-2">
                            <label>Fecha de inicio</label>
                            <input required="required" type="date" value='<?php echo $_REQUEST['hor_fina']; ?>' class="form-control" id="hor_atencion" id="hor_fina" name="hor_fina">
                        </div>
                        <div class="col-md-2">
                            <label>Importador</label>
                            <select class="form-control" id="cve_impo" name="cve_impo" >
                                <option value="">Todos</option>
                                <?php
                                $sql2 = "select CVE_IMP, NOM_IMP from CTRAC_CLIENT where cve_comi='FED';";
                                $resultado2 = ibase_query($conexion_casa, $sql2);
                                while ($mostrar2 = ibase_fetch_object($resultado2)) {
                                    ?>
                                    <option value="AND c.cve_imp in ('<?php echo $mostrar2->CVE_IMP ?>')"><?php echo $mostrar2->CVE_IMP . " " . $mostrar2->NOM_IMP ?></option>
                                    <?php
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-default btn-primary" name="Consultar">Consultar</button>
                        </div>
                        <div class="col-md-1">
                            <a href="#"><img src="../../resources/xls-icon.png" onclick="tableToExcel('facturacion', 'Facturacion FedEx')" value="Export to Excel" style="width:40px;height:40px"></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" method="post">
                    <div id="collapseOne" class="">
                        <div class="panel-body">
                            <table id="facturacion" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>REFERENCIA</th>
                                        <th>Ope</th>
                                        <th>Patente</th>
                                        <th>Pedimento</th>
                                        <th>Documento</th>
                                        <th>Cliente</th>
                                        <th>RFC</th>
                                        <th>IGI</th>
                                        <th>DTA</th>
                                        <th>IVA</th>
                                        <th>Prevalidación</th>
                                        <th>Total</th>
                                        <th>Guía</th>
                                        <th>Bultos</th>
                                        <th>Peso</th>
                                        <th>Entrada</th>
                                        <th>Pago</th>
                                        <th>Liberación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "
select
p.num_refe AS REFERENCIA,
p.imp_expo AS EXPO_IMPO,
p.pat_agen AS PATENTE,
p.num_pedi AS PEDIMENTO,
p.cve_pedi AS DOCUMENTO,
c.nom_imp AS CLIENTE,
c.rfc_imp AS RFC,
(SELECT SUM(TOT_IMPU) FROM SAAIO_CONTFRA WHERE (NUM_REFE=p.NUM_REFE) AND (CVE_IMPU='6')) AS IGI,
(SELECT SUM(TOT_IMPU) FROM SAAIO_CONTPED WHERE (NUM_REFE=p.NUM_REFE) AND (CVE_IMPU='1')) AS DTA,
(SELECT SUM(TOT_IMPU) FROM SAAIO_CONTFRA WHERE (NUM_REFE=p.NUM_REFE) AND (CVE_IMPU='3')) AS IVA, 
(SELECT SUM(TOT_IMPU) FROM SAAIO_CONTPED WHERE (NUM_REFE=p.NUM_REFE) AND (CVE_IMPU='15'))AS PREV,
p.tot_efec AS TOTAL,
g.guia AS GUIA,
p.can_bult AS BULTOS,
p.pes_brut AS PESO,
p.fec_entr AS ENTRADA,
p.fec_pago AS PAGO,
h.fec_etap AS LIBERACION                     
from saaio_pedime p
left outer join ctrac_client c ON p.cve_impo = c.cve_imp
left outer join saaio_guias g ON p.num_refe = g.num_refe
left outer join ctrao_etapas h ON p.num_refe = h.num_refe
where p.ADU_DESP='650' and c.cve_comi='FED' and p.fec_pago BETWEEN '$hori_inic' AND '$hor_fina' AND h.cve_etap='130' $cve_impo;";
                                    $resultado = ibase_query($conexion_casa, $sql);

                                    while ($mostrar = ibase_fetch_object($resultado)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $mostrar->REFERENCIA ?></td>
                                            <td><?php echo $mostrar->EXPO_IMPO ?></td>
                                            <td><?php echo $mostrar->PATENTE ?></td>
                                            <td><?php echo $mostrar->PEDIMENTO ?></td>
                                            <td><?php echo $mostrar->DOCUMENTO ?></td>
                                            <td><?php echo $mostrar->CLIENTE ?></td>
                                            <td><?php echo $mostrar->RFC ?></td>
                                            <td>$<?php echo $mostrar->IGI ?></td>
                                            <td>$<?php echo $mostrar->DTA ?></td>
                                            <td>$<?php echo $mostrar->IVA ?></td>
                                            <td>$<?php echo $mostrar->PREV ?></td>
                                            <td>$<?php echo $mostrar->TOTAL ?></td>
                                            <td><?php echo $mostrar->GUIA ?></td>
                                            <td><?php echo $mostrar->BULTOS ?></td>
                                            <td><?php echo $mostrar->PESO ?></td>
                                            <td><?php echo $mostrar->ENTRADA ?></td>
                                            <td><?php echo $mostrar->PAGO ?></td>
                                            <td><?php echo $mostrar->LIBERACION ?></td>
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
include_once '../../plantillas/z.php';
?>