<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caja
    id			:	nuevo_id,
    padres		:	[padre_id],
    tipo		:	tipo_caja,
    contenido           :	contenido_caja,
    relacion            :  	tipoRelacion,
    hijo_si             : 	-1,
    hijo_no		: 	-1,
    completo	: 	false
 * @author ricardo
 */
class Caja {
    private $id; 
    private $padres; 
    private $tipo;//0:normal, 1:decision
    private $contenido;
    private $relacion;//0:si, 1:no, 2:directa
    private $hijo_si;
    private $hijo_no;
    private $completo;
    
    public function Caja($id,$tipo,$contenido){
        $this->id = $id;
        $this->tipo = $tipo;
        $this->contenido = $contenido;
        $this->padres = array();
        $this->completo = false;
        $this->hijo_si = -1;
        $this->hijo_no = -1;
    }
    
//    public function Caja($id,$padres,$tipo,$contenido,$relacion,$hijo_si,$hijo_no,$completo){
//        $this->id = $id;
//        $this->padres = $padres;
//        $this->tipo = $tipo;
//        $this->contenido = $contenido;
//        $this->relacion = $relacion;
//        $this->hijo_si = $hijo_si;
//        $this->hijo_no = $hijo_no;
//        $this->completo = $completo;
//        
//    }
    
    public function getId() {
        return $this->id;
    }

    public function getPadres() {
        return $this->padres;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getRelacion() {
        return $this->relacion;
    }

    public function getHijo_si() {
        return $this->hijo_si;
    }

    public function getHijo_no() {
        return $this->hijo_no;
    }

    public function getCompleto() {
        return $this->completo;
    }
    
    public function completar(){
        $this->completo=true;
    }
    
    public function setHijoSi($id){
        $this->hijo_si=$id;
    }
    
    public function setHijoNo($id){
        $this->hijo_no=$id;
    }
    
    public function addPadre($id){
        array_push($this->padres, $id);
    }
    
    public function setRelacion($tipo_relacion){
        $this->relacion = $tipo_relacion;
    }

}
