<?php
$titulo = "Remesas";
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
?>
<br>
<div class="container">
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
                        <form role="form" method="post" action="remesas_buscada?hori_inic&hor_fina&cve_impo">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Fecha de pago<br> inicio</label>
                                <input required="required" type="date" required="required" value=''  class="form-control" id="hori_inic" name="hori_inic">
                            </div>
                            <div class="col-md-2">
                                <label>Fecha de pago<br>fin</label>
                                <input required="required" type="date" value='' class="form-control" id="hor_atencion" id="hor_fina" name="hor_fina">
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
                                        <option value="AND c.cve_imp in ('<?php echo $mostrar2->CVE_IMP ?>')"><?php echo $mostrar2->CVE_IMP . "   /   " . $mostrar2->NOM_IMP ?></option>
                                        <?php
                                    }
                                    ibase_close();
                                    if ($conexion_casa)
                                        echo 'conexion a BD no cerrada';
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-default btn-primary" name="Consultar">Consultar</button>
                            </div>
                            <div class="col-md-4"></div>
                        </form>
                        <div class="panel-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../../plantillas/z.php';
?>