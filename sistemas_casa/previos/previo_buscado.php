<?php
$titulo = 'Previos';
include_once '../../app/config.inc.php';
include_once '../../app/Conexion.inc.php';
//include_once 'app/Usuario.inc.php';
//include_once 'app/RepositorioUsuario.inc.php';
//include_once 'app/ValidadorRegistro.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';
//include_once 'app/cn.php';
include_once '../../app/cn_casa.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
include_once '../../plantillas/navbar_index.php';
$hori_inic = $_REQUEST['hori_inic'];
$hor_fina = $_REQUEST['hor_fina'];
?>

<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        // Con este echo, colocamos el nombre de la pagina dentro del cuerpo de la misma, con ayuda de la 
        //variable $titulo
        echo "<title>$titulo</title>";
        ?>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
    </head>
    <body>


<!--        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
                        <span class="sr-only">Este boton despliega la barra de nabegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="http://transpheric.com/dd/public/frontend/img/logo.png">
                </div>
                <div id="navbar" class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo RUTA_VISITAS ?>">Inicio visitas</a></li>
                        <li><a href="<?php echo RUTA_REGISTRADAS ?>">Visitas registradas</a></li>
                        <li><a href="<?php echo RUTA_HISTORICO ?>">Historico</a></li>
                        <li><a href="<?php echo RUTA_LOGIN_CIERRE ?>">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>-->




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
                                <a href="#"><img src="resources/xls-icon.png" onclick="tableToExcel('previos', 'Facturacion FedEx')" value="Export to Excel" style="width:40px;height:40px"></a>
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
  /* Consulta aterior y muy tardada                                         
SELECT
      h.num_refe  AS REFERENCIA,
      (SELECT COUNT(cons_part) FROM ctrao_prevpar WHERE (num_refe = t.num_refe)) AS PARTIDAS,
      p.nom_depe  AS TRAMITADOR,
      h.hori_inic AS FECHA_INICIO,
      h.hori_inic AS HORA_INICIO,  
      h.hor_fina  AS FECHA_FIN,
      h.hor_fina  AS HORA_FIN,
      DATEDIFF(minute, h.hori_inic, h.hor_fina) AS TIEMPO
FROM ctrao_recoage h
RIGHT OUTER JOIN ctrao_prevpar t ON t.num_refe = h.num_refe
RIGHT OUTER JOIN ctrac_depend p ON t.cve_usua =  p.usu_depe
WHERE h.hori_inic BETWEEN '08/01/2018 00:00:00' AND '08/01/2018 23:59:00'
ORDER BY partidas*/


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

        <script src="../js/jquery.min.js"></script>       
        <script src="../js/bootstrap.min.js"></script> 
        <script src="../js/tableToExcel.js"></script>
        <br>
        <br>

        <footer>
            <div class="container">
                <div >
                    <div class="text-center" class="jumbotron">
                        TC-F-BV-01, Octubre 2018, Rev. 1    
                    </div>
                    <div class="text-center" class="copyright"> 2018 &copy; Luis Medina. </div>
                </div>
            </div>
        </footer>

    </body>
</html>


