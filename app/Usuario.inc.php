<?php

//esta clase hace que la informacion sea jalada de manera segura
//colocando los valores de la BD
class usuario {

    //aqui coloque los metodos para que la informacion este oculta y en otro metodo se llama la informacion
    public $id_usuario;
    public $nombre;
    public $email;
    public $password;
    public $fecha_registro;
    public $activo;
   
    //Este constructor tiene todos los campos que manejaremos y que son los mismos de la tabla en SQL
    public function __construct($id_usuario, $nombre, $email, $password, $fecha_registro, $activo) {
        //
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
    }

    public function obtener_id_usuario() {
        return $this->id_usuario;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_email() {
        return $this->email;
    }

    public function obtener_password() {
        return $this->password;
    }

    public function obtener_fecha_registo() {
        return $this->fecha_registro;
    }

    public function obtener_Activo() {
        return $this->activo;
    }
    
    public function cambiar_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function cambiar_email($email) {
        $this->email = $email;
    }

    public function cambiar_password($password) {
        $this->password = $password;
    }

    public function cambiar_activo($activo) {
        $this->activo = $activo;
    }
    
}
