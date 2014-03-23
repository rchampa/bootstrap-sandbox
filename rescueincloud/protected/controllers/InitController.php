<?php

class InitController extends Controller
{
    public $layout = 'plantilla_vacia';
    
    public function actionIndex()
    { 
        $this->render('index');
    }
    
    
}

