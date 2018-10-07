<?php
//esta clase hace que la informacion sea jalada de manera segura
//colocando los valores de la BD
class visita {


    //aqui coloque los metodos para que la informacion este oculta y en otro metodo se llama la informacion
    public $fec_visita;
    public $nom_visitas;
    public $ide_oficial;
    public $per_visita;
    public $asunto;
    public $hor_visita;
    public $observaciones;
    public $hor_atencion;
    public $tip_visita;
    public $num_gafete;
    public $fot_visita;
    public $fot_ide_visita;
    public $hor_salida;
    public $activo;
    //Este constructor tiene todos los campos que manejaremos y que son los mismos de la tabla en SQL
    public function __construct($fec_visita,$nom_visitas,$ide_oficial,$per_visita,$asunto,$hor_visita,$observaciones,$hor_atencion,$tip_visita,$num_gafete,$fot_visita,$fot_ide_visita,$hor_salida, $activo) {
        //
        $this->fec_visita = $fec_visita;
        $this->nom_visitas = $nom_visitas;
        $this->ide_oficial = $ide_oficial;
        $this->per_visita = $per_visita;
        $this->asunto = $asunto;
        $this->hor_visita = $hor_visita;
        $this->observaciones = $observaciones;
        $this->hor_atencion = $hor_atencion;
        $this->tip_visita = $tip_visita;
        $this->num_gafete = $num_gafete;
        $this->fot_visita = $fot_visita;
        $this->fot_ide_visita = $fot_ide_visita;
        $this->hor_salida = $hor_salida;
        $this->activo = $activo;
    }

    public function obtener_fec_visita() {
        return $this->fec_visita;
    }

    public function obtener_nom_visitas() {
        return $this->nom_visitas;
    }

    public function obtener_ide_oficial() {
        return $this->ide_oficial;
    }

    public function obtener_per_visita() {
        return $this->per_visita;
    }

    public function obtener_asunto() {
        return $this->fecha_registro;
    }

    public function obtener_hor_visita() {
        return $this->hor_visita;
    }
    
    public function obtener_observaciones() {
        return $this->observaciones;
    }
    
    public function obtener_hor_atencion() {
        return $this->hor_atencion;
    }
    
    public function obtener_tip_visita() {
        return $this->tip_visita;
    }
    
    public function obtener_num_gafete() {
        return $this->num_gafete;
    }
    
    public function obtener_fot_visita() {
        return $this->fot_visita;
    }
    
    public function obtener_fot_ide_visita() {
        return $this->fot_ide_visita;
    }
    
    public function obtener_hor_salida() {
        return $this->hor_salida;
    }
    
    public function obtener_activo() {
        return $this->activo;
    }

    public function cambiar_nom_visitas($nom_visitas) {
        $this->nom_visitas = $nom_visitas;
    }

    public function cambiar_ide_oficial($ide_oficial) {
        $this->ide_oficial = $ide_oficial;
    }

    public function cambiar_per_visita($per_visita) {
        $this->per_visita = $per_visita;
    }

    public function cambiar_asunto($asunto) {
        $this->asunto = $asunto;
    }
    
    public function cambiar_hor_visita($hor_visita) {
        $this->hor_visita = $hor_visita;
    }

    public function cambiar_observaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function cambiar_hor_atencion($hor_atencion) {
        $this->hor_atencion = $hor_atencion;
    }

    public function cambiar_tip_visita($tip_visita) {
        $this->tip_visita = $tip_visita;
    }
    
    public function cambiar_num_gafete($num_gafete) {
        $this->num_gafete = $num_gafete;
    }

    public function cambiar_fot_visita($fot_visita) {
        $this->fot_visita = $fot_visita;
    }

    public function cambiar_password($fot_ide_visita) {
        $this->fot_ide_visita = $fot_ide_visita;
    }

    public function cambiar_hor_salida($hor_salida) {
        $this->hor_salida = $hor_salida;
    }

}

