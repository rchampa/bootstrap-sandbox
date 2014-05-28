
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico">

    <title>Signin</title>

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

    <div class="container">

        <form class="form-signin" role="form" action="validar" method="post">
            <h2 class="form-signin-heading">Inicie sesión.</h2>
            <input type="email" class="form-control" name="email" placeholder="Dirección e-mail" required autofocus>
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            <label class="checkbox">
              <input type="checkbox" value="remember-me"> Mantener la sesión iniciada
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit"value ="login" >Iniciar sesión</button>
        </form>
        
        <div style="height:10px; background: transparent;">
              <hr style="display:none;" />
        </div>
        <div class="form-signin">
            <h4 style="text-indent: 1em;">¿Eres nuevo en EMS in Cloud? </h4>
            <a class="btn btn-lg btn-success btn-group-justified" href="<?php echo Yii::app()->createUrl('/init/registro') ?>">Regístrate aquí</a>
        </div>    
    </div> <!-- /container -->
  
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
