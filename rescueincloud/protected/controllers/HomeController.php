<?php

class HomeController extends Controller
{    
    public $layout = 'plantilla';
    
    public function actionIndex()
    { 
        $this->render('index');
    }
    
}

