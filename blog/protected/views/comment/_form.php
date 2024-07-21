<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'co_id'); ?>
		<?php echo $form->textField($model,'co_id'); ?>
		<?php echo $form->error($model,'co_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'co_name'); ?>
		<?php echo $form->textField($model,'co_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'co_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'co_email'); ?>
		<?php echo $form->textField($model,'co_email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'co_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'co_body'); ?>
		<?php echo $form->textField($model,'co_body',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'co_body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'co_status'); ?>
		<?php echo $form->textField($model,'co_status'); ?>
		<?php echo $form->error($model,'co_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'crated_at'); ?>
		<?php echo $form->textField($model,'crated_at'); ?>
		<?php echo $form->error($model,'crated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_id'); ?>
		<?php echo $form->textField($model,'p_id'); ?>
		<?php echo $form->error($model,'p_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->