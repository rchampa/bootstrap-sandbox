<?php

class ByeController extends CController
{
    public function actionIndex()
    {

        $this->render('index');
    }
 
    public function actionMostrarhora() {
        echo date('H:i:s');
        Yii::app()->end();
    }
    
    public function actionOcultarhora() {
        echo "hora ocultada";
        Yii::app()->end();
    }
}

