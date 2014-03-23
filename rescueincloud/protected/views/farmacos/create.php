<?php
/* @var $this FarmacosController */
/* @var $model Farmacos */

$this->breadcrumbs=array(
	'Farmacos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Farmacos', 'url'=>array('index')),
	array('label'=>'Manage Farmacos', 'url'=>array('admin')),
);
?>

<h1>Create Farmacos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>