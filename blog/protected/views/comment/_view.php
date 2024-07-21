<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->co_id), array('view', 'id'=>$data->co_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_name')); ?>:</b>
	<?php echo CHtml::encode($data->co_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_email')); ?>:</b>
	<?php echo CHtml::encode($data->co_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_body')); ?>:</b>
	<?php echo CHtml::encode($data->co_body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_status')); ?>:</b>
	<?php echo CHtml::encode($data->co_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crated_at')); ?>:</b>
	<?php echo CHtml::encode($data->crated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_id')); ?>:</b>
	<?php echo CHtml::encode($data->p_id); ?>
	<br />


</div>