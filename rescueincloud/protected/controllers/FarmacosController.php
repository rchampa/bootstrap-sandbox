<?php

class FarmacosController extends Controller
{
    //public $layout = 'webroot.themes.layoutit.views.layouts.plantilla';
    public $layout = 'plantilla';
    
    public function actionIndex()
    { 
        $this->render('index');
    }
    
}

