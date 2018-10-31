<div class="row">
    <nav class="navbar navbar-default ">
        <div class="navbar-header">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-control="navbar">
                        <span class="sr-only">Este boton despliega la barra de nabegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div id="navbar2" class="collapse navbar-collapse" >

                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sistemas CASA <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo RUTA_PREVIOS ?>">Previos</a></li>
                                <li><a href="<?php echo RUTA_REMESAS ?>">Reporte remesas FedEx</a></li>
                                <li><a href="<?php echo RUTA_CLIENTE_ESPEJO ?>">Claves de cliente erroneas</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Visitas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo RUTA_VISITAS ?>">Visitas inicio</a></li>
                                <li><a href="<?php echo RUTA_VISITAS2 ?>">Registro manual</a></li>
                                <li><a href="<?php echo RUTA_REGISTRADAS ?>">Visitas registradas</a></li>
                                <li><a href="<?php echo RUTA_HISTORICO ?>">Historial de visitas</a></li>
                                <li><a href="<?php echo RUTA_BUSCAR_VISITA ?>">Buscador de visitas</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </nav>
</div>
