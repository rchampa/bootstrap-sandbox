<?php
/* @var $this FarmacosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Farmacos',
);

$this->menu=array(
	array('label'=>'Create Farmacos', 'url'=>array('create')),
	array('label'=>'Manage Farmacos', 'url'=>array('admin')),
);
?>

<h1>Farmacos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
