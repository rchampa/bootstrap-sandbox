<div style="height:20px; background: transparent;">
    <hr style="display:none;" />
</div>
<div style="height:10px; background: transparent;">
    <hr style="display:none;" />
</div>
<div class="container">
    <div class="row">
      <form role="form" action="<?php echo Yii::app()->createUrl('/farmacos/AltaFarmaco') ?>" method="post" >
        <d1iv class="col-lg-6">
          <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Los campos acompañados de este símbolo son obligatorios.</strong></div>
          <div class="form-group">
            <label for="InputNombre">Nombre Fármaco:</label>
            <div class="input-group">
              <input type="text" class="form-control" name="InputNombre" id="InputNombre" placeholder="Introduce aquí el nombre del fármaco" required>
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputFabricante">Nombre Fabricante:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="InputFabricante" name="InputFabricante" placeholder="Introduce aquí el nombre del fabricante" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputPresentacion">Formato en el que se presenta el fármaco:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="InputPresentacion" name="InputPresentacion" placeholder="Introduce aquí la presentación del fármaco" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputPresentacion">Tipo de administración del fármaco:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="InputAdministracion" name="InputAdministracion" placeholder="Introduce aquí el tipo de administración fármaco" required  >
              <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
          </div>
          <div class="form-group">
            <label for="InputMessage">Descripción Fármaco</label>
            <div class="input-group">
                <textarea name="InputMessage" id="InputMessage" class="form-control" rows="4" cols="76" ></textarea>
              <span class="input-group"></span></div>
          </div>

          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
          <!--
          <div class="control-group">
                    <label></label>
                    <div class="controls">
                    <form action="<?php echo Yii::app()->createUrl('/farmacos/AltaFarmaco') ?>" method="post" onsubmit="sendToServer()">
                        <input type="hidden" name="json_info" id="json_info">
                        <button type="submit" class="btn btn-primary pull-right">Insertar</button>
                    </form>
                    </div>
          </div>
          -->
          
          
        </div>
      </form>
      <hr class="featurette-divider hidden-lg">
    </div>
</div>
