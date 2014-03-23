<?php
/* @var $this FarmacosController */
/* @var $model Farmacos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_farmaco'); ?>
		<?php echo $form->textField($model,'id_farmaco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_farmaco'); ?>
		<?php echo $form->textField($model,'nombre_farmaco',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_fabricante'); ?>
		<?php echo $form->textField($model,'nombre_fabricante',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentacion_farmaco'); ?>
		<?php echo $form->textField($model,'presentacion_farmaco',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_administracion'); ?>
		<?php echo $form->textField($model,'tipo_administracion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creado_en'); ?>
		<?php echo $form->textField($model,'creado_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modificado_en'); ?>
		<?php echo $form->textField($model,'modificado_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_farmaco'); ?>
		<?php echo $form->textField($model,'descripcion_farmaco',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'borrado'); ?>
		<?php echo $form->textField($model,'borrado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->