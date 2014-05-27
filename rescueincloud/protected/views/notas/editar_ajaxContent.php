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
      <form role="form" action="<?php echo Yii::app()->createUrl('/notas/editarNota') ?>" method="post" >
        <d1iv class="col-lg-6">
          <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Los campos acompañados de este símbolo son obligatorios.</strong></div>
          <div class="form-group" hidden="true">
            <label for="InputID">ID Nota:</label>
            <div class="input-group" >
                <input type="text" class="form-control" name="InputID" id="InputID"  value="<?php echo $nota["id_nota"]?>">
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputNombre">Nombre Nota:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="InputNombre" id="InputNombre"  value="<?php echo $nota["nombre_nota"]?>" required >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputDescripcion">Descripción:</label>
            <div class="input-group">
                <textarea name="InputDescripcion" id="InputDescripcion" value="<?php echo $nota["descripcion"]?>" class="form-control" rows="4" cols="76" ></textarea>
              <span class="input-group"></span></div>
          </div>
          <div class="form-group">
            <label for="InputCreacion">Fecha de creación de la nota:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="InputPresentacion" name="InputCreacion" value="<?php echo $nota["nota_creada_en"]?>" disabled="true" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>

          <input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" class="btn btn-primary pull-right">
          
        </div>
      </form>
      <hr class="featurette-divider hidden-lg">
</div>
