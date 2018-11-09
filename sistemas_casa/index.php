<?php
$titulo = 'Sistemas CASA';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/cn_casa.php';
include_once '../app/config.inc.php';
include_once '../plantillas/a.php';
include_once '../plantillas/navbar.php';
include_once '../plantillas/navbar_opciones.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
?>
<div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-3">
        
        
    </div>
    <div class="col-md-5"></div>
</div>
<?php
include_once '../plantillas/z.php';
?>