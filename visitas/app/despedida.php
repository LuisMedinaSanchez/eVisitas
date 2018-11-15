<?php
$titulo = 'Error en correo';
include_once '../../app/config.inc.php';
include_once '../../app/Conexion.inc.php';
include_once '../../app/RepositorioUsuario.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/ControlSesion.inc.php';
include_once '../../app/Usuario.inc.php';
include_once '../../app/cn.php';
//Archivos para mandar el correo
include_once 'Exception.php';
include_once 'OAuth.php';
include_once 'PHPMailer.php';
include_once 'SMTP.php';
//Para evitar registrar usuarios sin autorizacion
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}
$id_visitas = $_REQUEST['id_visitas'];

$salir = "UPDATE visitas SET activo = 0 WHERE id_visitas = '$id_visitas'";
$resultado = mysqli_query($conexion, $salir);
if (!$resultado) {
    echo 'Error al registrar hora de salida';
} else {
    $salir_fecha = "UPDATE visitas SET hor_salida = Now() WHERE id_visitas = '$id_visitas'";
    $resultado_fecha = mysqli_query($conexion, $salir_fecha);
    if (!$resultado_fecha) {
        echo 'Error al registrar fecha de salida';
    } else {
        echo '';
    }


    $sql = "SELECT * FROM visitas WHERE id_visitas = '$id_visitas'";
    $resultado = mysqli_query($conexion, $sql);
    $mostrar = $resultado->fetch_assoc();

    $mail_visita = $mostrar['mail_visita'];
    $nom_visitas = $mostrar['nom_visitas'];

    //Configuraciones para enviar correo con PHPMailer https://github.com/PHPMailer/PHPMailer/blob/master/src/SMTP.php
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();

    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.readyhosting.com';
    $mail->Port = '587';
    $mail->SMTPSecure = false;
    $mail->SMTPAuth = true;
    $mail->Username = 'soporte1@transpheric.com';
    $mail->Password = 'SLms5847';
    $mail->setFrom('espejos@transpheric.com', 'Transpheric Logistics');
    $mail->addAddress($mail_visita, $nom_visitas);
    $mail->Subject = '¡Gracias por tu visita!';
    $mail->Body = $nom_visitas . '. Gracias por asistir a nuestra oficina. Y esperamos que usted pueda volver pronto. Transpheric';
    $mail->IsHTML(true);

    if (!$mail->send()) {
        
        include_once '../../plantillas/a.php';
        include_once '../../plantillas/navbar.php';
        include_once '../../plantillas/navbar_opciones.php';
        ?>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" id="encabezado">
                        <h4><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Error al enviar correo</h4>
                        <br>
                        <h5>Favor de revisar configuraciones de correo.</h5>
                        <br>
                        <h3><a href="<?php echo RUTA_VISITAS ?>">Continuar</a></h3>
                    </div>
                    <div class="panel-body">
                        
                    </div>
                </div>    
            </div>
            <div class="col-md-5"></div>
        </div>
        <?php
        include_once '../../plantillas/a.php';
        
} else {

Redireccion::redirigir(RUTA_REGISTRADAS);
}
}
mysqli_close($conexion);
?>