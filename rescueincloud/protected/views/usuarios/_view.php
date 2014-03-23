<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email_usuario), array('view', 'id'=>$data->email_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dni')); ?>:</b>
	<?php echo CHtml::encode($data->dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genero')); ?>:</b>
	<?php echo CHtml::encode($data->genero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro_trabajo')); ?>:</b>
	<?php echo CHtml::encode($data->centro_trabajo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creado_en')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_creado_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_actualizado_en')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_actualizado_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('borrado')); ?>:</b>
	<?php echo CHtml::encode($data->borrado); ?>
	<br />

	*/ ?>

</div>