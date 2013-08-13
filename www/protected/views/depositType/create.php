<?php
/* @var $this DepositTypeController */
/* @var $model DepositType */

$this->breadcrumbs=array(
	'Deposit Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DepositType', 'url'=>array('index')),
	array('label'=>'Manage DepositType', 'url'=>array('admin')),
);
?>

<h1>Create DepositType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>