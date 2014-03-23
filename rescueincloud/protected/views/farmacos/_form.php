<?php
/* @var $this FarmacosController */
/* @var $model Farmacos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'farmacos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_farmaco'); ?>
		<?php echo $form->textField($model,'nombre_farmaco',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre_farmaco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_fabricante'); ?>
		<?php echo $form->textField($model,'nombre_fabricante',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre_fabricante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presentacion_farmaco'); ?>
		<?php echo $form->textField($model,'presentacion_farmaco',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'presentacion_farmaco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_administracion'); ?>
		<?php echo $form->textField($model,'tipo_administracion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tipo_administracion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creado_en'); ?>
		<?php echo $form->textField($model,'creado_en'); ?>
		<?php echo $form->error($model,'creado_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modificado_en'); ?>
		<?php echo $form->textField($model,'modificado_en'); ?>
		<?php echo $form->error($model,'modificado_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_farmaco'); ?>
		<?php echo $form->textField($model,'descripcion_farmaco',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'descripcion_farmaco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'borrado'); ?>
		<?php echo $form->textField($model,'borrado'); ?>
		<?php echo $form->error($model,'borrado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->