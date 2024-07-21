<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->p_id), array('view', 'id'=>$data->p_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_title')); ?>:</b>
	<?php echo CHtml::encode($data->p_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_body')); ?>:</b>
	<?php echo CHtml::encode($data->p_body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_status')); ?>:</b>
	<?php echo CHtml::encode($data->p_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_id')); ?>:</b>
	<?php echo CHtml::encode($data->u_id); ?>
	<br />


</div>