<?php 
        /*Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/raphael-min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/dracula_graffle.js'); 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/dracula_graph.js'); 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/example.js');
         * */

    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/libs/flowchart-latest.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/libs/raphael-min.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/cajas.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/graph/protocolo.js');
?>


<div class="row clearfix">
    <div class="col-md-2 column">
        <div style="height:1px; background: transparent;">
            <hr style="display:none;" />
        </div>
        <ul class="nav nav-pills nav-stacked">
            <li>
                <?php 
                    echo CHtml::ajaxLink(
                            '<i class="glyphicon glyphicon-user"></i> Listar protocolos', // The text for the anchor tag
                            Yii::app()->createUrl('/protocolos/listar'), // The url for the ajax request
                            array( // The ajaxOptions (jQuery stuff)
                                    'update' => '#partial'
                            )
                    );
                ?>
            </li>
            <li>
                <?php 
                    echo CHtml::ajaxLink(
                            '<i class="glyphicon glyphicon-plus"></i> Crear protocolo', // The text for the anchor tag
                            Yii::app()->createUrl('/protocolos/crear'), // The url for the ajax request
                            array( // The ajaxOptions (jQuery stuff)
                                    'update' => '#partial' // Page will output json to parse
                            )
                    );
                ?>
                
            </li>
            
            <li>
                <?php 
                    echo CHtml::ajaxLink(
                            '<i class="glyphicon glyphicon-remove"></i> Eliminar protocolo', // The text for the anchor tag
                            Yii::app()->createUrl('/protocolos/eliminar'), // The url for the ajax request
                            array( // The ajaxOptions (jQuery stuff)
                                    'update' => '#partial' // Page will output json to parse
                            )
                    );
                ?>
                
            </li>
          
            <li>
                <?php 
                    echo CHtml::ajaxLink(
                            '<i class="glyphicon glyphicon-search"></i> Buscar protocolo', // The text for the anchor tag
                            Yii::app()->createUrl('/protocolos/buscar'), // The url for the ajax request
                            array( // The ajaxOptions (jQuery stuff)
                                    'update' => '#partial' // Page will output json to parse
                            )
                    );
                ?>
                
            </li>

        </ul>

    </div>
  
    <!-- TODO: 
        1. Enlazar los enlaces anteriores con su respectiva vista.
        2. Generar la tabla con datos reales.
    
        <tr class="active">
        <tr class="success">
        <tr class="warning">
        <tr class="danger">
        
    -->
    
    <div class="col-md-10 column">
        
        <div style="height:10px; background: transparent;">
            <hr style="display:none;" />
        </div>
        <div id="partial">
        
        <?php 
        if($this->accion==="index"){
            $this->renderPartial('index_ajaxContent', array('result_set'=>$result_set)); 
        }
        else if($this->accion==="crear"){
            $this->renderPartial('crear_ajaxContent');
        }
        else if($this->accion==="actualizar"){
            $this->renderPartial('actualizar_ajaxContent', array('protocolo'=>$protocolo));
        }
        
        ?>
            
        </div>
    </div>
</div>