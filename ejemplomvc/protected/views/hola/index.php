
 <div id="midiv">
   
    <?php  
        $this->renderPartial('_ajaxContent', array('myValue'=>$myValue,'ricardo'=>$ricardo), false, true); 
    ?>
 
 </div>
<?php 

echo "<br>";
echo CHtml::ajaxLink(
    'Enlace ajax',// the link body (it will NOT be HTML-encoded.)
    Yii::app()->createUrl('hola/actualizar'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
    array('update' => '#midiv')
);

?>