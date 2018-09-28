<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Transpheric Logistics|Registro de visitas</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>


    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" >
                        <span class="sr-only">Este boton despliega la barra de nabegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="http://transpheric.com/dd/public/frontend/img/logo.png">
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Inicio</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="jumbotron">
                <h2>Registro de visitas</h2>
            </div>
        </div>


        <div class="container">
            <div class="row">

                <div class="col-md-3">    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <strong>*</strong> Fecha de registro  
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="date" name="fec_reg" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <strong>*</strong> Nombre  
                        </div>
                        <div class="panel-body">
                            <input type="text" name="nom_vis" class="form-control" placeholder="Ingrese nombre completo" required="required" >
                        </div>
                    </div>    
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> <strong>*</strong> ID oficial 
                        </div>
                        <div class="panel-body">
                            <input type="text" name="id_vis"class="form-control" placeholder="Numero de INE, pasaporte, credencial" required="required" >
                        </div>
                    </div>    
                </div>

            </div>
        </div>


        <div class="container">
            <div class="row">

                <div class="col-md-6">    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <strong>*</strong> Persona que visita  
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <select class="form-control"  name="per_vis" >
                                            <option disabled="disabled" selected>
                                                Seleccione personal
                                            </option>
                                            <option value="1" >ALBERTO DE LA CRUZ GARCIA (TRAFICO)</option>
                                            <option value="2" >ALEJANDRO FLORES MANCERA (DIR OPERATIVO)</option>
                                            <option value="3" >ALMA LILIA HERNANDEZ MARTINEZ (TRAFICO)</option>
                                            <option value="4" >ANA CECILIA VILCHIS LOPEZ (COBRANZA)</option>
                                            <option value="5" >ANTONIO GRANADOS HERNANDEZ (CLASIFICACION)</option>
                                            <option value="6" >CHARYTI VIZUET HERNANDEZ (ASIS. DIR. GEN.)</option>
                                            <option value="7" >DANIEL MOLINA PEREZ (DIR FINANZAS)</option>
                                            <option value="8" >EMMANUEL ZUÑIGA GONZALEZ (CONTABILIDAD)</option>
                                            <option value="9" >ERNESTO ORTIZ RUIZ (SISTEMAS)</option>
                                            <option value="10" >FRANCISCO JAVIER CID MERCADO (GTE. TRAFICO)</option>
                                            <option value="11" >JOSEFA PATRICIA MAGAÑA RAMIREZ (AGENTE ADUANAL)</option>
                                            <option value="12" >LUIS GERARDO ROMERO LEON (CHOFER DIR. GENERAL)</option>
                                            <option value="13" >LUIS MEDINA SANCHEZ (SISTEMAS)</option>
                                            <option value="14" >MA ELENA MANCERA ESCANDON (DIR. ADMINISTRATIVO)</option>
                                            <option value="15" >MAGALY GUADALUPE VELAZQUEZ SOLACHE (CALIDAD)</option>
                                            <option value="16" >MARCO ANTONIO TAPIA (EJEC. CUENTA)</option>
                                            <option value="17" >MARIA BERTHA ZAVALA OLVERA (TESORERIA)</option>
                                            <option value="18" >MARIA PATRICIA PEREZ MARQUEZ (ASIS. DIR. ADMIN.)</option>
                                            <option value="19" >NANCY BARAJAS CHAVEZ (VALIDACION)</option>
                                            <option value="20" >ROCIO JUAREZ SANDOVAL (RRHH)</option>
                                            <option value="21" >RUPERTO FLORES Y FERNANDEZ (DIR. GENERAL)</option>
                                            <option value="22" >SANDRA HERNANDEZ SUAREZ (EJEC. CUENTA)</option>
                                            <option value="23" >WENDOLYN GUADALUPE GARCIA MONTES (GLOSA)</option>

                                        </select>			
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <strong>*</strong> Hora de entrada  
                        </div>
                        <div class="panel-body">
                            <input type="time" name="hor_ent" class="form-control"  >
                        </div>
                    </div>    
                </div>

                <div class="col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span> <strong>*</strong>Hora de atencion  
                        </div>
                        <div class="panel-body">
                            <input type="time" name="hor_ate" class="form-control">
                        </div>
                    </div>    
                </div>

                <div class="col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <strong>*</strong> Hora de salida  
                        </div>
                        <div class="panel-body">
                            <input type="time" name="hor_sal"class="form-control" required="required" >
                        </div>
                    </div>    
                </div>
            </div>
        </div>




        <div class="container">
            <div class="row">

                <div class="col-md-6">    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <strong>*</strong> Asunto  
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="asu_vis" placeholder="Ingrese asunto" required="required" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Obcervaciones  
                        </div>
                        <div class="panel-body">
                            <input type="text" class="form-control" name="obs_vis" placeholder="Equipo de computo, herramientas, etc." >
                        </div>
                    </div>    
                </div>

            </div>
        </div>

<!--
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <label class="btn btn-warning btn-lg pull-left" for="ineback" id="lblineback">
                        <input id="ineback" accept="image/*" name="fot_vis" type="file" style="display:none" onchange="$('#uploadback').show();$('#error_ineback').tooltip('hide')">
                        Subir INE
                        <span style="display: none;" id="uploadback" ></span>
                    </label>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <label class="btn btn-warning btn-lg pull-left" for="inefront" id="lblinefront">
                        <input id="inefront" accept="image/*" name="fot_id" type="file" style="display:none" onchange="$('#uploadfront').show();$('#error_inefront').tooltip('hide');">
                        Tomar foto                                                        
                        <span style="display: none;" id="uploadfront" ></span>
                    </label>
                </div>
            </div>
-->
            <div class="container">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-default btn-primary" name="guardar" >Guardar </button>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/jquery.min.js"></script>       
            <script src="js/bootstrap.min.js"></script>     
    </body>
</html>
