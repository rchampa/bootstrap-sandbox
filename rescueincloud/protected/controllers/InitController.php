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
        $this->redirect(array('home/index'));
    }
    
}

