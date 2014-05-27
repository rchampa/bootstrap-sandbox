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
    
    public function actionEditar($id)
    { 
        $this->accion = "editar";
        $email_usuario = Yii::app()->user->getName();
        $model = new Notas();
       
        $nota = $model->obtener_nota($id, $email_usuario);
        $this->render('editar',compact("nota"));
    }
    
    public function actionEditarNota()
    { 
        $id_nota = $_POST['InputID'];
        $nombre_nota = $_POST['InputNombre'];
        $descripcion = $_POST['InputDescripcion'];
        
        $email_usuario = Yii::app()->user->getName();
        
        $model = new Notas();
        $model->editar_nota($id_nota, $nombre_nota, $descripcion, $email_usuario);
        
        $this->redirect(Yii::app()->user->returnUrl."notas");
        
    } 
}

