<?php header("Content-type: text/html; charset=utf-8");?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <title>MS in cloud</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1>
					Emergency Medical Service in cloud <small>Servicio de emergencia</small>
				</h1>
			</div>
			<div class="col-md-12 column">
                            <ul class="nav nav-tabs">
                                    <li id="enlace_home">
                                        <a href="<?php echo Yii::app()->createUrl('/home') ?>">Home</a>
                                    </li>
                                    <li id="enlace_protocolos">
                                        <a href="<?php echo Yii::app()->createUrl('/protocolos') ?>">Protocolos</a>
                                    </li>
                                    <li id="enlace_farmacos">
                                        <a href="<?php echo Yii::app()->createUrl('/farmacos') ?>">Farmacos</a>
                                    </li>
                                    <li id="enlace_notas">
                                        <a href="<?php echo Yii::app()->createUrl('/notas') ?>">Informes</a>
                                    </li>
                                    <li class="disabled">
                                            <a href="#">Preferencias</a>
                                    </li>
                                    <li>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/init/logout">Cerrar sesión</a>
                                    </li>
                            </ul>
                            <div>
                                <?php echo $content; ?>
                            </div>
                        </div>
		</div>
	</div>

	<hr class="featurette-divider">
	<footer>
        <p>&copy; Emergency Medical Service in cloud Company 2013-2014</p>
    </footer>
</div>
</body>
</html>


