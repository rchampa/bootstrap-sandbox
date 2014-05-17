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
    
    public function actionFarmacosPublicos()
    { 
        $this->accion = "farmacosPublicos";
        $model = new Farmacos();
        $result_set = $model->listar_farmacos_publicos(0, 3);
        $this->render('farmacosPublicos',compact("result_set"));
    }
    
    public function actionInsertar()
    { 
        $this->accion = "insertar";
        $model = new Farmacos();
        $this->render('insertar');
    }
    
    /**
     * Lo que hace este action es crear relacion muahahahah
     */
    public function actionActualizar()
    { 
        //bbdd borras fila segun id
        $email_usuario = Yii::app()->user->getName();
        $model = new Farmacos();
        $result_ins = $model->add_farmacos_propios($data,$email_usuario);
        if ($result_ins == 999) {
            die(MAAAAAAAAAAAAAAAL);
        }
        else {
         $result_set = $model->listar_farmacos_propios(0, 3, $email_usuario);
         $this->renderPartial('farmacosPublicos_ajaxContent', compact("result_set"), false, true);
        } 
    }
}

