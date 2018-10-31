<?php
$titulo = 'Previos';
include_once '../plantillas/a.php';
include_once '../../plantillas/navbar.php';
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
                                <input required="required" type="date" required="required" value=''  class="form-control" id="hori_inic" name="hori_inic">
                            </div>
                            <div class="col-md-2">
                                <label>Fecha de inicio</label>
                                <input required="required" type="date" value='' class="form-control" id="hor_atencion" id="hor_fina" name="hor_fina">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-default btn-primary" name="Consultar">Consultar</button>
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
                                            <th>FECHA Y HORA DE FIN</th>
                                            <th>TIEMPO USADO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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