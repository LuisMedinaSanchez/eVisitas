<nav class="navbar navbar-default navbar-static-top">
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
                        <?php
                        if (ControlSesion::sesion_iniciada()) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="falce">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo ' ' . $_SESSION['nombre_usuario']; ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo RUTA_USUARIOS ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo RUTA_LOGIN_CIERRE ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Cerrar sesión</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li><a href="<?php echo SERVIDOR ?>">Iniciar sesión</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>