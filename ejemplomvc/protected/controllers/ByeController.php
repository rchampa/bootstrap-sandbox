<?php

class ByeController extends CController
{
    public function actionIndex()
    {
       
        $this->render('index');
    }
 
    public function actionReqTest01() {
        echo date('H:i:s');
        Yii::app()->end();
    }
}

