<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'p_id'); ?>
		<?php echo $form->textField($model,'p_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_title'); ?>
		<?php echo $form->textField($model,'p_title',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_body'); ?>
		<?php echo $form->textField($model,'p_body'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_status'); ?>
		<?php echo $form->textField($model,'p_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'u_id'); ?>
		<?php echo $form->textField($model,'u_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->