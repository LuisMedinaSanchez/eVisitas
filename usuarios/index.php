<?php
include_once '../app/config.inc.php';
include_once '../app/Conexion.inc.php';
include_once '../app/RepositorioUsuario.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/Usuario.inc.php';
include_once '../app/ValidadorRegistro.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/cn.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
if (isset($_POST['enviar'])) {
    //al escribir :: decimos que vamos a usar un metodo dentro del archivo
    conexion::abrir_conexion();
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], conexion::obtener_conexion());

    if ($validador->registro_valido()) {
        $usuario = new usuario('', $validador->obtener_nombre(), $validador->obtener_email(), password_hash($validador->obtener_clave(), PASSWORD_DEFAULT), '', '');
        $usuario_insertado = repositoriousuario::insertar_usuario(conexion::obtener_conexion(), $usuario);
        if ($usuario_insertado) {
            //Redirigir a registro correcto
            Redireccion::redirigir(RUTA_USUARIOS);
        }
    }

    conexion:: cerrar_conexion();
}
?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <link rel="icon" type="image/gif" href="Resources/TP.gif" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de usuarios</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>

<?php include_once '../plantillas/navbar_index.php'; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Nuevo Usuario
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <?php
                                if (isset($_POST['enviar'])) {
                                    include_once 'plantillas/registro_validado.inc.php';
                                } else {
                                    include_once 'plantillas/registro_vacio.inc.php';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Usuarios.
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" enctype="multipart/form-data" action="app/registrar.php">
                                <div id="collapseOne" class="">
                                    <div class="panel-body">
                                        <table class="text-left table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Perfil</th>
                                                    <th>Estatus</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT
                                             nombre,
                                             email,
                                             CASE activo WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END as activo,
                                             CASE perfil WHEN 1 THEN 'Recepcion' WHEN 0 THEN 'Administrador' END as perfil
                                             FROM usuarios";
                                                $resultado = mysqli_query($conexion, $sql);

                                                while ($mostrar = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $mostrar['nombre'] ?></td>
                                                        <td><?php echo $mostrar['email'] ?></td>
                                                        <td><?php echo $mostrar['perfil'] ?></td>
                                                        <td><?php echo $mostrar['activo'] ?></td>
                                                        <td><a href="#">Editar</a></td>
                                                    </tr>
                                                    <?php
                                                }
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