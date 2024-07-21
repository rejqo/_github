<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'co_id'); ?>
		<?php echo $form->textField($model,'co_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_name'); ?>
		<?php echo $form->textField($model,'co_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_email'); ?>
		<?php echo $form->textField($model,'co_email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_body'); ?>
		<?php echo $form->textField($model,'co_body',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_status'); ?>
		<?php echo $form->textField($model,'co_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crated_at'); ?>
		<?php echo $form->textField($model,'crated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_id'); ?>
		<?php echo $form->textField($model,'p_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->