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
    
    public function actionPrueba()
    { 
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email_introducido = $_POST['email'];          
            $identity=new UserIdentity($email_introducido,"");
            if($identity->authenticate()){
                Yii::app()->user->login($identity);
                $this->redirect(array('home/index'));
                return;
            }

        }
        
        $this->render('login');
        
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
