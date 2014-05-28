<?php

class InitController extends Controller
{    
    public function actionIndex()
    { 
        $this->render('index');
    }
    
    public function actionLogin()
    { 
        $this->render('login');
    }
    
    public function actionValidar()
    { 
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email_introducido = $_POST['email']; 
            $pass = $_POST['password'];
            
            //TODO: Validar Password!
            $identity=new UserIdentity($email_introducido,$pass);
            if($identity->authenticate()){
                Yii::app()->user->login($identity);
                $this->redirect(array('home/index'));
                return;
            }

        }
        
        $this->render('login');
        
    }
    
    public function actionRegistro()
    { 
        $this->render('registro');
    }
    
    
    public function actionActualizarRegistro()
    { 
        $email_usuario = $_POST['EmailUsuario'];
        $nombre = $_POST['NombreUsuario'];
        $apellidos = $_POST['ApellidosUsuario'];
        $genero = $_POST['GeneroUsuario'];
        $fecha_nac = $_POST['NacimientoUsuario'];
        $centro = $_POST['TrabajoUsuario'];
        $password = $_POST['PasswordUsuario'];
        
           
        $model = new Usuarios();
        $ok = $model->registrarUsuario($email_usuario, $password, $nombre, $apellidos, $genero, $fecha_nac, $centro);
        if($ok===true){
            //$this->redirect(Yii::app()->user->returnUrl."init");
            $this->render('registrocompleto');
        }
    }
    
    
    
    public function actionLogout()
    { 
        Yii::app()->user->logout();
        $this->redirect(array('init/index'));
    }
    
}


/*

// Logout the current user
Yii::app()->user->logout();

*/
