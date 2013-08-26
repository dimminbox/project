<?php
/* @var $this DepositController */
/* @var $model Deposit */

$this->breadcrumbs=array(
	'Deposits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Deposit', 'url'=>array('index')),
	array('label'=>'Create Deposit', 'url'=>array('create')),
	array('label'=>'Update Deposit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Deposit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deposit', 'url'=>array('admin')),
    array('label'=>'Типы депозитов', 'url'=>array('/admin/depositType')),
);
?>

<h1>View Deposit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'deposit_type_id',
		'deposit_amount',
		'status',
		'date',
	),
)); ?>
