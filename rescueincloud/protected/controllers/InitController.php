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
    
    private function lalal(){
        $this->redirect(array('home/index'));
    }
    
    public function actionPrueba()
    { 
        $this->redirect(array('home/index'));
    }
    
}

