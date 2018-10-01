<?php

//incluimos el repositorio de usuarios para llamar el metodo estatico de usuario existe y email existe
include_once 'RepositorioUsuario.inc.php';

//variables para controlar lo que pasa con los valores en el formulario
class validadorregistro {

    private $aviso_inicio;
    private $aviso_cierre;
    private $nombre;
    private $email;
    private $clave;
    private $error_nombre;
    private $error_email;
    private $error_clave1;
    private $error_clave2;

//constructor 
    public function __construct($nombre, $email, $clave1, $clave2, $conexion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->clave = "";

        $this->error_nombre = $this->validar_nombre($nombre);
        $this->error_email = $this->validar_email($conexion, $email);
        $this->error_clave1 = $this->validar_clave1($clave1);
        $this->error_clave2 = $this->validar_clave2($clave1, $clave2);
        //con esto validamos que la clave no tenga errores
        if ($this->error_clave1 == "" && $this->error_clave2 == "") {
            $this->clave = $clave1;
        }
    }

    //iniciamos variables 
    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    //validamos que nombre no este vacio on un if
    private function validar_nombre($nombre) {
        if (!$this->variable_iniciada($nombre)) {
            return"Debes escribir un nombre de usuario.";
        } else {
            $this->nombre = $nombre;
        }
        //validamos que el nombre no contenga menos de 6 caracteres
        if (strlen($nombre) < 1) {
            return"El nombre debe ser mas largo de 6 caracteres.";
        }
        //validamos que el nombre no sea mas de 24 caracteres
        if (strlen($nombre) > 24) {
            return"El nombre no puede ocupar mas de 24 caracteres";
        }

//     //Este if es para validar que solo haya un usuario
//      if (repositoriousuario :: nombre_existe($conexion, $nombre)) {
//           //Mensaje que regresa al formulario, si aparece algo en la variable $nombre que a su ves es llamado
//            //por la plantilla de registro validado
//            return "Este nombre de usuario ya esta en uso";
//        }
        // si no hay error, no cambiamos el valor por mensaje 
        return"";
    }

    private function validar_email($conexion, $email) {
        if (!$this->variable_iniciada($email)) {
            return"Debes escribir un correo electronico.";
        } else {
            $this->email = $email;
        }
        if (repositoriousuario :: email_existe($conexion, $email)) {
            return "Esta cuenta de usuario ya esta en uso o <a hfer'recuperarcontraseña.php'>recuperar contraseña</a>";
        }
        return"";
    }

    private function validar_clave1($clave1) {
        if (!$this->variable_iniciada($clave1)) {
            return"Debes escribir una contraseña.";
        } else {
            $this->clave1 = $clave1;
        }
        if (strlen($clave1) < 1) {
            return"La contraseña debe ser mayor de 7 caracteres";
        }
        return"";
    }

    private function validar_clave2($clave1, $clave2) {
        if (!$this->variable_iniciada("clave1")) {
            return"Primero debe colocar la contraseña.";
        }
        //con esto revisamos que la variable_iniciada clave2 no este vacia
        if (!$this->variable_iniciada($clave2)) {
            return"Debes repetir tu contraseña.";
        }
        //si las claves no son iguales, regresamos con error el valor
        if ($clave1 !== $clave2) {
            return"Las contraseñas no coinciden.";
        }
        return"";
    }

    //con esto obtenemos los datos de las funciones privadas
    public function obtener_nombre() {
        return$this->nombre;
    }

    public function obtener_email() {
        return$this->email;
    }

    public function obtener_clave() {
        return$this->clave;
    }

    public function obtener_error_nombre() {
        return$this->error_nombre;
    }

    public function obtener_error_email() {
        return$this->error_email;
    }

    public function obtener_error_clave1() {
        return$this->error_clave1;
    }

    public function obtener_error_clave2() {
        return$this->error_clave2;
    }

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function mostrar_email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrar_error_mail() {
        if ($this->error_email !== "") {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave1() {
        if ($this->error_clave1 !== "") {
            echo $this->aviso_inicio . $this->error_clave1 . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave2() {
        if ($this->error_clave2 !== "") {
            echo $this->aviso_inicio . $this->error_clave2 . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        if ($this->error_nombre === "" &&
                $this->error_email === "" &&
                $this->error_clave1 === "" &&
                $this->error_clave2 === "") {
            return true;
        } else {
            return false;
        }
    }

}
