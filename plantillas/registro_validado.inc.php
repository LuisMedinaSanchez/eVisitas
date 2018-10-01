<div class="form-group">
    <label>Nombre de usuario</label>
    <input type="text" class="form-control" name="nombre" required="required" placeholder="ejemplo: Luis Medina" <?php $validador->mostrar_nombre() ?>>
    <?php
    $validador->mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label>Cuenta de correo</label>
    <input type="text" class="form-control" name="email" required="required" <?php $validador->mostrar_email()?>>
    <?php
    $validador->mostrar_error_mail();
    ?>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="clave1">
    <?php
    $validador->mostrar_error_clave1();
    ?>
</div>
<div class="form-group">
    <label>Repite contraseña</label>
    <input type="password" class="form-control" name="clave2">
    <?php
    $validador->mostrar_error_clave2();
    ?>
</div>
<br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar</button>
<button href="index.php" class="btn btn-default btn-primary">Limpiar formulario</button>
