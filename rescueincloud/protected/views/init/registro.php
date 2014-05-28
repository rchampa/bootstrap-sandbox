
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico">

    <title>Registro</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    
    <div style="height:40px; background: transparent;">
       <hr style="display:none;" />
    </div>
         
    <div class="container">
        <h2 class="form-signin-heading">Completa los siguientes campos para entrar en EMS in Cloud: </h2>
        <div style="height:30px; background: transparent;">
           <hr style="display:none;" />
        </div>
        <div class="row">
          <form role="form" action="<?php echo Yii::app()->createUrl('/init/actualizarRegistro') ?>" method="post" >
            <div class="col-lg-6">
              <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Los campos acompañados de este símbolo son obligatorios.</strong></div>

              <div class="form-group">
                <label class="control-label" for="EmailUsuario">E-mail:</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="EmailUsuario" id="EmailUsuario" placeholder="E-mail" required="" data-validation-email-message="Por favor, introduce un e-mail válido">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
              </div>

              <div class="form-group">
                <label class="control-label" for="NombreUsuario">Nombre:</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="NombreUsuario" id="NombreUsuario" placeholder="Escribe aquí tu nombre." required="">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
              </div>

              <div class="form-group">
                <label class="control-label" for="ApellidosUsuario">Apellidos:</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="ApellidosUsuario" id="ApellidosUsuario" placeholder="Escribe aquí tus apellidos" required="">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
              </div>

              <div class="form-group">
                <label class="control-label">Género:</label>
                <div class="input-group">
                  <input type="hidden" id="GeneroUsuario" name="GeneroUsuario" value="1">
                  <div class="btn-group genderDiv" data-toggle="buttons-radio" >
                      <select name="GeneroUsuario"> 
                          <option value="1">Hombre</option> 
                          <option value="2">Mujer</option>  
                      </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label" for="NacimientoUsuario">Fecha de nacimiento:</label>
                <div class="input-group">
                  <input type="date" class="form-control" name="NacimientoUsuario" id="NacimientoUsuario" placeholder="Escribe tu fecha de nacimiento." required="">
                  <span class="input-group-addon"><i class="icon-calendar glyphicon glyphicon-ok form-control-feedback"></i></span></div>
              </div>

              <div class="form-group">
                <label class="control-label" for="TrabajoUsuario">Centro de trabajo:</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="TrabajoUsuario" id="TrabajoUsuario" placeholder="Escribe tu centro de trabajo." required="">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
              </div>    


              <div class="form-group">
                <label class="control-label" for="PasswordUsuario">Contraseña:</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="PasswordUsuario" id="PasswordUsuario" placeholder="Contraseña." required="" minlength="8" maxlength="16">
                  <span class="input-group-addon"><i class="input-xlarge glyphicon glyphicon-ok form-control-feedback"></i></span></div>
              </div>



              <input type="submit" name="Terminar" id="Terminar" value="Terminar" class="btn btn-primary pull-right">

            </div>
          </form>
          <hr class="featurette-divider hidden-lg">
    </div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
