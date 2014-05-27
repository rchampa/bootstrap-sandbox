<div style="height:20px; background: transparent;">
    <hr style="display:none;" />
</div>
<h6>
    <b> · Actualiza la información: </b>
</h6>
<div style="height:10px; background: transparent;">
    <hr style="display:none;" />
</div>
<div class="container">
    <div class="row">
      <form role="form" action="<?php echo Yii::app()->createUrl('/farmacos/editarFarmaco') ?>" method="post" >
        <d1iv class="col-lg-6">
          <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Los campos acompañados de este símbolo son obligatorios.</strong></div>
          <div class="form-group" hidden="true">
            <label for="InputID">ID Fármaco:</label>
            <div class="input-group" >
                <input type="text" class="form-control" name="InputID" id="InputID"  value="<?php echo $farmaco["id_farmaco"]?>">
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputNombre">Nombre Fármaco:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="InputNombre" id="InputNombre"  value="<?php echo $farmaco["nombre_farmaco"]?>" required >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputFabricante">Nombre Fabricante:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="InputFabricante" name="InputFabricante" value="<?php echo $farmaco["nombre_fabricante"]?>" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputPresentacion">Formato en el que se presenta el fármaco:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="InputPresentacion" name="InputPresentacion" value="<?php echo $farmaco["presentacion_farmaco"]?>" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputPresentacion">Tipo de administración del fármaco:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="InputAdministracion" name="InputAdministracion" value="<?php echo $farmaco["tipo_administracion"]?>" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputDescripcion">Descripción Fármaco</label>
            <div class="input-group">
                <textarea name="InputDescripcion" id="InputDescripcion" value="<?php echo $farmaco["descripcion_farmaco"]?>" class="form-control" rows="4" cols="76" ></textarea>
              <span class="input-group"></span></div>
          </div>

          <input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" class="btn btn-primary pull-right">
          
        </div>
      </form>
      <hr class="featurette-divider hidden-lg">
</div>
