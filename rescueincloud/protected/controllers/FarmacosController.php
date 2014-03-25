<?php

class FarmacosController extends Controller
{
    //public $layout = 'webroot.themes.layoutit.views.layouts.plantilla';
    public $layout = 'plantilla';
    public $accion = "index"; //solo peude tener 4 valores: index, crear, eliminar, buscar
    
    public function actionIndex()
    { 
        $this->accion = "index";
        $email_usuario = Yii::app()->user->getName();
        $model = new Farmacos();
        $result_set = $model->listar_farmacos_propios(0, 3, $email_usuario);
        $this->render('index',compact("result_set"));
    }
       
    public function actionCrear()
    { 
        $this->accion = "crear";
        $model = new Farmacos();
        $this->render('crear');
    }
}

