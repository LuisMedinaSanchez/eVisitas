<?php
$titulo = 'Previos';
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
                        <form role="form" method="post" action="previo_buscado?hori_inic&hor_fina&pat_agen&adu_desp&nom_depe">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Fecha de inicio *</label>
                                <input required="required" type="date" required="required" value='<?php echo $_REQUEST['hori_inic']; ?>'  class="form-control" id="hori_inic" name="hori_inic">
                            </div>
                            <div class="col-md-2">
                                <label>Fecha de inicio *</label>
                                <input required="required" type="date" value='<?php echo $_REQUEST['hor_fina']; ?>' class="form-control" id="hor_atencion" id="hor_fina" name="hor_fina">
                            </div>
                            <div class="col-md-2">
                                <label>Aduana / Patente</label>
                                <select class="form-control" id="adu_pat" name="adu_pat" >
                                    <option value="">Todas</option>
                                    <option value="AND e.adu_desp = '470' AND e.pat_agen = '3646'" >470/3646</option>
                                    <option value="AND e.adu_desp = '650' AND e.pat_agen = '1695'" >650/1695</option>
                                    <option value="AND e.adu_desp is null AND e.pat_agen is null" >Previos sin asignar</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Tramitador</label>
                                <select class="form-control" id="nom_depe" name="nom_depe" >
                                    <option value="">Todos</option>
                                    <?php
                                        $sql2 = "SELECT NOM_DEPE, USU_DEPE FROM CTRAC_DEPEND;";
                                        $resultado2 = ibase_query($conexion_casa, $sql2);
                                        while ($mostrar2 = ibase_fetch_object($resultado2)) {
                                            ?>
                                            <option value="AND h.dep_asigna in ('<?php echo $mostrar2->USU_DEPE?>')"><?php echo $mostrar2->NOM_DEPE?></option>
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
                        </form>
                    </div>
                </div>
                <div class="panel-body"></div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../../plantillas/z.php';
?>