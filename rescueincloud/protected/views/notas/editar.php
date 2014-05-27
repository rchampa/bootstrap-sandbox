<div class="row clearfix">
    <div class="col-md-2 column">
        <div style="height:10px; background: transparent;">
            <hr style="display:none;" />
        </div>
        <ul class="nav nav-pills nav-stacked">
          <li class="nav-header"></li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/notas/index"><i class="glyphicon glyphicon-user"></i> Mis Notas</a></li>
        </ul>

    </div>
  
    
    <div class="col-md-10 column">
        <?php 
        if($this->accion==="index"){
            $this->renderPartial('index_ajaxContent', array('result_set'=>$result_set)); 
        }
        else if($this->accion==="editar"){
            $this->renderPartial('editar_ajaxContent', array('nota'=>$nota)); 
        }
        ?>
        
    </div>
</div>
<script type="text/javascript">
  seleccionarNotas();
</script>