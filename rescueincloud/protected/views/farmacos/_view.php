<?php
/* @var $this FarmacosController */
/* @var $data Farmacos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_farmaco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_farmaco), array('view', 'id'=>$data->id_farmaco)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_farmaco')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_farmaco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_fabricante')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_fabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presentacion_farmaco')); ?>:</b>
	<?php echo CHtml::encode($data->presentacion_farmaco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_administracion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_administracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creado_en')); ?>:</b>
	<?php echo CHtml::encode($data->creado_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificado_en')); ?>:</b>
	<?php echo CHtml::encode($data->modificado_en); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_farmaco')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_farmaco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('borrado')); ?>:</b>
	<?php echo CHtml::encode($data->borrado); ?>
	<br />

	*/ ?>

</div>