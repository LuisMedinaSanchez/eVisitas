<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Usuario.inc.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
$titulo = 'Registro de visitas';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar_inicio.inc.php';
?>

<div class="container">
    <h4 class="text-center">Registro de visitas</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce los datos de la visita
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="app/registrar.php">
                        <div id="collapseOne" class="">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label><strong class="text-danger" style="font-size: 20px">*</strong> Nombre de visita</label>
                                            <input type="text" required="required" value='' class="form-control" id="razonsocial" name="nom_visita" placeholder="ejemplo: Luis Medina"  >
                                        </div>
                                        <div class="col-md-6">
                                            <label><strong class="text-danger" style="font-size: 20px">*</strong> Identificacion oficial</label>
                                            <input type="text" required="required" value='' class="form-control" id="ide_oficial" name="ide_oficial">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label><strong class="text-danger" style="font-size: 20px">*</strong> Persona a quien visita </label>
                                            <select required="required" class="form-control"  id="per_visita" name="per_visita" >
                                                <option value="" selected>Seleccione a alguien</option>
                                                <option value="97" >Luis Medina Sánchez (Sub. Gerente de sistemas)</option></select>
                                        </div>
                                        <div class="col-md-5">
                                            <label><strong class="text-danger" style="font-size: 20px">*</strong> Asunto</label>	
                                            <input type="text" required="required" value='' class="form-control" id="asunto" name="asunto">
                                        </div>
                                        <div class="col-md-3">
                                            <label><strong class="text-danger" style="font-size: 20px">*</strong> Hora de visita:</label>
                                            <input type="time" required="required" value=''  class="form-control" id="hor_visita" name="hor_visita">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label><strong class="text-danger" style="font-size: 20px"></strong> Observaciones</label>
                                            <input type="text" value=''  class="form-control" id="observaciones" name="observaciones">
                                        </div>
                                        <div class="col-md-3">
                                            <label><strong class="text-danger" style="font-size: 20px"></strong> Hora de atencion:</label>
                                            <input type="time" value='' class="form-control" id="hor_atencion" name="hor_atencion">
                                        </div>

                                    </div>												
                                </div>


                                <div class="row">
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-3" ></div>
                                        <div class="col-md-3">
                                            <label type="button" class="firstbtn btn btn-warning btn-lg pull-left" for="inefront" id="lblinefront">
                                                <div class="" id="error_inefront"></div>
                                                <div class="row">
                                                    <div class="col-md-12"></div>
                                                </div>
                                                <input id="inefront" accept="image/*" name='inefront' type="file" style="display:none" onchange="$('#uploadfront').show();$('#error_inefront').tooltip('hide');">
                                                Tomar o subir foto                                                        
                                                <span style="display: none;" id="uploadfront" class="fa fa-check text-color-primary"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label type="button" class="firstbtn btn btn-warning btn-lg pull-left" for="ineback" id="lblineback">
                                                <div class="" id="error_ineback"></div>
                                                <div class="row">
                                                    <div class="col-md-12"></div>
                                                </div>
                                                <input id="ineback" accept="image/*" name='ineback' type="file" style="display:none" onchange="$('#uploadback').show();$('#error_ineback').tooltip('hide')">
                                                Tomar foto o subir INE
                                                <span style="display: none;" id="uploadback" class="fa fa-check text-color-primary"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-default btn-primary" name="registrar">Enviar</button>
                                            <button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>
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
<?php
//incluimos la parte para cerrar el cuerpo de la pagina para no tener que volver a meter codigo
include_once 'plantillas/documento-cierre.inc.php';
?>