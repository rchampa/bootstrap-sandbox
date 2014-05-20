<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProtocoloVO
 *
 * @author ricardo
 */
class ProtocoloVO {
    private $lista_cajas;
    private $codigo;
    
    public function ProtocoloVO($lista_cajas, $codigo) {
       $this->lista_cajas = $lista_cajas;
       $this->codigo = $codigo;
    }
    
    public function getLista_cajas() {
        return $this->lista_cajas;
    }

    public function getCodigo() {
        return $this->codigo;
    }


}
