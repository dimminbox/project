<?php
$this->breadcrumbs=array(
	'General Percents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GeneralPercent','url'=>array('index')),
	array('label'=>'Create GeneralPercent','url'=>array('create')),
	array('label'=>'Update GeneralPercent','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete GeneralPercent','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeneralPercent','url'=>array('admin')),
);
?>

<h1>View GeneralPercent #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'json_days',
	),
)); ?>
