
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
        
        <!-- Ejemplo crear cuenta 
        <div class="modal-footer" style="height:70px;">
            <h4 class="text-center">Haz click aquí para registrarte.</h4>
            <a href="#signupModal" role="button" class="btn btn-lg btn-success" data-toggle="modal" style="position:fixed; left:40%;">Sign up now</a>
            <!--Sign up modal 
            <div id="signupModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="signupModalLabel" class="text-center">Signup</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="insertSignUpInfo.php" method="post">
                        <div class="control-group">
                            <label class="control-label" for="signupUsername">Username</label>
                            <div class="controls" style="position:relative; right:15%;">
                                     <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" id="signupUsername" name="signupUsername" placeholder="Username" required=""></div><br>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="signupPassword">Password</label>
                            <div class="controls" style="position:relative; right:15%;">
                                    <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span> <input type="password" id="signupPassword" name="signupPassword" placeholder="Password" required="" minlength="8" maxlength="16"></div><br>
                            </div>
                         </div>
                         <div class="control-group">
                            <label class="control-label" for="signupConfirmPassword">Confirm Password</label>
                            <div class="controls" style="position:relative; right:15%;">
                                    <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span> <input type="password" id="signupConfirmPassword" name="signupConfirmPassword" placeholder="Confirm Password" required="" data-validation-match-match="signupPassword" data-validation-match-message="Password must match"></div><br>
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label" for="signupEmail">E-mail</label>
                            <div class="controls" style="position:relative; right:15%;">
                                    <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span> <input type="email" id="signupEmail" name="signupEmail" placeholder="E-mail" required="" data-validation-email-message="Please enter a valid e-mail address"></div><br>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="signupDOB">Date of Birth</label>
                            <div class="controls" style="position:relative; right:15%;">
                                    <div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span><input type="date" id="signupDOB" name="signupDOB" placeholder="Date of Birth" required=""></div><br>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="signupCountry">Country</label>
                            <div class="controls" style="position:relative; right:15%;">
                                    <div class="input-prepend"><span class="add-on"><i class="icon-globe"></i></span><input type="text" id="signupCountry" name="signupCountry" placeholder="Country" required=""></div><br>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Gender</label>
                            <div class="controls">
                                    <input type="hidden" id="gender" name="signupGender" value="M">
                                    <div class="btn-group genderDiv" data-toggle="buttons-radio" style="position:relative; right:56%;">
                                            <button type="button" class="btn btn-inverse btn-active" value="M">Male</button>
                                            <button type="button" class="btn btn-inverse" value="F">Female</button>
                                    </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" style="position:absolute; left:40%;">Create Account</button>
                    </form>
                </div>
            </div>
        </div> -->
        <!-- end of modal footer-->
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
