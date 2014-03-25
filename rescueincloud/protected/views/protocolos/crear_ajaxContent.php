<div class="col-md-2 column">
    
            <div class="form-group">
                <label for="exampleInputEmail1">Caja de texto</label><input type="text" class="form-control" placeholder="Nombre" id="cajatexto">
            </div>
            <?php echo CHtml::ajaxButton ("Crear nuevo protocolo",
                              CController::createUrl('helloWorld/UpdateAjax'), 
                              array('update' => '#data'),
                              array('class'=>'btn btn-default'));
            ?>
    
</div>

<div class="col-md-10 column">
    
    <?php 
    
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/raphael-min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/dracula_graffle.js'); 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.min.js'); 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/dracula_graph.js'); 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/example.js'); 
        
    ?>    
    

    <div id="canvas"></div>
    <button id="redraw" onclick="redraw();">redraw</button>
    <button id="hide_penguin" onclick="hide('penguin');">hide penguin (beta)</button>
    <button id="hide_penguin" onclick="show('penguin');">show penguin (beta)</button>
</div>