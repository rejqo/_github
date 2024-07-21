<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo $form->dropDownList($model,'p_status',Lookup::items('p_status')); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'p_id'); ?>
		<?php echo $form->textField($model,'p_id'); ?>
		<?php echo $form->error($model,'p_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_title'); ?>
		<?php echo $form->textField($model,'p_title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'p_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_body'); ?>
		<?php echo $form->textField($model,'p_body'); ?>
		<?php echo $form->error($model,'p_body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_status'); ?>
		<?php echo $form->textField($model,'p_status'); ?>
		<?php echo $form->error($model,'p_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'u_id'); ?>
		<?php echo $form->textField($model,'u_id'); ?>
		<?php echo $form->error($model,'u_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->