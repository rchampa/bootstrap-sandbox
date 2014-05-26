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
        $result_set = $model->listar_farmacos_usuario(0, 5, $email_usuario);
        $this->render('index',compact("result_set"));
    }
       
    public function actionCrear()
    { 
        $this->accion = "crear";
        $model = new Farmacos();
        $this->render('crear');
    }
    
    public function actionEditar($id)
    { 
        $this->accion = "editar";
        $email_usuario = Yii::app()->user->getName();
        $model = new Farmacos();
       
        $farmaco = $model->obtener_farmaco($id, $email_usuario);
        $this->render('editar',compact("farmaco"));
    }
    
    public function actionEliminar()
    { 
        //FIXME
        
        $this->accion = "eliminar";
        $email_usuario = Yii::app()->user->getName();
        $model = new Farmacos();
        $result_set = $model->listar_farmacos_usuario(0, 5, $email_usuario);
        $this->render('eliminar',compact("result_set"));
    }
    
    public function actionFarmacosPublicos()
    { 
        $this->accion = "farmacosPublicos";
        $email_usuario = Yii::app()->user->getName();
        $model = new Farmacos();
        $result_set = $model->listar_farmacos_publicos(0, 5 , $email_usuario);
        $this->render('farmacosPublicos',compact("result_set"));
    }
    
    
    public function actionInsertar()
    {
        $this->accion = "insertar";
        $result_set = "";    
        //$this->renderPartial('insertar_ajaxContent', compact("result_set"));
        $this->render('insertar');
    }
    
    /* actionAltaFarmaco: Da de alta un fármaco propio. */
    public function actionAltaFarmaco()
    { 
        $nombre_farmaco = $_POST['InputNombre'];
        $nombre_fabricante = $_POST['InputFabricante'];
        $presentacion_farmaco = $_POST['InputPresentacion'];
        $tipo_administracion = $_POST['InputPresentacion'];
        $descripcion_farmaco = $_POST['InputDescripcion'];
        
        $email_usuario = Yii::app()->user->getName();
        
        $model = new Farmacos();
        $model->insertar_farmaco_propio($nombre_farmaco, $nombre_fabricante, $presentacion_farmaco, $tipo_administracion, $descripcion_farmaco, $email_usuario);
        
        $this->redirect(Yii::app()->user->returnUrl."farmacos");
        
    }   
    
    /* actionActualizar: Genenra la relación entre fármaco publico y usuario. */
    public function actionActualizar()
    { 
        //$this->accion = "farmacosPublicos";
        //bbdd borras fila segun id
        $email_usuario = Yii::app()->user->getName();
        $id_farmaco =  $_POST['id_farmaco'];
        $no_farmaco = $_POST['nombre_farmaco'];
        $no_fabricante = $_POST['nombre_fabricante'];
        $presentacion = $_POST['presentacion_farmaco'];
        $tipo_admin = $_POST['tipo_administracion'];
        $des_farmaco = $_POST['descripcion_farmaco'];
        
        $model = new Farmacos();
        $result_ins = $model->add_rel_farmacos_publicos($id_farmaco, $no_farmaco, $no_fabricante, $presentacion, $tipo_admin, $des_farmaco, $email_usuario);
        
        /*$this->accion = "index";
        $result_set = $model->listar_farmacos_usuario(0, 5, $email_usuario);
        $this->render('index',compact("result_set"));*/
    }
}

