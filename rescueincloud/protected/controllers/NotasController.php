<?php

class NotasController extends Controller
{
    //public $layout = 'webroot.themes.layoutit.views.layouts.plantilla';
    public $layout = 'plantilla';
    public $accion = "index"; //solo peude tener 4 valores: index, crear, eliminar, buscar
    
    public function actionIndex()
    { 
        $this->accion = "index";
        $email_usuario = Yii::app()->user->getName();
        $model = new Notas();
        
        $result_set = $model->listar_notas_usuario(0, 5, $email_usuario);
        $this->render('index',compact("result_set"));
    }
    
}

