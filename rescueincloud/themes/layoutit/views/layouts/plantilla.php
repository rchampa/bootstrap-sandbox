<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Bootstrap 3, from LayoutIt!</title>
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
					Rescue in cloud <small>Servicio de emergencia</small>
				</h1>
			</div>
			<div class="tabbable" id="tabs-152783">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-674930" data-toggle="tab">Home</a>
					</li>
					<li>
						<a href="#panel-979243" data-toggle="tab">Perfil</a>
					</li>
					<li>
						<a href="#panel-979244" data-toggle="tab">Preferencias</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-674930">
						<!-- primera pestaña-->
                                                <?php echo $content; ?>
					</div>
					<div class="tab-pane" id="panel-979243">
						<p>
							Modificar los datos del perfil de usuario
						</p>
					</div>
					<div class="tab-pane" id="panel-979244">
						<p>
							Las preferencias...
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr class="featurette-divider">
	<footer>
        <p>&copy; Rescue in Cloud Company 2013-2014</p>
    </footer>
</div>
</body>
</html>
