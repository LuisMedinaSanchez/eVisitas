<?php
$titulo = 'Volver a registrar';
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
$id_visitas = $_REQUEST['id_visitas'];
$sql = "SELECT * FROM visitas WHERE id_visitas = '$id_visitas' ";
$resultado = mysqli_query($conexion, $sql);
$mostrar = $resultado->fetch_assoc();
?>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            ¿Registrar nuevamente?
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post"  action="app/registrar_volver?id_visitas=<?php echo $mostrar['id_visitas']; ?>">
                            <div id="collapseOne" class="">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Nombre de visita</label>
                                                <input type="text" required="required" value='<?php echo $mostrar['nom_visitas']; ?>' class="form-control" name="nom_visita">
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Cuenta de correo</label>
                                                <input type="email" required="required" value='<?php echo $mostrar['mail_visita']; ?>' class="form-control" name="mail_visita">
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Identificacion oficial</label>
                                                <input type="text" required="required" value='<?php echo $mostrar['ide_oficial']; ?>' class="form-control" name="ide_oficial">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Persona a quien visita</label>
                                                <input type="text" required="required" value='<?php echo $mostrar['per_visita']; ?>' class="form-control" id="per_visita" name="per_visita" placeholder="Persona a quien visitas *">
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Asunto</label>	
                                                <input type="text" required="required" value='<?php echo $mostrar['asunto']; ?>' class="form-control" name="asunto">
                                            </div>
                                            <div class="col-md-2">
                                                <label><strong class="text-danger" style="font-size: 20px"></strong> Hora de atencion:</label>
                                                <input type="time" value='' class="form-control" id="hor_atencion" name="hor_atencion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <label><strong class="text-danger" style="font-size: 20px"></strong> Observaciones</label>
                                                <input type="text" value='<?php echo $mostrar['observaciones']; ?>'  class="form-control" id="observaciones" name="observaciones">
                                            </div>
                                            <div class="col-md-2">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Tipo de visita </label>
                                                <select required="required" class="form-control"  id="per_visita" name="tip_visita" >
                                                    <option value="<?php echo $mostrar['tip_visita']; ?>" selected><?php echo $mostrar['tip_visita']; ?></option>
                                                    <option value="1" >Proveedor</option>
                                                    <option value="2" >Visita</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Gafete </label>
                                                <select required="required" class="form-control"  id="num_gafete" name="num_gafete" >
                                                    <option value="<?php echo $mostrar['num_gafete'] ?>"selected><?php echo $mostrar['num_gafete'] ?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>

                                        </div>												
                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-3" ></div>
                                            <div class="col-md-3">
                                                <img id="fot_visita" name="fot_visita"  width="75" src="<?php echo $mostrar['fot_visita'] ?>"/>
                                                <br>
                                                <label type="button" class="btn btn-default">
                                                    <input  id="fot_visita"  name='fot_visita' value="<?php echo $mostrar['fot_visita'] ?>" style="display:none">
                                                    Visita                                                    
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <img id="fot_ide_visita" name="fot_ide_visita" width="75" src="<?php echo $mostrar['fot_ide_visita'] ?>"/>
                                                <br>
                                                <label type="button" class="btn btn-default">
                                                    <input id="fot_ide_visita"  name='fot_ide_visita' value="<?php echo $mostrar['fot_ide_visita'] ?>" style="display:none">
                                                    Credencial
                                                </label>
                                            </div>
                                            <br>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-default btn-primary btn-lg" name="cambios">Volver a registrar</button>
                                            </div>
                                            <div class="col-md-12">
                                                <h4><a href="<?php echo RUTA_HISTORICO ?>">Cancelar</a> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../plantillas/z.php';
?>

