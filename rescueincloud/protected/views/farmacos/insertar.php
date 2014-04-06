<div class="row clearfix">
    <div class="col-md-2 column">
        <div style="height:10px; background: transparent;">
            <hr style="display:none;" />
        </div>
        <ul class="nav nav-pills nav-stacked">
          <li class="nav-header"></li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/farmacos/index"><i class="glyphicon glyphicon-user"></i> Mis Fármacos</a></li>
          
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/farmacos/crear"><i class="glyphicon glyphicon-plus"></i> Añadir Fármacos</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-remove"></i> Eliminar Fármaco</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-search"></i> Buscar Fármaco</a></li>
        </ul>

    </div>
  
    
    <div class="col-md-10 column">
        <?php
        if($this->accion==="index"){
            $this->renderPartial('index_ajaxContent', array('result_set'=>$result_set)); 
        }
        else if($this->accion==="crear"){
            $this->renderPartial('crear_ajaxContent'); 
        }
        else if($this->accion==="farmacosPublicos"){
            $this->renderPartial('farmacosPublicos_ajaxContent', array('result_set'=>$result_set)); 
        }
        else if($this->accion==="insertar"){
            $this->renderPartial('insertar_ajaxContent');
        }
        ?>
    </div>
</div>
