<?php
/* @var $this DepositTypeController */
/* @var $model DepositType */

$this->breadcrumbs=array(
	'Deposit Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DepositType', 'url'=>array('index')),
	array('label'=>'Create DepositType', 'url'=>array('create')),
	array('label'=>'View DepositType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DepositType', 'url'=>array('admin')),
);
?>

<h1>Update DepositType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>