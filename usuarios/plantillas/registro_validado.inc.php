<div class="form-group">
    <input type="text" class="form-control" name="nombre" required="required" placeholder="Nombre" <?php $validador->mostrar_nombre() ?>>
    <?php
    $validador->mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <input type="email" class="form-control" name="email" required="required" placeholder="Cuenta de correo" <?php $validador->mostrar_email() ?>>
    <?php
    $validador->mostrar_error_mail();
    ?>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="clave1" placeholder="Contraseña">
    <?php
    $validador->mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="clave2" placeholder="Repite contraseña">
    <?php
    $validador->mostrar_error_clave2();
    ?>
</div>
<br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar</button>
<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>
