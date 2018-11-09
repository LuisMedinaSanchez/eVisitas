<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
                <span class="sr-only">Este boton despliega la barra de nabegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img alt="Porto" width="250" data-sticky-width="98" data-sticky-top="33" src="/resources/logo_TP.png">
        </div>
        <div id="navbar" class="navbar-collapse collapse" >
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (ControlSesion::sesion_iniciada()) {
                    $usuarios = $_SESSION['nombre_usuario'];
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="falce">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo ' ' . $usuarios; ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            //Con las lineas de abajo sabremos que tipo de usuario es
                            $conexion = mysqli_connect("localhost", "root", "", "transpheric");
                            $sql = "SELECT perfil FROM usuarios WHERE nombre = '$usuarios'";
                            $resultado = mysqli_query($conexion, $sql);
                            $mostrar = $resultado->fetch_assoc();
                            $perfil = $mostrar['perfil'];
                            if ($perfil == "0") {
                                ?>
                                <li>
                                    <a href="<?php echo RUTA_USUARIOS ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Usuarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo RUTA_LOGIN_CIERRE ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Cerrar sesión</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a href="<?php echo RUTA_LOGIN_CIERRE ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Cerrar sesión</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
} else {
    ?>
    <li><a href="<?php echo SERVIDOR ?>">Iniciar sesión</a></li>
    </ul>
    </div>
    </div>
    </nav>
    <?php
}
?>

