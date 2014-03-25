<!--
<div id="data">
   <?php // $this->renderPartial('_ajaxContent', array('myValue'=>$myValue,'ricardo'=>$ricardo), false, true); ?>
</div>
 -->
 <div id="midiv">
   
        <?php  
            $this->renderPartial('_ajaxContent', array('myValue'=>$myValue,'ricardo'=>$ricardo), false, true); 
        ?>
 
 </div>
<?php 
//echo CHtml::ajaxButton ("Update data", CController::createUrl('helloWorld/UpdateAjax'), array('update' => '#data'));

echo "<br>";
echo CHtml::ajaxLink(
    'Enlace ajax',          // the link body (it will NOT be HTML-encoded.)
    Yii::app()->createUrl('hola/actualizar'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
    array('update' => '#midiv')
);

?>