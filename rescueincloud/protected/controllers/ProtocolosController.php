<?php
header("Content-Type: text/html;charset=utf-8");
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
        $result_set = $model->listar_protocolos(0, 9, $email_usuario);
        $this->render('index',compact("result_set"));
    }
    
    public function actionListar()
    { 
        $this->accion = "index";
        $email_usuario = Yii::app()->user->getName();
        $model = new Protocolos();
        $result_set = $model->listar_protocolos(0, 9, $email_usuario);
        $this->renderPartial('index_ajaxContent', compact("result_set"));
       
    }
    
    public function actionCrear()
    { 
       $this->accion = "crear";
       $result_set = "";
       //echo "<script type='text/javascript' src='".Yii::app()->baseUrl."/js/graph/cajas.js'></script>";
       //Yii::app()->clientscript->scriptMap["/graph/cajas.js"] = false;
       $this->renderPartial('crear_ajaxContent', compact("result_set"));
    }

    public function actionAlta()
    {

       $json_info = $_POST['json_info'];
       $parser_code = $_POST['code'];
       $email_usuario = Yii::app()->user->getName();

       $model = new Protocolos();
       $model->crear_protocolo($json_info, $parser_code, $email_usuario);

       $this->redirect(Yii::app()->user->returnUrl."protocolos");
    }


    public function actionEditar($id)
    { 
       $email_usuario = Yii::app()->user->getName();
       $this->accion = "actualizar";
       $model = new Protocolos();
       
       $protocolo = $model->obtener_protocolo($id, $email_usuario);
       
       $this->renderPartial('actualizar_ajaxContent', compact("protocolo"));
    }
    
}