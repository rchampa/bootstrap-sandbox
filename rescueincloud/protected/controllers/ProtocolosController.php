<?php

class ProtocolosController extends ControllerAuth
{
    //public $layout = 'webroot.themes.layoutit.views.layouts.plantilla';
    public $layout = 'plantilla';
    public $accion = "index"; //solo peude tener 4 valores: index, crear, eliminar, buscar
    
    public function actionIndex()
    { 
        $this->accion = "index";
        $email_usuario = Yii::app()->user->getName();
        $model = new Protocolos();
        $result_set = $model->listar_protocolos(0, 6, $email_usuario);
        $this->render('index',compact("result_set"));
    }
    
    public function actionPrueba()
    { 
       
    }
    
    public function actionCrear()
    { 
       $this->accion = "crear";
       $result_set = "";
       $this->render('index',compact("result_set"));
    }
    
}