<?php
/* @var $this FarmacosController */
/* @var $model Farmacos */

$this->breadcrumbs=array(
	'Farmacos'=>array('index'),
	$model->id_farmaco,
);

$this->menu=array(
	array('label'=>'List Farmacos', 'url'=>array('index')),
	array('label'=>'Create Farmacos', 'url'=>array('create')),
	array('label'=>'Update Farmacos', 'url'=>array('update', 'id'=>$model->id_farmaco)),
	array('label'=>'Delete Farmacos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_farmaco),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Farmacos', 'url'=>array('admin')),
);
?>

<h1>View Farmacos #<?php echo $model->id_farmaco; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_farmaco',
		'nombre_farmaco',
		'nombre_fabricante',
		'presentacion_farmaco',
		'tipo_administracion',
		'creado_en',
		'modificado_en',
		'descripcion_farmaco',
		'borrado',
	),
)); ?>
