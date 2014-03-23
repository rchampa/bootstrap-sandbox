<?php
/* @var $this FarmacosController */
/* @var $model Farmacos */

$this->breadcrumbs=array(
	'Farmacos'=>array('index'),
	$model->id_farmaco=>array('view','id'=>$model->id_farmaco),
	'Update',
);

$this->menu=array(
	array('label'=>'List Farmacos', 'url'=>array('index')),
	array('label'=>'Create Farmacos', 'url'=>array('create')),
	array('label'=>'View Farmacos', 'url'=>array('view', 'id'=>$model->id_farmaco)),
	array('label'=>'Manage Farmacos', 'url'=>array('admin')),
);
?>

<h1>Update Farmacos <?php echo $model->id_farmaco; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>