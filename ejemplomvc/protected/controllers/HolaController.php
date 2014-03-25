<?php

class HolaController extends CController
{
    public function actionIndex()
    {
        $data = array();
        $data["myValue"] = "Content loaded";
        $data["ricardo"] = "Ricardo";
 
        $this->render('index', $data);
    }
 
    public function actionActualizar()
    {
        //Yii::app()->end();
        $data = array();
        $data["myValue"] = "Content updated in AJAX";
        $data["ricardo"] = "Patatas";
 
        $this->renderPartial('_ajaxContent',$data);
        //Yii::app()->end();
    }
}

