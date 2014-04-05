
<div style="height:30px; background: transparent;">
    <hr style="display:none;" />
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <a title="Buscar" href="#">
                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/search_farmacos.png" alt="">
            </a>
        </div>

        <div class="col-lg-5 col-md-2">
            <h4>Buscar fármacos públicos</h4>
            <p>Efectúa una búsqueda en la base de datos de fármacos públicos y añádelo a tus fármacos.</p>
            <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/farmacos/farmacosPublicos">Ver fármacos <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <a title="Crear" href="#">
                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/add_farmacos.png" alt="">
            </a>
        </div>

        <div class="col-lg-5 col-md-2">
            <h4>Crea un fármaco</h4>
            <p>Puedes añadir un fármaco a tu base de datos personalizada. </p> <p>Haz click aquí para acceder al formulario.</p>
            <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/farmacos/insertar">Crear fármaco <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
</div>