<?php
header("Content-Type: text/html;charset=utf-8");
class ProtocolosController extends ControllerAuth
{
    //public $layout = 'webroot.themes.layoutit.views.layouts.plantilla';
    public $layout = 'plantilla';
    public $accion = "index"; //solo peude tener 4 valores: index, crear, eliminar, buscar
    
    private $num_protolocos_pagina=5;
    
    public function actionIndex()
    { 
        $this->accion = "index";
        $email_usuario = Yii::app()->user->getName();
        $model = new Protocolos();
        $num_protocolos = $model->num_protocolos($email_usuario);
        $result_set = $model->listar_protocolos(0, $this->num_protolocos_pagina, $email_usuario);
        $this->render('index',compact("result_set","num_protocolos"));
    }
    
    public function actionPaginar($id)
    {         
        $num_pagina = $id;
        $this->accion = "pagina";
        $email_usuario = Yii::app()->user->getName();
        $model = new Protocolos();
        $num_protocolos = $model->num_protocolos($email_usuario);
        $fin = $this->num_protolocos_pagina*$num_pagina;
        $ini = $fin - $this->num_protolocos_pagina;
        $result_set = $model->listar_protocolos($ini, $fin, $email_usuario);
        $this->render('index', compact("result_set","num_protocolos","num_pagina"));
       
    }
    
    public function actionListar()
    { 
        $this->accion = "index";
        $email_usuario = Yii::app()->user->getName();
        $model = new Protocolos();
        $num_protocolos = $model->num_protocolos($email_usuario);
        $result_set = $model->listar_protocolos(0, $this->num_protolocos_pagina, $email_usuario);
        $this->renderPartial('index_ajaxContent', compact("result_set","num_protocolos"));
       
    }
    
    public function actionCrear()
    { 
       $this->accion = "crear";
       $result_set = "";
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
       $this->render('index',compact("protocolo"));
    }
    
}