<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->co_id,
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->co_id)),
	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->co_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>View Comment #<?php echo $model->co_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'co_id',
		'co_name',
		'co_email',
		'co_body',
		'co_status',
		'crated_at',
		'p_id',
	),
)); ?>
