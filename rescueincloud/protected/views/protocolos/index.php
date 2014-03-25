<script>
    function handeSuccess(){
        console.log("meeeeeeeeeehye");
    }
</script>    
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
                                    'update' => '#partial' // Page will output json to parse
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
                            Yii::app()->request->baseUrl.'/protocolos/eliminar', // The url for the ajax request
                            array( // The ajaxOptions (jQuery stuff)
                                    'dataType' => 'json', // Page will output json to parse
                                    'success' => 'js:handeSuccess', // javascript function to call on success
                                    'data' => array('ajax' => "hola"), // The $_GET data (parameters) to pass
                            ),
                            array( // The htmlOptions for the anchor tag
                                    'href' => Yii::app()->request->baseUrl.'/protocolos/eliminar', // This is what the href of the anchor will be, defaults to #
                                    //'class' => 'class_x'// ^^ that's the new option I found out about, I didn't know it worked that way...
                            )
                    );
                ?>
                
            </li>
          
            <li>
                <?php 
                    echo CHtml::ajaxLink(
                            '<i class="glyphicon glyphicon-search"></i> Buscar protocolo', // The text for the anchor tag
                            Yii::app()->request->baseUrl.'/protocolos/buscar', // The url for the ajax request
                            array( // The ajaxOptions (jQuery stuff)
                                    'dataType' => 'json', // Page will output json to parse
                                    'success' => 'js:handeSuccess', // javascript function to call on success
                                    'data' => array('ajax' => "hola") // The $_GET data (parameters) to pass
                            ),
                            array( // The htmlOptions for the anchor tag
                                    'href' => Yii::app()->request->baseUrl.'/protocolos/buscar', // This is what the href of the anchor will be, defaults to #
                                    //'class' => 'class_x'// ^^ that's the new option I found out about, I didn't know it worked that way...
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
        
        <div id="partial">
        
        <?php 
        if($this->accion==="index"){
            $this->renderPartial('index_ajaxContent', array('result_set'=>$result_set)); 
        }
        else if($this->accion==="crear"){
            $this->renderPartial('crear_ajaxContent', array('prueba'=>'hola soy ajax')); 
        }
        ?>
            
        </div>
    </div>
</div>